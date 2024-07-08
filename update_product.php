<!DOCTYPE html>
<html>
<head>
    <title>Update Product</title>
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

        .results {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Update Product</h1>
    <nav>
        <a href="insert_product.php" onclick="showSection('insert')">Insert</a> |
        <a href="update_product.php" onclick="showSection('update')">Update</a> |
        <a href="delete_product.php" onclick="showSection('delete')">Delete</a> |
        <a href="view_all.php" onclick="showSection('viewall')">View All</a> |
        <a href="search_product.php" onclick="showSection('search')">Search</a>
    </nav>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="searchTerm">Search by Product ID or Name:</label>
        <input type="text" id="searchTerm" name="searchTerm" required>
        <input type="submit" value="Search">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['searchTerm'])) {
        include 'db_connection.php';
        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $searchTerm = $_POST['searchTerm'];
        $sql = "SELECT pl.*, img.ImagePath 
                FROM productlist pl
                LEFT JOIN images img ON pl.ProductID = img.ProductID
                WHERE pl.ProductID = '$searchTerm' OR pl.ProductName LIKE '%$searchTerm%'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $product = $result->fetch_assoc();
            $productID = htmlspecialchars($product["ProductID"]);
            $productName = htmlspecialchars($product["ProductName"]);
            $productPrice = htmlspecialchars($product["ProductPrice"]);
            $productDetails = isset($product["ProductDetails"]) ? htmlspecialchars($product["ProductDetails"]) : '';
            
            $productSizeDecoded = json_decode($product["ProductSize"], true);
            $productSize = is_array($productSizeDecoded) ? htmlspecialchars(implode(", ",
            $productSizeDecoded)) : htmlspecialchars($product["ProductSize"]);

            $imagePath = isset($product["ImagePath"]) ? htmlspecialchars($product["ImagePath"]) : '';

            // Form to update product details
            echo "<div class='results'>";
            echo "<h2>Update Product Details</h2>";
            echo "<form action='update_product_process.php' method='post'>";
            echo "<input type='hidden' id='productID' name='productID' value='$productID'>";
            echo "<label for='productName'>Product Name:</label>";
            echo "<input type='text' id='productName' name='productName' value='$productName' required><br><br>";
            echo "<label for='productPrice'>Product Price:</label>";
            echo "<input type='text' id='productPrice' name='productPrice' value='$productPrice' required><br><br>";
            echo "<label for='sizes'>Sizes (comma separated):</label>";
            echo "<input type='text' id='sizes' name='sizes' value='$productSize' required><br><br>";
            echo "<label for='imagePath'>Product Image Path:</label>";
            echo "<input type='text' id='imagePath' name='imagePath' value='$imagePath' required><br><br>";
            echo "<label for='productDescription'>Product Description:</label>";
            echo "<textarea id='productDescription' name='productDescription' required>$productDetails</textarea><br><br>";
            echo "<input type='submit' value='Update Product'>";
            echo "</form>";
            echo "</div>";
        } else {
            echo "<p>No results found for the given search term '$searchTerm'.</p>";
        }

        $conn->close();
    }
    ?>

</body>
</html>
