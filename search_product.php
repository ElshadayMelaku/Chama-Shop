<!DOCTYPE html>
<html>
<head>
    <title>Search Product</title>
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

        input[type=text] {
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
    </head>
<body>
    <h1>Search Products</h1>
    <nav>
        <a href="insert_product.php" onclick="showSection('insert')">Insert</a> |
        <a href="update_product.php" onclick="showSection('update')">Update</a> |
        <a href="delete_product.php" onclick="showSection('delete')">Delete</a> |
        <a href="view_all.php" onclick="showSection('viewall')">View All</a> |
        <a href="search_product.php" onclick="showSection('search')">Search</a>
    </nav>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="productName">Search by Product Name:</label>
        <input type="text" id="productName" name="productName" required>
        <input type="submit" value="Search">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['productName'])) {
        include 'db_connection.php';
        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $productName = $_POST['productName'];
        $sql = "SELECT pl.ProductID, pl.ProductName, pl.ProductPrice, pl.ProductDetails, pl.ProductSize, img.ImagePath
        FROM productlist pl
        LEFT JOIN images img ON pl.ProductID = img.ProductID
        WHERE ProductName LIKE '%$productName%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Product Details</th>
                <th>Product Size</th>
                <th>Product Image Path</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        $productID = htmlspecialchars($row["ProductID"]);
        $productName = htmlspecialchars($row["ProductName"]);
        $productPrice = htmlspecialchars($row["ProductPrice"]);
        $productDetails = htmlspecialchars($row["ProductDetails"]);
        $productSize = htmlspecialchars(implode(", ", json_decode($row["ProductSize"], true)));
        $imagePath = htmlspecialchars($row["ImagePath"]);

        echo "<tr>
                <td>$productID</td>
                <td>$productName</td>
                <td>$productPrice</td>
                <td>$productDetails</td>
                <td>$productSize</td>
                <td>$imagePath</td>
            </tr>";
    }
    echo "</table>";
            echo "</div>";
        } else {
            echo "<p>No products found matching '$productName'.</p>";
        }

        $conn->close();
    }
    ?>
</body>
</html>