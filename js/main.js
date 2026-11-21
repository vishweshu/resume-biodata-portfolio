// Simple jQuery and JavaScript for Student Assignment

$(document).ready(function () {
    // 1. Highlight the current active page in the navigation bar
    var currentPage = window.location.pathname.split("/").pop();
    if (currentPage === "" || currentPage === "index.html") {
        $('nav a[href="index.html"]').addClass("active");
    } else {
        $('nav a[href="' + currentPage + '"]').addClass("active");
    }

    // 2. Print Document functionality (for Resume and Bio-Data pages)
    $("#printBtn").click(function () {
        window.print();
    });

    // 3. Simple Contact Form Validation using jQuery
    $("#contactForm").submit(function (event) {
        event.preventDefault(); // Stop normal form submit

        var name = $("#name").val().trim();
        var email = $("#email").val().trim();
        var subject = $("#subject").val().trim();
        var message = $("#message").val().trim();

        // Check if any field is empty
        if (name === "" || email === "" || subject === "" || message === "") {
            alert("Please fill in all the required fields.");
            return false;
        }

        // Basic email check
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            alert("Please enter a valid email address.");
            return false;
        }

        // Display success message and clear form
        alert("Thank you, " + name + "! Your message has been sent successfully.");
        $("#contactForm")[0].reset();
    });

    // 4. Set current date automatically on Bio-data page
    var today = new Date();
    var formattedDate = today.toLocaleDateString("en-GB", {
        day: "numeric",
        month: "long",
        year: "numeric"
    });
    $("#currentDate").text(formattedDate);
});
