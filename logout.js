// logout.js
function confirmLogout(event) {
    event.preventDefault(); // Prevent the default action (navigation)
    if (confirm("Are you sure you want to log out?")) {
        window.location.href = 'logout.php'; // Redirect to the logout script
    }
}
