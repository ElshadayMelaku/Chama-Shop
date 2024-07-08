<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1 {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
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

        form {
            margin-top: 20px;
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

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .button {
            background-color: #f44336;
            color: white;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 4px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #cc0000;
        }

        .popup {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
            display: none;
        }

        .popup-content {
            background-color: #fefefe;
            margin: 20% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
            text-align: center;
            border-radius: 5px;
            position: relative;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 20px;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
    <script>
        function showPopup() {
            document.getElementById('popup').style.display = 'block';
        }

        function closePopup() {
            document.getElementById('popup').style.display = 'none';
        }
    </script>
</head>
<body>
<h1>Delete Product</h1>
    <nav>
        <a href="insert_product.php">Insert</a> |
        <a href="update_product.php">Update</a> |
        <a href="delete_product.php">Delete</a> |
        <a href="view_all.php">View All</a> |
        <a href="search_product.php">Search</a>
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
                WHERE pl.ProductID = ? OR pl.ProductName LIKE ?";
        $stmt = $conn->prepare($sql);
        $likeSearchTerm = "%" . $searchTerm . "%";
        $stmt->bind_param("ss", $searchTerm, $likeSearchTerm);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $product = $result->fetch_assoc();
            $productID = htmlspecialchars($product["ProductID"]);
            $productName = htmlspecialchars($product["ProductName"]);
            $productPrice = htmlspecialchars($product["ProductPrice"]);
            $productDetails = isset($product["ProductDetails"]) ? htmlspecialchars($product["ProductDetails"]) : '';
            $productSizeArray = json_decode($product["ProductSize"], true);
            $productSize = is_array($productSizeArray) ? htmlspecialchars(implode(", ", $productSizeArray)) : htmlspecialchars($product["ProductSize"]);
            $imagePath = isset($product["ImagePath"]) ? htmlspecialchars($product["ImagePath"]) : '';
        ?>

        <div>
            <h2>Product Details</h2>
            <table>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product Details</th>
                    <th>Product Size</th>
                    <th>Product Image Path</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td><?php echo $productID; ?></td>
                    <td><?php echo $productName; ?></td>
                    <td><?php echo $productPrice; ?></td>
                    <td><?php echo $productDetails; ?></td>
                    <td><?php echo $productSize; ?></td>
                    <td><?php echo $imagePath; ?></td>
                    <td><button class="button" onclick="showPopup()">Delete</button></td>
                </tr>
            </table>
        </div>

        <div id="popup" class="popup">
            <div class="popup-content">
                <span class="close" onclick="closePopup()">&times;</span>
                <p>Are you sure you want to delete this product?</p>
                <form action="delete_confirm.php" method="post">
                    <input type="hidden" name="productID" value="<?php echo $productID; ?>">
                    <input type="submit" value="Yes, Delete">
                </form>
            </div>
        </div>

    <?php
        } else {
            echo "No results found for the given search term.";
        }

        
        $stmt->close();
        $conn->close();
    }
    ?>
</body>
</html>
