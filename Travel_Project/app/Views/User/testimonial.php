    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4">Our Testimonial</h1>
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="/index">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active text-white">Testimonial</li>
                </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Testimonial Start -->
    <div class="container-fluid testimonial py-5">
        <div class="container py-5">
            <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                <h5 class="section-title px-3">Testimonial</h5>
                <h1 class="mb-0">Our Clients Say!!!</h1>
            </div>
            <!-- <div class="testimonial-carousel owl-carousel">
                <div class="testimonial-item text-center rounded pb-4">
                    <div class="testimonial-comment bg-light rounded p-4">
                        <p class="text-center mb-5">"I lived every moment of the experience; The comfort
                            it brought me were beyond compare, Thank you for the wonderful experience!"
                        </p>
                    </div>
                    <div class="testimonial-img p-1">
                        <img src="/asset/img/testimonial-1.jpg" class="img-fluid rounded-circle" alt="Image">
                    </div>
                    <div style="margin-top: -35px;">
                        <h5 class="mb-0">John Abraham</h5>
                        <p class="mb-0">New York, USA</p>
                        <div class="d-flex justify-content-center">
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item text-center rounded pb-4">
                    <div class="testimonial-comment bg-light rounded p-4">
                        <p class="text-center mb-5">"I enjoyed the experience , that was so comfortable i'm so happy
                            with
                            it , can't wait to try it again ,Thank you so much! "
                        </p>
                    </div>
                    <div class="testimonial-img p-1">
                        <img src="/asset/img/testimonial-2.jpg" class="img-fluid rounded-circle" alt="Image">
                    </div>
                    <div style="margin-top: -35px;">
                        <h5 class="mb-0">Lily jack</h5>
                        <p class="mb-0">Rome, Italy</p>
                        <div class="d-flex justify-content-center">
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item text-center rounded pb-4">
                    <div class="testimonial-comment bg-light rounded p-4">
                        <p class="text-center mb-5">"The experience was amazing with comfort and joy. Every moment
                            was a treasure,I couldn't be more grateful. Thank you for making it so
                            memorable!"
                        </p>
                    </div>
                    <div class="testimonial-img p-1">
                        <img src="/asset/img/testimonial-3.jpg" class="img-fluid rounded-circle" alt="Image">
                    </div>
                    <div style="margin-top: -35px;">
                        <h5 class="mb-0">Daniela Ford</h5>
                        <p class="mb-0">Chelsea, London</p>
                        <div class="d-flex justify-content-center">
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item text-center rounded pb-4">
                    <div class="testimonial-comment bg-light rounded p-4">
                        <p class="text-center mb-5">"reflecting on how comforting the experience was,
                            filled with joy, leaving me with happy memories to hold dear. I
                            am deeply thankful to you! "
                        </p>
                    </div>
                    <div class="testimonial-img p-1">
                        <img src="/asset/img/testimonial-4.jpg" class="img-fluid rounded-circle" alt="Image">
                    </div>
                    <div style="margin-top: -35px;">
                        <h5 class="mb-0">Sarah Ahmad</h5>
                        <p class="mb-0">Cairo, Egypt</p>
                        <div class="d-flex justify-content-center">
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                        </div>
                    </div>
                </div>
            </div> -->

    <div class="testim">        

        <!-- Comment input form -->
        <div class="cmnt_input">
            <p class="cmnt_feed"> FeedBack</p>
        </div>
        <div class="input">
            <form id="comment_form" method="POST">
                <div class="rate_sec">
                    <input type="checkbox" id="s1" name="rating" value="1" hidden>
                    <label for="s1"><i class="fa-regular fa-star"></i></label>
                    <input type="checkbox" id="s2" name="rating" value="2" hidden>
                    <label for="s2"><i class="fa-regular fa-star"></i></label>
                    <input type="checkbox" id="s3" name="rating" value="3" hidden>
                    <label for="s3"><i class="fa-regular fa-star"></i></label>
                    <input type="checkbox" id="s4" name="rating" value="4" hidden>
                    <label for="s4"><i class="fa-regular fa-star"></i></label>
                    <input type="checkbox" id="s5" name="rating" value="5" hidden>
                    <label for="s5"><i class="fa-regular fa-star"></i></label>
                </div>
                <div class="T">
                    <input type="text" class="write_cm" name="comment" id="comment" placeholder="Write a comment" required>
                    <button type="submit" class="submit_class rounded-pill" id="submitBtn">Submit</button>
                </div>
                <!-- <div>
                    <input type="text" id="username" name="name" required placeholder="Enter Name" oninvalid="this.setCustomValidity('Enter User Name Here')" oninput="this.setCustomValidity('')">
                </div> -->
            </form>
        </div>

        <div class="cooment_label">
            <p class="cmnt_raghda"><span id="comment_count">0</span> comments</p>
            <span class="com_break"></span>
        </div>
        <div class="comment_section" id="comment_section">
            <div class="comments">
                <!-- Comments will be loaded here dynamically -->
            </div>
        </div>

    </div>



        </div>
    </div>
    <!-- Testimonial End -->

