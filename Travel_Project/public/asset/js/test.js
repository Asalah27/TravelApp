document.addEventListener("DOMContentLoaded", function (event) {

    var ratings = [false, false, false, false, false]; // Array to track star ratings

    $('.rate_sec label').on('click', function() {
        var index = $(this).index(); // Get the index of the clicked label (0-based)
        var isChecked = $('#s' + (index + 1)).prop('checked'); // Check if the corresponding checkbox is checked

        // Toggle the checkbox and star icon
        $('#s' + (index + 1)).prop('checked', !isChecked);
        ratings[index] = !ratings[index]; // Toggle the rating status

        // Update star icons based on ratings array
        for (var i = 0; i < ratings.length; i++) {
            if (ratings[i]) {
                $('.rate_sec label:nth-child(' + (i + 1) + ') i').removeClass('fa-regular').addClass('fa-solid');
            } else {
                $('.rate_sec label:nth-child(' + (i + 1) + ') i').removeClass('fa-solid').addClass('fa-regular');
            }
        }
    });


    document.getElementById("comment_form").addEventListener("submit", function (event) {
        event.preventDefault();

        var comment = document.getElementById("comment").value;
        var rating = getSelectedRating();

        var formData = {
            comment: comment,
            rating: rating,
        };

        $.ajax({
            url: "/submitComment",
            method: "POST",
            dataType: "json",
            data: formData,
        })
        .done(function (data) {
            if (data.status == "success") {
                alert("Review submitted successfully!");
                loadReviews();
                document.getElementById("comment").value = "";
                clearRating();
            } else {
                alert("An error occurred while submitting the review: " + data.message);
            }
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            if (jqXHR.status == 401) {
                alert("You are not logged in. Please log in to submit a comment.");
            } else {
                alert("Request failed: " + textStatus);
            }
            console.log("Error: " + errorThrown);
        });
    });

    function getSelectedRating() {
        var rating = 0;
        for (var i = 0; i < ratings.length; i++) {
            if (ratings[i]) {
                rating++;
            }
        }
        return rating;
    }

    
    function clearRating() {
        ratings = [false, false, false, false, false]; // Reset the ratings array
        $('.rate_sec label i').removeClass('fa-solid').addClass('fa-regular'); // Reset star icons
    }
    

    function loadReviews() {
        $.ajax({
            url: "/getReviews",
            type: "GET",
            dataType: "json",
            success: function (response) {
                if (response.status == "success") {
                    renderReviews(response.reviews);
                } else {
                    console.log("Failed to load reviews");
                }
            },
            error: function (xhr, status, error) {
                console.error("Request failed: " + status + ", " + error);
            }
        });
    }

    loadReviews();

    function renderReviews(reviews) {
        var reviewsHtml = "";
        $("#comment_count").text(reviews.length);

        $.each(reviews, function (index, review) {
            var randomColor = getRandomColor();
            reviewsHtml += '<div class="comment">';
            reviewsHtml += '<div class="cmnt">';
            reviewsHtml += '<div class="user_latter" style="background-color:' + randomColor + ';">' + review.firstname.charAt(0).toUpperCase() + "</div>";
            reviewsHtml += '<div class="comment-author">' + review.firstname + " " + review.lastname + "</div>";
            reviewsHtml += "</div>";
            reviewsHtml += '<div class="comment-text">' + review.comments + "</div>";
            reviewsHtml += '<div class="comment-rating">';
            for (var i = 0; i < review.rating; i++) {
                reviewsHtml += '<i class="fa-solid fa-star"></i>';
            }
            reviewsHtml += "</div>";
            reviewsHtml += "</div>";
        });

        $("#comment_section .comments").html(reviewsHtml);
    }

    function getRandomColor() {
        var letters = "0123456789ABCDEF";
        var color = "#";
        for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }
});