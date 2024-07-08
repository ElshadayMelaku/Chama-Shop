<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chamadatabase";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    error_log("Connection failed: " . $conn->connect_error);
    die("Connection failed: " . $conn->connect_error);
}

$loginError = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    error_log('POST data: ' . print_r($_POST, true));

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM Users WHERE UserName = ?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            error_log("Prepare failed: " . $conn->error);
        }
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            error_log('Fetched user data: ' . print_r($user, true));

            if (password_verify($password, $user['Password'])) {
                $_SESSION['user_id'] = $user['UserID'];
                echo json_encode(['status' => 'success']);
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
    <title>Login</title>
    <link href="login.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="login.js"></script> <!-- Link to the external JS file -->
</head>
<body>
<section class="loginbackground">
        <h2>Login</h2>
        <form method="post" action="login.php" id="loginForm">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" required><br>
            <span id="usernameError" class="error"></span><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br>
            <span id="passwordError" class="error"></span><br>
            <input type="submit" value="Login">
        </form>
        <p id="error-message" class="error" style="display: none;"></p>
        <p>Don't have an account? <a href="signup.php">Sign up</a></p>
    </section>
 </body>
</html>
