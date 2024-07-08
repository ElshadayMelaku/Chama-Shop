document.addEventListener('DOMContentLoaded', function () {
    const searchIcon = document.querySelector('.bx-search');
    const searchForm = document.querySelector('.nav-icon form');

    searchIcon.addEventListener('click', function (event) {
        event.preventDefault();
        searchForm.style.display = searchForm.style.display === 'none' || searchForm.style.display === '' ? 'flex' : 'none';
    });
});
function confirmLogout(event) {
    event.preventDefault(); // Prevent the default action (navigation)
    if (confirm("Are you sure you want to log out?")) {
        window.location.href = 'logout.php'; // Redirect to the logout script
    }
}
function showSidebar(){
    const sidebar = document.querySelector('.sidebar')
    sidebar.style.display = 'flex'
}
function hideSidebar(){
    const sidebar = document.querySelector('.sidebar')
    sidebar.style.display = 'none'
}
