document.addEventListener('DOMContentLoaded', function (event) {

    const alertContainer = document.getElementById('alertContainer');
    const errorMessages = document.getElementById('errorMessages');
    const tripSave = document.getElementById('trip-save');
    const bookSave = document.getElementById('confirmBookingFinal');


    if (tripSave!=null){
        tripSave.addEventListener('click', function (event) {
            event.preventDefault();
            if (tripSave.textContent === 'Add Trip') {
                addTrip();
            } else if (tripSave.textContent === 'Update Trip') {
                const tripId = tripSave.getAttribute('data-trip-id');
                updateTrip(tripId);
            }
        });
    }


    
    function addTrip() {
        var formData = new FormData();
        formData.append('trip_img', $('#tripimg')[0].files[0]);
        formData.append('cont_id', $('#cont_id').val());
        formData.append('place_id', $('#place_id').val());
        formData.append('departure', $('#departure').val());
        formData.append('returnd', $('#returnd').val());
        formData.append('price', $('#price').val());
        formData.append('seats', $('#seats').val());
    
        $.ajax({
            url: "trip/add-trip",
            method: 'POST',
            dataType: 'json',
            data: formData,
            processData: false, 
            contentType: false
        }).done(function (result) {
            alertContainer.style.display = 'none';
            errorMessages.innerHTML = '';
    
            if (result.status === '500') {
                var messages = '';
                for (var key in result.errors) {
                    if (result.errors.hasOwnProperty(key)) {
                        messages += '<p>' + result.errors[key] + '</p>';
                    }
                }
                errorMessages.innerHTML = messages;
                alertContainer.style.display = 'block';
            } else {
                $('#addAlert').removeClass('d-none');
                $('#addMsg').text('Trip added successfully');
                $('.modal').modal('hide');
                fetchTrips();
                fetchTripCount();

            }
        }).fail(function (jqXHR, textStatus, errorThrown) {
            alert('Request failed: ' + textStatus);
            console.log('Error: ' + errorThrown);
        });
    }



    
    function updateTrip(tripId) {
        var formData = new FormData();
        formData.append('trip_img', $('#tripimg')[0].files[0]);
        formData.append('cont_id', $('#cont_id').val());
        formData.append('place_id', $('#place_id').val());
        formData.append('departure', $('#departure').val());
        formData.append('returnd', $('#returnd').val());
        formData.append('price', $('#price').val());
    

        $.ajax({
            url: `trip/update-trip/${tripId}`,
            method: 'POST',
            dataType: 'json',
            data: formData,
            processData: false, 
            contentType: false
        }).done(function(result) {
            alertContainer.style.display = 'none';
            errorMessages.innerHTML = '';
            if (result.status === '200') {
                console.log('done');
                // alert('Trip updated successfully');
                $('#addTripModal').modal('hide');
                $('#addAlert').removeClass('d-none');
                $('#addMsg').text('Trip updated successfully');
                fetchTrips();
            } else {
                // alert('Failed to update trip');
                console.log(result.errors);
                var messages = '';
                for (var key in result.errors) {
                    if (result.errors.hasOwnProperty(key)) {
                        messages += '<p>' + result.errors[key] + '</p>';
                    }
                }
                errorMessages.innerHTML = messages;
                alertContainer.style.display = 'block';
            }
        }).fail(function(jqXHR, textStatus, errorThrown) {
            alert(`Request failed: ${textStatus}`);
            console.log(`Error: ${errorThrown}`);
        });
    }





    function fetchTrips() {
        $.ajax({
            url: "trip/fetch-trip",
            method: 'GET',
            dataType: 'json',
        }).done(function (result) {
            displayTrips(result.trips);
            addTripCard(result.trips);
        }).fail(function (jqXHR, textStatus, errorThrown) {
            alert('Request failed: ' + textStatus);
            console.log('Error: ' + errorThrown);
        });
    }

    fetchTrips();





    function displayTrips(trips) {
        $('#dataTable tbody').empty();

        trips.forEach(function (trip) {
            // const coverImg = book.book_cover ? `<img src="/uploads/${book.book_cover}" alt="Book Cover" width="50" height="50">` : '';
            const newRow = `<tr data-trip-id="${trip.trip_id}">
                <td>${trip.trip_id}</td>
                <td><img src="/assets/uploads/${trip.trip_img}" alt="Trip Image" width="85" height="100"></td>
                <td>${trip.cont_name}</td>
                <td>${trip.place_name}</td>
                <td>${trip.departure_date}</td>
                <td>${trip.return_date}</td>
                <td>${trip.price} JOD</td>
                <td>${trip.available_seats}</td>
                <td class="text-center">
                    <button type="button" class="editBtn btn"><i class="fa-solid fa-pen-to-square fs-4" style="color: #13357b"></i></button>
                    <button type="button" class="deleteBtn btn"><i class="fa-solid fa-trash fs-4 text-danger"></i></button>
                </td>
            </tr>`;
            $('#dataTable tbody').append(newRow);
        });
    }



    
    function deleteTrip(tripId) {
        $.ajax({
            url: "trip/delete-trip",
            method: 'POST',
            dataType: 'json',
            data: { id: tripId },
        }).done(function (result) {
            if (result.status === '200') {
                // alert('Trip deleted successfully');
                $('#addAlert').removeClass('d-none');
                $('#addMsg').text(result.message);
                fetchTrips();
            } else {
                alert('Failed to delete trip');
            }
        }).fail(function (jqXHR, textStatus, errorThrown) {
            alert('Request failed: ' + textStatus);
            console.log('Error: ' + errorThrown);
        });
    }

    

    document.addEventListener('click', function (event) {
        if (event.target.closest('.editBtn')) {
            const tripId = event.target.closest('tr').getAttribute('data-trip-id');
            editTrip(tripId);
        } else if (event.target.closest('.deleteBtn')) {
            const tripId = event.target.closest('tr').getAttribute('data-trip-id');
            deleteTrip(tripId);
        }
    });


    function editTrip(tripId) {
        $.ajax({
            url: `trip/get-trip/${tripId}`,
            method: 'GET',
            dataType: 'json',
        }).done(function(result) {
            if (result.status === '200') {
                const trip = result.trip;
                $('#cont_id').val(trip.destination);
                $('#departure').val(trip.departure_date);
                $('#returnd').val(trip.return_date);
                $('#price').val(trip.price);
                if (trip.trip_img) {
                    $('#tripimgPreview').attr('src', `/assets/uploads/${trip.trip_img}`).show();
                } else {
                    $('#tripimgPreview').hide();
                }
                $('#addTripModal').modal('show'); 

    
                tripSave.textContent = 'Update  Trip';
                tripSave.setAttribute('data-trip-id', tripId);
            } else {
                alert('Failed to fetch trip data');
            }
        }).fail(function(jqXHR, textStatus, errorThrown) {
            alert(`Request failed: ${textStatus}`);
            console.log(`Error: ${errorThrown}`);
        });
    }

    $('#addTripModal').on('hidden.bs.modal', function () {
        $('#tripForm')[0].reset();
        tripSave.textContent = 'Add Trip';
        tripSave.removeAttribute('data-trip-id');
    });

    fetchTrips();




    const continentSelect = document.getElementById('cont_id');
    const placeSelect = document.getElementById('place_id');

    if (continentSelect!=null){

    continentSelect.addEventListener('change', function () {
        console.log(continentSelect.value);
        const selectedContinentId = continentSelect.value;
        fetchPlacesByContinent(selectedContinentId);
    });
}

    function fetchPlacesByContinent(continentId) {
        $.ajax({
            url: "trip/fetch-places-by-continent/" + continentId,  
            method: 'GET',
            dataType: 'json',
        }).done(function (result) {
            console.log(result.places);
            updatePlaceSelect(result.places);
        }).fail(function (jqXHR, textStatus, errorThrown) {
            console.error('Request failed: ' + textStatus, errorThrown);
        });
    }

    function updatePlaceSelect(places) {
        placeSelect.innerHTML = '';

        if (places.length === 0) {
            const defaultOption = document.createElement('option');
            defaultOption.text = 'No places available';
            placeSelect.appendChild(defaultOption);
        } else {
            places.forEach(function (place) {
                console.log(place.place_name);
                const option = document.createElement('option');
                option.value = place.place_id;          
                option.text = place.place_name;  
                placeSelect.appendChild(option);
            });
        }
    }




    // function addTripCard(trips) {

    //     trips.forEach(function (trip) {

    //     var cardHtml = `
    //     <div class="card" style="width: 18rem; margin: 45px;">
    //         <img src="/assets/uploads/${trip['trip_img']}" class="card-img-top" alt="${trip['place_name']}" style="width: 100%; height:300px; object-fit: cover;">
    //         <div class="card-body">
    //             <h5 class="card-title" data-service-name="${trip['place_name']}">${trip['place_name']}</h5>
    //             <p class="card-text">Price : ${trip['price']} JOD</p>
    //             <button type="button" class="btn bg-gradient-info text-white book-now-button" data-toggle="modal" data-target="#calendarModal" data-service-id="${id}" data-service-duration="${timeDuration}">Book Now</button>
    //         </div>
    //     </div>
    // `;
    //     $('#tripsContainer').append(cardHtml);
    //     return 1;

    // });
    
    // }


    function addTripCard(trips) {
        const tripsContainer = document.getElementById('tripsContainer');
        tripsContainer.innerHTML = '';

        trips.forEach(trip => {
            const tripCard = document.createElement('div');
            tripCard.classList.add('col-md-6', 'col-lg-4', 'mb-4');
            tripCard.innerHTML = `
                <div class="card h-100">
                    <img class="card-img-top w-100" src="/assets/uploads/${trip['trip_img']}" alt="Trip Image" style="height: 350px;">
                    <div class="card-body">
                        <h5 class="card-title">${trip['place_name']}</h5>
                        <p class="card-text">
                            Departure: ${trip['departure_date']}<br>
                            Return: ${trip['return_date']}<br>
                            Price: ${trip['price']} JOD
                        </p>
                    </div>
                    <div class="card-footer text-end">
                        <button class="btn btn-primary" onclick="disBookTrip(${trip['trip_id']}, ${trip['available_seats']})">Book Now</button>
                    </div>
                </div>`;
            tripsContainer.appendChild(tripCard);
        });
    }

    fetchTrips();

window.disBookTrip = function(tripId, availableSeats) {
    $('#tripId').val(tripId);
    $('#availableSeats').val(availableSeats);
    $('#numPassengers').attr('max', availableSeats);
    $('#bookingModal').modal('show');
}

$('#confirmBooking').on('click', function() {
    // Fetch trip details and number of passengers
    const tripId = $('#tripId').val();
    const numPassengers = $('#numPassengers').val();
    const specialRequest = $('#message').val();

    $.ajax({
        url: `trip/get-trip/${tripId}`,
        method: 'GET',
        dataType: 'json',
    }).done(function(result) {
        if (result.status === '200') {
            $('#bookingModal').modal('hide');
            const trip = result.trip;

            // Calculate total price
            const totalPrice = trip.price * numPassengers;
            
            // Prepare HTML for modal content
            const modalContent = `
                <div class="modal-body">
                    <p><strong>Trip:</strong> ${trip.place_name}</p>
                    <p><strong>Departure Date:</strong> ${trip.departure_date}</p>
                    <p><strong>Return Date:</strong> ${trip.return_date}</p>
                    <p><strong>Price per Passenger:</strong> ${trip.price} JOD</p>
                    <p><strong>Number of Passengers:</strong> ${numPassengers}</p>
                    <p><strong>Total Price:</strong> ${totalPrice} JOD</p>
                    <p><strong>Special Request:</strong> ${specialRequest}</p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="confirmBookingFinal">Confirm Booking</button>
                </div>`;
                

            // Set modal content and show the modal
            $('#bookingDetailsModal .modal-content').html(modalContent);
            $('#bookingDetailsModal').modal('show');
           
        } else {
            alert('Failed to fetch trip data');
        }
    }).fail(function(jqXHR, textStatus, errorThrown) {
        alert(`Request failed: ${textStatus}`);
        console.log(`Error: ${errorThrown}`);
    });
});




// $('#confirmBookingFinal').on('click', function() {
//     alert(`Done click`);
//     var tripId = $('#trip_id').val();
//     alert(`Failed to confirm booking: ${tripId}`);
//     var numPassenger = $('#num_passenger').val();

//     var postData = {
//         trip_id: tripId,
//         num_passenger: numPassenger
//     };

//     $.ajax({
//         url: 'trip/confirmBooking', 
//         type: 'POST',
//         dataType: 'json',
//         data: postData,
//         success: function(response) {
//             if (response.status === '200') {
//                 alert('Booking confirmed successfully');
//             } else {
//                 alert('Failed to confirm booking: ' + response.message);
//             }
//         },
//         error: function(xhr, status, error) {
//             alert('Failed to confirm booking: ' + error);
//         }
//     });
// });

$(document).on('click', '#confirmBookingFinal', function() {
    var tripId = $('#tripId').val();
    // alert(`Failed to confirm booking: ${tripId}`);
    var numPassengers = $('#numPassengers').val();
    var specialRequest = $('#message').val();

    var postData = {
        trip_id: tripId,
        num_passenger: numPassengers,
        special_req: specialRequest
    };

    $.ajax({
        url: '/trip/confirmBooking', // Adjust this to your server's endpoint
        type: 'POST',
        dataType: 'json',
        data: postData,
        success: function(response) {
            if (response.status === '200') {
                alert('Booking confirmed successfully');
                $('.modal').modal('hide');
                fetchBooking();
                fetchBookingCount();
                fetchTotalPassengers();
                
            } else {
                alert('Failed to confirm booking: ' + response.message);
            }
        },
        error: function(xhr, status, error) {
            alert('Failed to confirm booking: ' + error);
        }
    });
});

$('#bookingDetailsModal').on('hidden.bs.modal', function () {
    $('#bookingForm')[0].reset();
    bookSave.removeAttribute('data-book-id');
});







$(document).on('click', '.accept-btn', function() {
    var row = $(this).closest('tr');
    var bookId = row.data('book-id');
    updateBookingStatus(bookId, 1, row);
});

$(document).on('click', '.reject-btn', function() {
    var row = $(this).closest('tr');
    var bookId = row.data('book-id');
    updateBookingStatus(bookId, 2, row);
});


// function updateBookingStatus(bookId, u_status, row) {
//     $.ajax({
//         url: '/trip/updateBookingStatus',
//         method: 'POST',
//         data: {
//             book_id: bookId,
//             u_status: u_status
//         },
//         success: function(response) {
//             if (response.status === '200') {
//                 const statusText = getStatusText(u_status);
//                 row.find('td:nth-child(10)').text(statusText).css('color', u_status === 1 ? 'green' : 'red');
//                 row.find('.accept-btn, .reject-btn').attr('disabled', 'disabled');
//             } else {
//                 alert('Failed to update booking status: ' + response.message);
//             }
//         },
//         error: function(xhr, status, error) {
//             alert('Failed to update booking status: ' + error);
//         }
//     });
// }

function updateBookingStatus(bookId, u_status, row) {
    console.log('Sending AJAX request to update booking status', { bookId, u_status });

    $.ajax({
        url: '/trip/updateBookingStatus',
        method: 'POST',
        data: {
            book_id: bookId,
            u_status: u_status
        },
        success: function(response) {
            if (response.status === '200') {
                console.log('AJAX request succeeded', response);
                const statusText = getStatusText(u_status);
                console.log('Updated statusText:', statusText);
                row.find('td:nth-child(11)').text(statusText).css('color', u_status === 1 ? 'green' : 'red');
                row.find('.accept-btn, .reject-btn').attr('disabled', 'disabled');
            } else {
                alert('Failed to update booking status: ' + response.message);
            }
        },
        error: function(xhr, status, error) {
            alert('Failed to update booking status: ' + error);
        }
    });
}


// function getStatusText(u_status) {
//     // console.log('u_status in getStatusText:', u_status); 
//     switch (u_status) {
//         case 0:
//             return 'Pending';
//         case 1:
//             return 'Accepted';
//         case 2:
//             return 'Rejected';
//         default:
//             return 'Unknown';
//     }
// }


function getStatusText(u_status) {
    const statusMap = {
        0: 'Pending',
        1: 'Accepted',
        2: 'Rejected'
    };

    return statusMap[u_status] || 'Unknown';
}




function fetchBooking() {
    $.ajax({
        url: "book/fetch-book",
        method: 'GET',
        dataType: 'json',
    }).done(function (result) {
        console.log(result.books);
        displayBooking(result.books);
    }).fail(function (jqXHR, textStatus, errorThrown) {
        alert('Request failed: ' + textStatus);
        console.log('Error: ' + errorThrown);
    });
}

fetchBooking();



function displayBooking(books) {
    $('#bookDataTable tbody').empty();


    books.forEach(function (book) { 
        const totalPrice = book.price * book.num_passenger ;
        console.log('u_status in getStatusText:', book.u_status); 
        const statusText = getStatusText(book.u_status);
        const statusColor = book.u_status == 1 ? 'green' : book.u_status == 2 ? 'red' : 'black';
        const paymentStatusText = book.payment_status == 1 ? 'Paid' : 'Unpaid';
        const paymentStatusColor = book.payment_status == 1 ? 'green' : 'black';   


        const newRowBook = `<tr data-book-id="${book.book_id}">
            <td>${book.book_id}</td>
            <td>${book.firstname} ${book.lastname}</td>
            <td>${book.email}</td>
            <td>${book.place_name}</td>
            <td>${book.departure_date}</td>
            <td>${book.return_date}</td>
            <td>${totalPrice} JOD</td>
            <td>${book.booking_date}</td>
            <td>${book.num_passenger}</td>
            <td>${book.special_req}</td>
            <td style="color: ${statusColor};">${statusText}</td>
            <td style="color: ${paymentStatusColor};">${paymentStatusText}</td>
            <td class="text-center">
                <button class="btn btn-custom accept-btn" ${book.u_status == 0 ? '' : 'disabled'}><i class="fas fa-check"></i></button>
                <button class="btn btn-custom reject-btn" ${book.u_status == 0 ? '' : 'disabled'}><i class="fas fa-times"></i> </button>
                <button class="btn btn-custom paid-btn" ${book.payment_status == 1 ? 'disabled' : ''}><i class="fa-solid fa-money-check"></i></button>
                <button type="button" class="btn delete-btn" data-book-id="${book.book_id}"><i class="fa-solid fa-trash fs-4 text-danger"></i></button>
            </td>
        </tr>`;
        $('#bookDataTable tbody').append(newRowBook);
        fetchTotalPrice(totalPrice);
    });

    
}



$(document).on('click', '.paid-btn', function() {
    var row = $(this).closest('tr');
    var bookId = row.data('book-id');

    $.ajax({
        url: '/trip/updatePaymentStatus',
        method: 'POST',
        data: {
            book_id: bookId,
            payment_status: 1
        },
        success: function(response) {
            if (response.status === '200') {
                row.find('td:nth-child(12)').text('Paid').css('color', 'green');
                row.find('.paid-btn').attr('disabled', 'disabled');
            } else {
                alert('Failed to update payment status: ' + response.message);
            }
        },
        error: function(xhr, status, error) {
            alert('Failed to update payment status: ' + error);
        }
    });
});





$(document).on('click', '.delete-btn', function() {
    var row = $(this).closest('tr');
    var bookId = row.data('book-id');

    $.ajax({
        url: 'trip/deleteBooking',
        method: 'POST',
        data: {
            book_id: bookId
        },
        success: function(response) {
            if (response.status === '200') {

                row.remove();
                alert('Booking deleted successfully');
            } else {
                alert('Failed to delete booking status: ' + response.message);
            }
        },
        error: function(xhr, status, error) {
            alert(' Failed to delete booking : ' + error);
        }
    });
});




function fetchTripCount() {
    $.ajax({
        url: "trip/fetch-trip-count",
        method: 'GET',
        dataType: 'json',
    }).done(function (result) {
        if (result.status === '200') {
            $('.trip-count').text(result.tripCount); // Update the count in the dashboard
        }
    }).fail(function (jqXHR, textStatus, errorThrown) {
        alert('Request failed: ' + textStatus);
        console.log('Error: ' + errorThrown);
    });
}

    fetchTripCount();


    function fetchBookingCount() {
        $.ajax({
            url: "trip/fetch-booking-count",
            method: 'GET',
            dataType: 'json',
        }).done(function (result) {
            if (result.status === '200') {
                $('.booking-count').text(result.bookingCount); // Update the count in the dashboard
            }
        }).fail(function (jqXHR, textStatus, errorThrown) {
            alert('Request failed: ' + textStatus);
            console.log('Error: ' + errorThrown);
        });
    }

    
     fetchBookingCount();


     function fetchTotalPassengers() {
        $.ajax({
            url: "trip/fetch-total-passengers",
            method: 'GET',
            dataType: 'json',
        }).done(function (result) {
            if (result.status === '200') {
                $('.total-passengers').text(result.totalPassengers); // Update the count in the dashboard
            }
        }).fail(function (jqXHR, textStatus, errorThrown) {
            alert('Request failed: ' + textStatus);
            console.log('Error: ' + errorThrown);
        });
    }
    

        fetchTotalPassengers();

        let updatedTotalPrice = 0;
        function fetchTotalPrice(newTotalPrice) {
            $.ajax({
                url: "trip/fetch-total-price",
                method: 'GET',
                data: { newTotalPrice: newTotalPrice },
                dataType: 'json',
            }).done(function (result) {
                if (result.status === '200') {
                    let currentTotalPrice = parseFloat(result.totalPrice); // Parse the current total price from the result
                    updatedTotalPrice =  updatedTotalPrice + currentTotalPrice; // Add the new total price to the current total price
                    $('.total-price').text(updatedTotalPrice + ' JOD'); // Update the total price in the dashboard
                }
            }).fail(function (jqXHR, textStatus, errorThrown) {
                alert('Request failed: ' + textStatus);
                console.log('Error: ' + errorThrown);
            });
        }
        

        fetchTotalPrice();






});