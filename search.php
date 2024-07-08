<?php
session_start(); // Start the session
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Results</title>
    <link href="search.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="SearchText" ><span class="C" >Search</span> Products</h2>
        <form class="SearchForm" action="" method="GET">
            <input type="text" name="query" placeholder="Search products..." required>
            <button  class="SearchButton" type="submit">Search</button>
        </form>
        <?php
        // Database connection and search query execution
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "chamadatabase"; 

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $search_results = [];
        if (isset($_GET['query'])) {
            $query = $_GET['query'];

            $stmt = $conn->prepare("SELECT pl.ProductID, pl.ProductName, pl.ProductDetails, pl.ProductPrice, pl.CategoryID, im.ImagePath 
            FROM productlist pl
            LEFT JOIN images im ON pl.ProductID = im.ProductID
            WHERE pl.ProductName LIKE ? OR pl.ProductDetails LIKE ?");

            $search_term = "%$query%";
            $stmt->bind_param("ss", $search_term, $search_term);
            $stmt->execute();
            $result = $stmt->get_result();

            while ($row = $result->fetch_assoc()) {
                $search_results[] = $row;
            }

            $stmt->close();
        }
        $conn->close();
        ?>
        
        <?php if (!empty($search_results)): ?>
            <h2>Search Results</h2>
            <ul class="product-list">
                <?php foreach ($search_results as $result): ?>
                    <li>
                    <?php echo $result['ProductID']; ?>
                    <a href="singleproductspage.php?productID=<?php echo $result['ProductID']; ?>">
                            <img src="<?php echo $result['ImagePath']; ?>" alt="<?php echo htmlspecialchars($result['ProductName']); ?>">
                            <div class="product-info">
                                <strong><?php echo htmlspecialchars($result['ProductName']); ?></strong><br>
                                <?php echo "Product Price: $" . htmlspecialchars($result['ProductPrice']); ?><br>
                                
                            </div>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php elseif (isset($_GET['query'])): ?>
            <p>No results found for "<?php echo htmlspecialchars($query); ?>"</p>
        <?php endif; ?>
    </div>
</body>
</html>
