document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form");

    form.addEventListener("submit", function(event) {
        // Prevent the form from submitting
        event.preventDefault();

        // Clear previous error messages
        const errorMessages = document.querySelectorAll(".error-message");
        errorMessages.forEach(function(message) {
            message.textContent = "";
        });

        // Get form inputs
        const username = document.getElementById("username").value;
        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;
        const firstName = document.getElementById("first_name").value;
        const lastName = document.getElementById("last_name").value;
        const phone = document.getElementById("phone").value;

        // Validate inputs
        let valid = true;

        if (password.length < 6) {
            document.getElementById("password-error").textContent = "Password must be at least 6 characters long.";
            valid = false;
        }

        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            document.getElementById("email-error").textContent = "Please enter a valid email address.";
            valid = false;
        }

        const phonePattern = /^\d+$/;
        if (!phonePattern.test(phone)) {
            document.getElementById("phone-error").textContent = "Phone number must contain only digits.";
            valid = false;
        }

        // If all validations pass, submit the form
        if (valid) {
            form.submit();
        }
    });
});
