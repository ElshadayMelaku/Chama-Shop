<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "chamadatabase";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash the password
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone = $_POST['phone'];

    // Prepare and execute SQL query
    $sql = "INSERT INTO Users (UserName, Password, Email, FirstName, LastName, Phone) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        echo "Error: " . $conn->error;
        exit();
    }
    $stmt->bind_param("ssssss", $username, $hashedPassword, $email, $first_name, $last_name, $phone);

    if ($stmt->execute()) {
        // Redirect to login page after successful sign-up
        header("Location: login.php?signup=success");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link href="signup.css" rel="stylesheet">
    <script src="signup.js"></script>

</head>
<body>
    <section class="signinbackground">
        <h2>Sign Up</h2>
        <form method="post" action="signup.php">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" required><br>
            <span id="username-error" class="error"></span><br>

            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br>
            <span id="email-error" class="error"></span><br>

            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br>
            <span id="password-error" class="error"></span><br>

            <label for="first_name">First Name:</label><br>
            <input type="text" id="first_name" name="first_name" required><br>
            <span id="first_name-error" class="error"></span><br>

            <label for="last_name">Last Name:</label><br>
            <input type="text" id="last_name" name="last_name" required><br>
            <span id="last_name-error" class="error"></span><br>

            <label for="phone">Phone:</label><br>
            <input type="text" id="phone" name="phone" required><br>
            <span id="phone-error" class="error"></span><br>

            <input type="submit" value="Sign Up">
        </form>
    </section>
</body>
</html>

