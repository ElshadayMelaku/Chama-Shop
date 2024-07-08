<?php
include 'db_connection.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the form data
    $productID = $_POST['productID'];
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $sizes = $_POST['sizes'];
    $imagePath = $_POST['imagePath'];
    $productDescription = $_POST['productDescription'];

    // Prepare the sizes data
    $sizesArray = explode(',', $sizes);
    $productSize = json_encode($sizesArray);

    // Prepare the SQL statement
    $sql = "UPDATE productlist SET ProductName=?, ProductPrice=?, ProductSize=?, ProductDetails=? WHERE ProductID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $productName, $productPrice, $productSize, $productDescription, $productID);

    // Execute the query
    if ($stmt->execute()) {
        echo "Product updated successfully";
    } else {
        echo "Error updating product: " . $stmt->error;
    }

    // Update the image path if provided
    if (!empty($imagePath)) {
        $sqlImg = "UPDATE images SET ImagePath=? WHERE ProductID=?";
        $stmtImg = $conn->prepare($sqlImg);
        $stmtImg->bind_param("ss", $imagePath, $productID);

        if ($stmtImg->execute()) {
            echo "Image path updated successfully";
        } else {
            echo "Error updating image path: " . $stmtImg->error;
        }
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
