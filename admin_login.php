<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chamadatabase";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$loginError = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Log POST data for debugging
    error_log('POST data: ' . print_r($_POST, true));

    // Ensure the username and password keys exist in the $_POST array
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM Users WHERE UserName = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            // Log the fetched user data for debugging
            error_log('Fetched user data: ' . print_r($user, true));

            if (password_verify($password, $user['Password'])) {
                if ($user['isAdmin']) { // Check if the user is an admin
                    $_SESSION['user_id'] = $user['UserID'];
                    $_SESSION['is_admin'] = $user['isAdmin']; // Store isAdmin status in session
                    echo json_encode(['status' => 'success']);
                } else {
                    $loginError = 'Access denied. Only admins can log in.';
                    echo json_encode(['status' => 'error', 'message' => $loginError]);
                }
                exit;
            } else {
                $loginError = 'Invalid password';
                echo json_encode(['status' => 'error', 'message' => $loginError]);
                exit;
            }
        } else {
            $loginError = 'User not found';
            echo json_encode(['status' => 'error', 'message' => $loginError]);
            exit;
        }
        $stmt->close();
    } else {
        $loginError = 'Username and password are required';
        echo json_encode(['status' => 'error', 'message' => $loginError]);
        exit;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link href="admin_login.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="admin_login.js"></script> <!-- Link to the external JS file -->
</head>
<body>
<section class="loginbackground">
    <h2>Login</h2>
    <form method="post" action="admin_login.php" id="loginForm">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <span id="usernameError" class="error"></span><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <span id="passwordError" class="error"></span><br>
        <input type="submit" value="Login">
    </form>
    <p id="error-message" class="error" style="display: none;"></p>
</section>
</body>
</html>
