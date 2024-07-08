<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "chamadatabase";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];

// Create a new order
$sql = "INSERT INTO orders (UserID) VALUES (?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$order_id = $stmt->insert_id;
$stmt->close();

// Move cart items to order details
$sql = "INSERT INTO orderdetails (OrderID, ProductID, Quantity, Price)
        SELECT ?, c.ProductID, c.Quantity, p.ProductPrice 
        FROM cart c 
        JOIN productlist p ON c.ProductID = p.ProductID 
        WHERE c.UserID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $order_id, $user_id);
$stmt->execute();
$stmt->close();

// Clear the cart
$sql = "DELETE FROM cart WHERE UserID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->close();

$conn->close();

echo "Checkout complete. Your order has been placed.";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="home.css" rel="stylesheet">
    <link href="cart.css" rel="stylesheet">
    <link href="login.php" rel="stylesheet">
    <link href="home.php" rel="stylesheet">
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

    <div class="sidebar" id="sidebar">

<div class="sidebar-content">
    <ul class="lists">
    <li   onclick=hideSidebar() class="list">
            <a href="#"  class="logo">
            <i  class='bx bx-x' id="close-sidebar"></i>
            </a>
        </li>
        <li  class="list">
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
        <li  class="list">
            <a href="mens.php" class="nav-link">
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



    <section class="cartheading">
        <div class="cartheading-text">
            <h2>Order Placed!!!</h2>
            <p class> Thank You for Shopping with Us!
            </p>
        </div>
    </section>
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