<?php
session_start(); // Start the session
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>
    <link rel="stylesheet" type="text/css" href="styles.css"/>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <button class="nav-toggle"><i class="fas fa-bars"></i></button>
    <title>Men's Product</title>
    <link rel="stylesheet" href="kids.css">
    <link href="shop.html" rel="stylesheet">
    <link href="login.html" rel="stylesheet">
    <link href="home.html" rel="stylesheet">
    <link href="home.css" rel="stylesheet">
    <link href="kids.css" rel="stylesheet">

</head>

<body>
<header class="head">
        <a href="home.php" class="logo"><img src="img/chama.png" alt="ch-ama"></a>
        <ul class="navmenu">
            <li class="hideontablet"><a href="home.php">Home</a></li>
            <li class="hideontablet"><a href="kids.php">Kids</a></li>
            <li class="hideontablet"><a href="Mens.php">Men's</a></li>
            <li class="hideontablet"><a href="womens.php">Women's</a></li>
        </ul>
            <ul class="navmenu">
            <li><a href="search.php"><i class='bx bx-search' id="hideonmobile" ></i></a></li>
            <li><a href="login.php"><i class='bx bx-user'  id="hideonmobile" ></i></a></li>
            <li><a href="cart.php"><i class="bx bx-shopping-bag"  id="hideonmobile" ></i></a></li>
            <li><a href="#" onclick="confirmLogout(event)"><i class='bx bx-log-out'  id="hideonmobile" ></i></a></li>
            </ul>
            <a href="#" onclick="showSidebar()"> <i  class="bx bx-menu" id="menu-icon"></i></a>
    </header>
    <button class="nav-toggle"><i class="fas fa-bars"></i></button>

    <div class="sidebar" id="sidebar">
        <div class="sidebar-content">
            <ul class="lists">
            <li   onclick=hideSidebar() class="list">
                    <a href="#"  class="logo">
                    <i  class='bx bx-x' id="close-sidebar"></i>
                    </a>
                </li>
                <li class="list">
                    <a href="home.php" class="nav-link">
                        <i class="bx bx-home-alt icon"></i>
                        <span class="link">Home</span>
                    </a>
                </li>
                <li class="list">
                    <a href="kids.php" class="nav-link">
                        <i class="bx bx-child icon"></i>
                        <span class="link">Kids</span>
                    </a>
                </li>
                <li class="list">
                    <a href="Mens.php" class="nav-link">
                        <i class="bx bx-male icon"></i>
                        <span class="link">Men's</span>
                    </a>
                </li>
                <li class="list">
                    <a href="womens.php" class="nav-link">
                        <i class="bx bx-female icon"></i>
                        <span class="link">Women's</span>
                    </a>
                </li>
                <li class="list">
                    <a href="search.php" class="nav-link">
                        <i class="bx bx-search icon"></i>
                        <span class="link">Search</span>
                    </a>
                </li>
                <li class="list">
                    <a href="login.php" class="nav-link">
                        <i class="bx bx-user icon"></i>
                        <span class="link">Login</span>
                    </a>
                </li>
                <li class="list">
                    <a href="cart.php" class="nav-link">
                        <i class="bx bx-shopping-bag icon"></i>
                        <span class="link">Cart</span>
                    </a>
                </li>
                <li class="list">
                    <a href="#" onclick="confirmLogout(event)" class="nav-link">
                        <i class="bx bx-log-out icon"></i>
                        <span class="link">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <section class="overlay" id="overlay"></section>
    <section class="product-slider">
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "chamadatabase";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch product information
    $sql = "SELECT p.ProductID, p.ProductName, i.ImagePath 
            FROM productlist p 
            JOIN images i ON p.ImageID = i.ImageID
              WHERE 
                    p.CategoryID = 1
                ORDER BY 
                    p.ProductID DESC
                    limit 10";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<a href='singleproductspage.php?productID=" . $row['ProductID'] . "'>";
            echo "<img src='" . $row['ImagePath'] . "' alt='" . $row['ProductName'] . "'>";
            echo "</a>";
            echo "</div>";
        }
    } else {
        echo "No products found.";
    }
    $conn->close();
    ?>


    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script type="text/javascript" src="slider.js"></script>
</section> 
 

  <section>
  <div class="center-text">
        <div> <h2>Men's</h2></div>
</div>
    <div class="products">
   
        <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "chamadatabase";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Updated SQL query to join the productlist and images tables
        $sql = "SELECT 
                    p.ProductID, 
                    p.ProductPrice, 
                    p.ProductName,
                    i.ImagePath 
                FROM 
                    productlist p 
                JOIN 
                    images i 
                ON 
                    p.ImageID = i.ImageID 
                WHERE 
                    p.CategoryID = 1
                ORDER BY 
                    p.ProductID DESC";
        
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="row">';
                echo '<a href="singleproductspage.php?productID=' . $row['ProductID'] . '">';
                echo '<img src="' . htmlspecialchars($row['ImagePath']) . '" alt="' . htmlspecialchars($row['ProductName']) . '">';
                echo '<div class="price">';
                echo '<h4>' . htmlspecialchars($row['ProductName']) . '</h4>';
                echo '<p>' . htmlspecialchars($row['ProductPrice']) . ' ETB</p>';
                echo '</div>';
                echo '</a>';
                echo '</div>';
            }
        } else {
            echo "No trending products found.";
        }
        

        $conn->close();
        ?>
    </div>
   
</section>


    <!-------------contact------------>
<footer>
    <section class="contact">
        <div class="low-text">
            <h2>Contact <span>Us</span></h2>
        </div>
        <div class="contact-info">
            <div class="first-info">
                <img src="img/chama.png">
                <p>Adiss abeba, Kotebe</p>
                <p>+251 985 54 62 75</p>
                <p>+251 970 94 68 88</p>
                <p>elshaday19melaku@gmail.com</p>
            </div>

            <div class="second-info">
                <h4>support</h4>
                <p>Contact us</p>
                <p>About</p>
                <p>Size guide</p>
                <p>Shopping</p>
                <p>Privacy & Policy</p>
            </div>

            <div class="third-info">
                <h4>shop</h4>
                <p>Men's</p>
                <p>Women's</p>
                <p>Kid's</p>
                <p>Discount</p>
            </div>

            <div class="fourth-info">
                <h4>Company</h4>
                <p>About</p>
                <p>Blog</p>
                <p>Affiliate</p>
                <p>Login</p>
            </div>

            <div class="fifth-info">
                <h4>Subscribe</h4>
                <p>Contact us</p>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.<br> Animi, numquam?</p>
            </div>

            <div class="social-icon">
                <a href="https://www.facebook.com"><i class='bx bxl-facebook'></i></a>
                <a href="https://x.com"><i class='bx bxl-twitter'></i></a>
                <a href="https://www.instagram.com"><i class='bx bxl-instagram'></i></a>
                <a href="https://www.youtube.com"><i class='bx bxl-youtube'></i></a>
                <a href="https://www.linkedin.com"><i class='bx bxl-linkedin'></i></a>
            </div>
        </div>
        </div>
    </section>

    <div class="end-text">
        <p>Copyright@2024, All Rights Reserved. Designed by Groups</p>
    </div>
</footer>
    <script src="home.js"></script>
</body>

</html>