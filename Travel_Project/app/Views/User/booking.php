    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4">Online Booking</h1>
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="/index">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active text-white">Online Booking</li>
                </ol>
        </div>
    </div>
    <!-- Header End -->
    

    <!-- Tour Booking Start -->
    <div class="container-fluid py-5">
        <!-- <div class="container py-5"> -->
        <div id="tripsContainer" class="row"></div>
            <!-- <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <h5 class="section-booking-title pe-3">Booking</h5>
                    <h1 class="text-white mb-4">Online Booking</h1>
                    <p class="text-white mb-4">Planning your next adventure is effortless with our comprehensive travel
                        booking website. Whether you're dreaming of a luxurious beach getaway, a thrilling urban escape,
                        or an off-the-beaten-safari adventure, we've got you covered.
                    </p>
                    <p class="text-white mb-4"> finding the perfect options to suit your preferences and budget is a
                        breeze, Our website also offers exclusive deals and discounts, ensuring that you get the best
                        value for your travel experiences. From cozy bed and breakfasts to five-star resorts, and guided
                        tours to independent explorations, we provide everything you need to turn your travel dreams
                        into reality. Book now and don't miss the experience of a lifetime .
                    </p>
                    <a href="#" class="btn btn-light text-primary rounded-pill py-3 px-5 mt-2">Book Here : </a>
                </div>
                <div class="col-lg-6">
                    <h1 class="text-white mb-3">Book A Tour Deals</h1>
                    <p class="text-white mb-4">Get <span class="text-warning">50% Off</span> On Your First Adventure
                        Trip With Trip. Get More Deal Offers Here.</p>
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control bg-white border-0" id="name"
                                        placeholder="Your Name">
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control bg-white border-0" id="email"
                                        placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating date" id="date3" data-target-input="nearest">
                                    <input type="text" class="form-control bg-white border-0" id="datetime"
                                        placeholder="Date & Time" data-target="#date3" data-toggle="datetimepicker" />
                                    <label for="datetime">Date & Time</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select bg-white border-0" id="select1">
                                        <option value="1">Jordan</option>
                                        <option value="2">USA</option>
                                        <option value="3">Europe</option>
                                        <option value="4">Turkey</option>
                                        <option value="5">Japan</option>
                                        <option value="7">Africa</option>
                                    </select>
                                    <label for="select1">Destination</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select bg-white border-0" id="SelectPerson">
                                        <option value="1">Person 1</option>
                                        <option value="2">Person 2</option>
                                        <option value="3">Person 3</option>
                                        <option value="4">Person 4</option>
                                        <option value="5">Person 5</option>
                                        <option value="6">Person 6</option>
                                        <option value="7">Person 7</option>
                                        <option value="8">Person 8</option>
                                        <option value="9">Person 9</option>
                                        <option value="10">Person 10</option>
                                        <option value="11">Person 11</option>
                                        <option value="12">Person 12</option>
                                        <option value="13">Person 13</option>
                                        <option value="14">Person 14</option>
                                        <option value="15">Person 15</option>
                                        <option value="16">Person 16</option>
                                        <option value="17">Person 17</option>
                                        <option value="18">Person 18</option>
                                        <option value="19">Person 19</option>
                                        <option value="20">Person 20</option>
                                    </select>
                                    <label for="SelectPerson">Number of the group</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select bg-white border-0" id="CategoriesSelect">
                                        <option value="1">Kids</option>
                                        <option value="2">1</option>
                                        <option value="3">2</option>
                                        <option value="4">3</option>
                                        <option value="5">4</option>
                                        <option value="6">5</option>
                                        <option value="7">6</option>
                                        <option value="8">7</option>
                                        <option value="9">8</option>
                                        <option value="10">9</option>
                                        <option value="11">10</option>
                                        <option value="12">11</option>
                                        <option value="13">12</option>
                                        <option value="14">13</option>
                                        <option value="15">14</option>
                                        <option value="16">15</option>
                                        <option value="17">16</option>
                                        <option value="18">17</option>
                                        <option value="19">18</option>
                                        <option value="20">19</option>
                                        <option value="21">20</option>
                                    </select>
                                    <label for="CategoriesSelect">Categories</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control bg-white border-0" placeholder="Special Request"
                                        id="message" style="height: 100px"></textarea>
                                    <label for="message">Special Request</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary text-white w-100 py-3" type="submit">Book Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> -->
        <!-- </div> -->
    </div>
    <!-- Tour Booking End -->



    <!-- Booking Modal -->
    <!-- <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookingModalLabel">Book Trip</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="bookingForm">
                        <div class="form-group">
                            <label for="availableSeats">Available Seats</label>
                            <input type="text" class="form-control" id="availableSeats" readonly>
                        </div>
                        <div class="form-group">
                            <label for="numPassengers">Number of Passengers</label>
                            <input type="number" class="form-control" id="numPassengers" min="1" max="">
                        </div>
                        <input type="hidden" id="tripId">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="confirmBooking">Confirm Booking</button>
                </div>
            </div>
        </div>
    </div> -->



    <!-- Booking Modal -->
<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="bookingModalLabel">Book Trip</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="bookingForm">
                        <div class="form-group">
                            <label for="availableSeats">Available Seats</label>
                            <input type="text" class="form-control" id="availableSeats" readonly>
                        </div>
                        <div class="form-group mt-3">
                            <label for="numPassengers">Number of Passengers</label>
                            <input type="number" class="form-control" id="numPassengers" min="1" max="">
                        </div>
                        <div class="form-group mt-3">
                             <label for="message">Special Request</label>
                             <textarea class="form-control bg-white" id="message" style="height: 100px"></textarea>
                        </div>
                        <input type="hidden" id="tripId">
                    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="confirmBooking">Continue</button>
      </div>
    </div>
  </div>
</div>


        <!-- Payment Modal -->
<!-- <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="paymentModalLabel">Book Trip</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="paymentForm">
                        <div class="form-group">
                            <label for="paymentMethod">Choose a payment method</label>
                            <select class="form-control" id="paymentMethod">
                                <option value="0">Credit Card</option>
                                <option value="1">PayPal</option>
                                <option value="2">Bank Transfer</option>
                            </select>
                        </div>
                    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="confirmPayment">Confirm Payment</button>
      </div>
    </div>
  </div>
</div> -->


<!-- Booking Details Modal -->
<div class="modal fade" id="bookingDetailsModal" tabindex="-1" aria-labelledby="bookingDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="bookingDetailsModalLabel">Book Trip</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <!-- Modal content will be dynamically populated by JavaScript -->
        </div>
    </div>
</div>