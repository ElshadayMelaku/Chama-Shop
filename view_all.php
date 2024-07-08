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

        .hidden {
            display: none;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
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
    </style>
    <script>
        function showSection(section) {
            const sections = document.querySelectorAll('section');
            sections.forEach((sec) => sec.classList.add('hidden'));
            document.getElementById(section).classList.remove('hidden');
        }
    </script>
</head>
<body>
    <h1>Admin Page</h1>
    <nav>
        <a href="insert_product.php" onclick="showSection('insert')">Insert</a> |
        <a href="update_product.php" onclick="showSection('update')">Update</a> |
        <a href="delete_product.php" onclick="showSection('delete')">Delete</a> |
        <a href="view_all.php" onclick="showSection('viewall')">View All</a> |
        <a href="search_product.php" onclick="showSection('search')">Search</a>
    </nav>

    <section id="viewall">
        <h2>View All Products</h2>
        <?php
include 'db_connection.php';
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT pl.ProductID, pl.ProductName, pl.ProductPrice, pl.ProductDetails, pl.ProductSize, img.ImagePath
        FROM productlist pl
        LEFT JOIN images img ON pl.ProductID = img.ProductID";
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
        
        // Check if ProductSize is a string or an array
        if (is_array(json_decode($row["ProductSize"], true))) {
            $productSize = htmlspecialchars(implode(", ", json_decode($row["ProductSize"], true)));
        } else {
            $productSize = htmlspecialchars($row["ProductSize"]);
        }
        
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
} else {
    echo "No products found.";
}

$conn->close();
?>

    </section>
</body>
</html>
