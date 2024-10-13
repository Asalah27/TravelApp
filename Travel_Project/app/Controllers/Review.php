<?php


namespace App\Controllers;

use App\Models\ReviewModel;
use App\Models\UserModel;
use CodeIgniter\Controller;

class Review extends BaseController
{

    // public function submitComment()
    // {
    //     $comment = $this->request->getPost('comment');
    //     $rating = $this->request->getPost('rating');


    //     $reviewModel = new ReviewModel();
    //     $reviewData = [
    //         'user_id' => session()->get('id'),  
    //         'comments' => $comment,
    //         'rating' => $rating
    //     ];

    //     $result = $reviewModel->save($reviewData);

    //     if ($result) {
    //         $response = ['status' => 'success'];
    //     } else {
    //         $response = ['status' => 'error'];
    //     }

    //     return $this->response->setJSON($response);
    // }

    // public function fetchComments()
    // {
    //     $reviewModel = new ReviewModel();
    //     $comments = $reviewModel->select('travel_review.*, users.firstname, users.lastname')
    //                             ->join('users', 'users.id = travel_review.user_id')
    //                             ->findAll();

    //     if (!empty($comments)) {
    //         $response = ['status' => 'success', 'comments' => $comments];
    //     } else {
    //         $response = ['status' => 'error'];
    //     }

    //     return $this->response->setJSON($response);
    // }

    public function submitComment()
    {
        $session = session();
        $user_id = $session->get('id');  

        if (!$user_id) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'User not logged in'])->setStatusCode(401);
        }

        $comment = $this->request->getPost('comment');
        $rating = $this->request->getPost('rating');

        if (!$comment || !$rating) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Comment and rating are required'])->setStatusCode(400);
        }

        $reviewData = [
            'user_id' => $user_id,
            'comments' => $comment,
            'rating' => $rating,
        ];

        try {
            $reviewModel = new ReviewModel();
            $reviewModel->save($reviewData);
            return $this->response->setJSON(['status' => 'success']);
        } catch (\Exception $e) {
            return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()])->setStatusCode(500);
        }
    }

    public function getReviews()
    {
        $reviewModel = new ReviewModel();
        $reviews = $reviewModel->select('travel_review.*, users.firstname, users.lastname')
            ->join('users', 'users.id = travel_review.user_id')
            ->findAll();

        return $this->response->setJSON(['status' => 'success', 'reviews' => $reviews]);
    }
}



