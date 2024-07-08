document.getElementById('login-form').addEventListener('submit', function(event) {
    event.preventDefault();

    var formData = new FormData(this);

    fetch('login.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            loggedInStatus = true;
            hideLoginPopup();
            alert('Logged in successfully. You can now add products to the cart.');
        } else {
            alert('Login failed: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});

// Close button event listener
document.querySelector('.close-btn').addEventListener('click', function() {
    hideLoginPopup();
});
