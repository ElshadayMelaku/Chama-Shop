<!DOCTYPE html>
<html>
<head>
    <title>Insert New Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        nav {
            background-color: #eee;
            padding: 10px;
            margin-bottom: 20px;
        }

        nav a {
            margin-right: 10px;
            color: #333;
            text-decoration: none;
        }

        nav a:hover {
            color: #000;
        }

        h1 {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #f2f2f2;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type=text],
        textarea {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type=submit] {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type=submit]:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <h1>Insert New Product</h1>
    <nav>
        <a href="insert_product.php" onclick="showSection('insert')">Insert</a> |
        <a href="update_product.php" onclick="showSection('update')">Update</a> |
        <a href="delete_product.php" onclick="showSection('delete')">Delete</a> |
        <a href="view_all.php" onclick="showSection('viewall')">View All</a> |
        <a href="search_product.php" onclick="showSection('search')">Search</a>
    </nav>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="productID">Product ID:</label>
        <input type="text" id="productID" name="productID" required><br><br>

        <label for="productName">Product Name:</label>
        <input type="text" id="productName" name="productName" required><br><br>

        <label for="productPrice">Product Price:</label>
        <input type="text" id="productPrice" name="productPrice" required><br><br>

        <label for="sizes">Sizes (comma separated):</label>
        <input type="text" id="sizes" name="sizes" required><br><br>

        <label for="productDetails">Product Details:</label>
        <textarea id="productDetails" name="productDetails" required></textarea><br><br>

        <label for="imagePath">Product Image Path:</label>
        <input type="text" id="imagePath" name="imagePath" required><br><br>

        <label for="categoryID">Category ID:</label>
        <input type="text" id="categoryID" name="categoryID" required><br><br>

        <label for="imageID">Image ID:</label>
        <input type="text" id="imageID" name="imageID" required><br><br>

        <input type="submit" value="Add Product">
    </form>

    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db_connection.php';
    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare data from form
    $productID = $_POST['productID'];
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $sizes = $_POST['sizes']; // Assuming this comes as an array from your form
    $productDetails = $_POST['productDetails'];
    $imagePath = $_POST['imagePath'];
    $categoryID = $_POST['categoryID'];
    $imageID = $_POST['imageID'];

    // Convert sizes array to JSON
    $sizesJson = json_encode($sizes);

    // Check if ProductID already exists
    $checkQuery = "SELECT ProductID FROM productlist WHERE ProductID = ?";
    $stmtCheck = $conn->prepare($checkQuery);
    $stmtCheck->bind_param("s", $productID);
    $stmtCheck->execute();
    $stmtCheck->store_result();

    // If ProductID exists, handle the error
    if ($stmtCheck->num_rows > 0) {
        echo "Error: ProductID '$productID' already exists. Please choose a different ProductID.";
    } else {
        // Insert into productlist table
        $sqlProductList = "INSERT INTO productlist (ProductID, ProductName, ProductPrice, ProductSize, ProductDetails, CategoryID, ImageID) 
                           VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmtProductList = $conn->prepare($sqlProductList);

        // Check for prepare error
        if ($stmtProductList === false) {
            die('Error preparing statement: ' . $conn->error);
        }

        // Bind parameters
        $stmtProductList->bind_param("sssssis", $productID, $productName, $productPrice, $sizesJson, $productDetails, $categoryID, $imageID);

        // Execute the statement
        if ($stmtProductList->execute()) {
            // Insert into images table
            $sqlImages = "INSERT INTO images (ImageID, ProductID, ImagePath) VALUES (?, ?, ?)";
            $stmtImages = $conn->prepare($sqlImages);

            // Check for prepare error
            if ($stmtImages === false) {
                die('Error preparing statement: ' . $conn->error);
            }

            // Bind parameters
            $stmtImages->bind_param("sis", $imageID, $productID, $imagePath);

            // Execute the statement
            if ($stmtImages->execute()) {
                echo "<p>New product added successfully to productlist and images table.</p>";
            } else {
                echo "Error: " . $sqlImages . "<br>" . $stmtImages->error;
            }
        } else {
            echo "Error: " . $sqlProductList . "<br>" . $stmtProductList->error;
        }
    }

    $conn->close();
}
?>
</body>
</html>
