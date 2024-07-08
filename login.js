$(document).ready(function() {
    $('#loginForm').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission

        var formData = $(this).serialize(); // Serialize form data

        // Log form data for debugging
        console.log('Form Data:', formData);

        $.ajax({
            type: 'POST',
            url: 'login.php',
            data: formData,
            dataType: 'json',
            success: function(response) {
                // Log the response for debugging
                console.log('Response:', response);

                if (response.status === 'success') {
                    window.location.href = 'home.php'; // Redirect to home.php on success
                } else {
                    $('#error-message').text(response.message).show(); // Display error message
                }
            },
            error: function(xhr, status, error) {
                // Log any AJAX errors
                console.error('AJAX Error:', error);
                console.error('Status:', status);
                console.error('XHR:', xhr.responseText);

                $('#error-message').text('An error occurred. Please try again.').show();
            }
        });
    });
});
