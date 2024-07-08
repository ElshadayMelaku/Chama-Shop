<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['productID'])) {
    include 'db_connection.php';
    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $productID = $_POST['productID'];

    // Delete the product from the images table first if there are foreign key constraints
    $sql = "DELETE FROM images WHERE ProductID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $productID);
    $stmt->execute();
    $stmt->close();

    // Delete the product from the productlist table
    $sql = "DELETE FROM productlist WHERE ProductID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $productID);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Product deleted successfully.";
    } else {
        echo "Error deleting product or product not found.";
    }

    $stmt->close();
    $conn->close();

    // Redirect to the delete_product.php page or show a success message
    header("Location: delete_product.php");
    exit();
} else {
    echo "Invalid request.";
}
?>
