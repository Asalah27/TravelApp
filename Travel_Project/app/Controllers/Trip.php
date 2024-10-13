<?php


namespace App\Controllers;

use App\Models\TripModel;
use App\Models\ContinentModel;
use App\Models\PlaceModel;
use App\Models\BookModel;
use App\Models\UserModel;
use CodeIgniter\Controller;

class Trip extends BaseController
{

    public function addTrip() {


        $tripModel = new TripModel();


        $validationRules = [
            'cont_id' => 'required',
            'place_id' => 'required',
            'departure' => 'required|valid_date',
            'returnd' => 'required|valid_date',
            'price' => 'required',
            'seats' => 'required|integer',
            'tripimg' => 'if_exist|is_image[tripimg]|max_size[tripimg,2048]'

        ];


            $data = [

                'destination' => $this->request->getPost('cont_id'),
                'place_id' => $this->request->getPost('place_id'),
                'departure_date' => $this->request->getPost('departure'),
                'return_date' => $this->request->getPost('returnd'),
                'price' => $this->request->getPost('price'),
                'available_seats' => $this->request->getPost('seats'),
            ];


            if ($imageFile = $this->request->getFile('trip_img')) {
                if ($imageFile->isValid() && !$imageFile->hasMoved()) {
                    $newName = $imageFile->getRandomName();
                    $imageFile->move(FCPATH . '/assets/uploads', $newName);     
                    $data['trip_img'] = $newName;
                }
            }



    
            if (!$this->validate($validationRules)) {

                $errors = $this->validator->getErrors();
                return $this->response->setJSON(['status' => '500', 'errors' => $errors]);
            }
    
            if ($tripModel->save($data)) {

                return $this->response->setJSON(['status' => '200', 'message' => 'New trip added successfully']);
            } else {
                return $this->response->setJSON(['status' => '500', 'errors' => $tripModel->errors()]);
            }
        
    

 

}



public function fetchTrips() {
    
    $tripModel = new TripModel();
    $contModel = new ContinentModel();
    $placeModel = new PlaceModel();
    
    $trips = $tripModel->select('trip.*, continent.cont_name, place.place_name')
                       ->join('continent', 'continent.cont_id = trip.destination')
                       ->join('place', 'place.place_id = trip.place_id')
                       ->findAll();
    
    return $this->response->setJSON(['trips' => $trips]);
}



    public function tripManagementView(){

      
        $contModel = new ContinentModel();
        $data['conts'] = $contModel->findAll();
    
        echo view('Admin/header');
        echo view('Admin/tripManagement',$data);
        echo view('Admin/footer');
    }





    public function deleteTrip() {
        $tripModel = new TripModel();
        $tripId = $this->request->getPost('id'); 
        
    
       
        $trip = $tripModel->find($tripId);
        if (!$trip) {
            return $this->response->setJSON(['status' => '500', 'message' => 'Trip not found']);
        }
    
        if ($tripModel->delete($tripId)) {
            return $this->response->setJSON(['status' => '200', 'message' => 'Trip deleted successfully']);
        } else {
            return $this->response->setJSON(['status' => '500', 'message' => 'Failed to delete trip']);
        }
    }
    
    
    
    public function getTrip($id) {
        $tripModel = new TripModel();
        // $trip = $tripModel->find($id);

        $trip = $tripModel->select('trip.*, continent.cont_name, place.place_name')
                          ->join('continent', 'continent.cont_id = trip.destination')
                          ->join('place', 'place.place_id = trip.place_id')
                          ->find($id);

    
        if ($trip) {
            return $this->response->setJSON(['status' => '200', 'trip' => $trip]);
        } else {
            return $this->response->setJSON(['status' => '500', 'message' => 'Trip not found']);
        }
    }


    public function updateTrip($id) {

        $validationRules = [
            'cont_id' => 'required',
            'place_id' => 'required',
            'departure' => 'required|valid_date',
            'returnd' => 'required|valid_date',
            'price' => 'required|integer',
            'tripimg' => 'if_exist|is_image[tripimg]|max_size[tripimg,2048]'

        ];
    
        $data = [

            'destination' => $this->request->getPost('cont_id'),
            'place_id' => $this->request->getPost('place_id'),
            'departure_date' => $this->request->getPost('departure'),
            'return_date' => $this->request->getPost('returnd'),
            'price' => $this->request->getPost('price'),
        ];
    
    
        
        if ($imageFile = $this->request->getFile('trip_img')) {
            if ($imageFile->isValid() && !$imageFile->hasMoved()) {
                $newName = $imageFile->getRandomName();
                $imageFile->move(FCPATH . '/assets/uploads', $newName);     
                $data['trip_img'] = $newName;
            }

        }

    
        if (!$this->validate($validationRules)) {
            $errors = $this->validator->getErrors();
            return $this->response->setJSON(['status' => '500', 'errors' => $errors]);
        }
    
        $tripModel = new TripModel();
        if ($tripModel->update($id, $data)) {
            return $this->response->setJSON(['status' => '200']);
        } else {
            return $this->response->setJSON(['status' => '500', 'errors' => $tripModel->errors()]);
        }
    




}


public function fetchPlacesByContinent($continentId) {
    
    $placeModel = new PlaceModel(); 

    $places = $placeModel->where('cont_id', $continentId)
                         ->findAll();

    return $this->response->setJSON(['places' => $places]);
}




public function confirmBooking() {
    $tripModel = new TripModel();
    $bookingModel = new BookModel();

    $session = session();
    $uid = $session->get('id');

    if (empty($uid)) {
        return $this->response->setJSON(['status' => '400', 'message' => 'User not logged in']);
    }

    $tripId = $this->request->getPost('trip_id');
    $numPassenger = $this->request->getPost('num_passenger');
    $specialRequest = $this->request->getPost('special_req');

    if (empty($tripId) || empty($numPassenger) || empty($specialRequest)) {
        return $this->response->setJSON(['status' => '400', 'message' => 'Invalid input data']);
    }

    try {
        $trip = $tripModel->find($tripId);
        if (!$trip) {
            return $this->response->setJSON(['status' => '404', 'message' => 'Trip not found']);
        }

        if ($trip->available_seats < $numPassenger) {
            return $this->response->setJSON(['status' => '400', 'message' => 'Not enough available seats']);
        }

        $trip->available_seats -= $numPassenger;

        $db = \Config\Database::connect();
        $db->transStart();

        if (!$tripModel->update($tripId, ['available_seats' => $trip->available_seats])) {
            throw new \RuntimeException('Failed to update trip seats');
        }

        if (!$bookingModel->save([
            'trip_id' => $tripId,
            'num_passenger' => $numPassenger,
            'user_id' => $uid,
            'status' => 0,
            'payment_status' => 0,
            'special_req' => $specialRequest,
        ])) {
            throw new \RuntimeException('Failed to save booking');
        }

        $db->transComplete();

        if ($db->transStatus() === FALSE) {
            throw new \RuntimeException('Transaction failed');
        }

        return $this->response->setJSON(['status' => '200', 'message' => 'Booking confirmed successfully']);
    } catch (\Exception $e) {
        log_message('error', $e->getMessage());
        return $this->response->setJSON(['status' => '500', 'message' => 'Internal server error']);
    }
}




public function bookManagementView(){

    

    echo view('Admin/header');
    echo view('Admin/bookManagement');
    echo view('Admin/footer');
}



public function fetchBooking() {
    $tripModel = new TripModel();
    $bookModel = new BookModel();
    $placeModel = new PlaceModel();

    try {
        $books = $bookModel->select('booking.*, users.firstname, users.lastname, users.email, place.place_name, trip.departure_date, trip.return_date, trip.price')
                           ->join('trip', 'trip.trip_id = booking.trip_id')
                           ->join('place', 'place.place_id = trip.place_id')
                           ->join('users', 'users.id = booking.user_id')
                           ->findAll();

        return $this->response->setJSON(['books' => $books]);
    } catch (\Exception $e) {
        return $this->response->setJSON(['status' => '500', 'message' => $e->getMessage()]);
    }
}





public function updateBookingStatus()
{
    $bookingModel = new BookModel();

    $bookId = $this->request->getPost('book_id');
    $status = $this->request->getPost('u_status'); 

    if (empty($bookId) || $status === null) {
        return $this->response->setJSON(['status' => '400', 'message' => 'Invalid input data']);
    }

    try {
        if (!$bookingModel->update($bookId, ['u_status' => $status])) { 
            throw new \RuntimeException('Failed to update booking status');
        }

        $updatedBooking = $bookingModel->find($bookId);

        if (!$updatedBooking) {
            throw new \RuntimeException('Failed to fetch updated booking');
        }

        return $this->response->setJSON(['status' => '200', 'message' => 'Booking status updated successfully', 'booking' => $updatedBooking]);
    } catch (\Exception $e) {
        return $this->response->setJSON(['status' => '500', 'message' => 'Failed to update booking status: ' . $e->getMessage()]);
    }
}




public function updatePaymentStatus()
{
    $bookingModel = new BookModel();

    $bookId = $this->request->getPost('book_id');
    $paymentStatus = $this->request->getPost('payment_status'); 

    if (empty($bookId) || $paymentStatus === null) {
        return $this->response->setJSON(['status' => '400', 'message' => 'Invalid input data']);
    }

    try {
        if (!$bookingModel->update($bookId, ['payment_status' => $paymentStatus])) { 
            throw new \RuntimeException('Failed to update payment status');
        }

        $updatedBooking = $bookingModel->find($bookId);

        if (!$updatedBooking) {
            throw new \RuntimeException('Failed to fetch updated booking');
        }

        return $this->response->setJSON(['status' => '200', 'message' => 'Payment status updated successfully', 'booking' => $updatedBooking]);
    } catch (\Exception $e) {
        log_message('error', $e->getMessage());
        return $this->response->setJSON(['status' => '500', 'message' => 'Failed to update payment status: ' . $e->getMessage()]);
    }
}




public function deleteBooking() {
    $bookingModel = new BookModel();
    $bookId = $this->request->getPost('book_id'); 
    

   
    $booking = $bookingModel->find($bookId);
    if (!$booking) {
        return $this->response->setJSON(['status' => '500', 'message' => 'Booking not found']);
    }

    if ($bookingModel->delete($bookId)) {
        return $this->response->setJSON(['status' => '200', 'message' => 'Booking deleted successfully']);
    } else {
        return $this->response->setJSON(['status' => '500', 'message' => 'Failed to delete Booking']);
    }
}



public function fetchTripCount() {
    $tripModel = new TripModel();
    $tripCount = $tripModel->countAll();

    return $this->response->setJSON(['status' => '200', 'tripCount' => $tripCount]);
}


public function fetchBookingCount() {
    $bookModel = new BookModel();
    $bookingCount = $bookModel->countAll();

    return $this->response->setJSON(['status' => '200', 'bookingCount' => $bookingCount]);
}



public function fetchTotalPassengers() {
    $bookModel = new BookModel();
    $totalPassengers = $bookModel->selectSum('num_passenger')->first();

    return $this->response->setJSON(['status' => '200', 'totalPassengers' => $totalPassengers->num_passenger]);
}

public function fetchTotalPrice() {
    $newTotalPrice = $this->request->getGet('newTotalPrice');

    // Calculate updated total price
    $updatedTotalPrice = 0;
    $updatedTotalPrice += $newTotalPrice;
    
    return $this->response->setJSON(['status' => '200', 'totalPrice' => $updatedTotalPrice]);
}







}