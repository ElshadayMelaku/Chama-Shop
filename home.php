<?php
session_start(); // Start the session
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
    <link href="login.php" rel="stylesheet">
    <link href="home.php" rel="stylesheet">
    <link href="woman.css" rel="stylesheet">
    <script src="logout.js" defer></script>
    <!-- <script src="newsletter.js" defer></script> -->

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

    <section class="main-home">
        <div class="main-text">
            <h5>Step into Style</h5>
            <h1>Brand New <br>Collection<br> 2024</h1>
            <p>Your Ultimate Shoe Destination Awaits!</p>
            <a href="mens.php" class="main-btn">Shop Now!<i class='bx bx-right-arrow-alt'></i></a>
        </div>
        <div class="down-arrow">
            <a href="#trending" class="down"><i class='bx bx-down-arrow-alt'></i></a>
        </div>
    </section>
    <!------------------Trending------------>
    <section class="trending-product" id="trending">
    <div class="center-text">
        <h2>Trending</h2>
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
                    p.ProductID DESC 
                LIMIT 10;";
        
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
    <div class="container-view">
        <a href="mens.php" class="view-btn">VIEW All!</a>
    </div>
</section>
<!------------------Featuring------------>
    <section class="Featuring">
        <div class="Featuring-text">
            <h2>Featuring</h2>
        </div>
        <div class="Table-images">
            <div class="womens-image">
                <a href="womens.php">
                    <img src="img/women/sportswear-essential-womens-oversized-bomber-jacket-jpbGpK.webp" alt="women">
                    <p class="picText">Women's</p>
                </a>
            </div>
            <div class="kids-image">
                <a href="kids.php">
                    <img src="img/kids/sb-big-kids-chino-skate-shorts-w5Xpv8.webp" alt="kids">
                    <p class="picText">Kid's</p>
                </a>
            </div>
            <div class="mens-image">
                <a href="Mens.php">
                    <img src="img/mens/primary-mens-dri-fit-short-sleeve-versatile-top-XK77j1.png" alt="men">
                    <p class="picText">Men's</p>
                </a>
            </div>
        </div>
    </section>
<!------------------Kids products------------>
    <section class="kidsProducts" id="kidsProducts">
        <div class="kids">
            <h2>Kids</h2>
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
                    p.CategoryID = 3
                ORDER BY 
                    p.ProductID DESC 
                LIMIT 4;";
        
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="row">';
                echo '<a href="singleproductspage.php?productID=' . $row['ProductID'] . '">';
                echo '<img src="' . htmlspecialchars($row['ImagePath']) . '" alt="' . htmlspecialchars($row['ProductName']) . '">';
                echo '<div class="price">';
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
        <div class="container-view-kids">
            <a href="kids.php" class="view-btn-kids">VIEW ALL!</a>
        </div>
    </section>
<!------------------Video------------>
    <section class="video-section">
        <div class="video-container">
            <video class="video" autoplay muted loop>
                <source src="img/Nike. Just Do It. Nike.com.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    </section>
<!------------------Womens product------------>
    <section class="WomensProducts" id="WomansProducts">
        <div class="Womens">
            <h2>Women's</h2>
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
                    p.CategoryID = 2
                ORDER BY 
                    p.ProductID DESC 
                LIMIT 4;";
        
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="row">';
                echo '<a href="singleproductspage.php?productID=' . $row['ProductID'] . '">';
                echo '<img src="' . htmlspecialchars($row['ImagePath']) . '" alt="' . htmlspecialchars($row['ProductName']) . '">';
                echo '<div class="price">';
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
        <div class="container-view-kids">
            <a href="womens.php" class="view-btn-kids">VIEW ALL!</a>
            </div>
</section>

<!------------------Updates News------------>
<div class="news">
    <h2>News <span>Updates</span></h2>
</div>
   <section class="newsletter" id="newsletter" style="background-image: url('img/banner1.jpg');">
    <div class="newstext">
        <h4>Sign up for Newsletters</h4>
        <p>Get Email Updates about our latest shop and <span>Special Offers.</span></p>
    </div>
    <div class="form">
        <input type="email" id="email" name="email" placeholder="Your Email Address" required>
        <button type="submit" class="signup">Sign up</button>
        <div id="newsletter-message" style="display:none;"></div>
    </div>
</section>

<!-- <section class="newsletter" id="newsletter">
    <div class="newstext">
        <h4>Sign up for Newsletters</h4>
        <p>Get Email Updates about our latest shop and <span>Special Offers.</span></p>
    </div>
    <div class="form">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="newsletter-form">
            <input type="email" id="email" name="email" placeholder="Your Email Address" required>
            <button type="submit" class="signup">Sign up</button>
            <div id="newsletter-message" style="display:none;"></div>
        </form>
    </div>
</section> -->

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    include 'db_connection.php'; // Ensure this includes your database connection details

    // Validate and sanitize email
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format');</script>";
        // You can also add more robust error handling here if needed
    } else {
        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Check if email already exists
        $checkQuery = "SELECT Email FROM newsletters WHERE Email = ?";
        $stmtCheck = $conn->prepare($checkQuery);
        $stmtCheck->bind_param("s", $email);
        $stmtCheck->execute();
        $stmtCheck->store_result();

        // If email exists, handle the error
        if ($stmtCheck->num_rows > 0) {
            echo "<script>alert('Error: Email $email already exists.');</script>";
        } else {
            // Insert into newsletters table
            $sqlInsert = "INSERT INTO newsletters (Email) VALUES (?)";
            $stmtInsert = $conn->prepare($sqlInsert);
            $stmtInsert->bind_param("s", $email);

            if ($stmtInsert->execute()) {
                echo "<script>alert('Thank you for subscribing to our newsletter!');</script>";
            } else {
                echo "<script>alert('Error: Could not execute $sqlInsert');</script>";
            }
        }

        $conn->close();
    }
}
?>


<!-------------contact------------>

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
     <script src="home.js"></script>
     <!-- <script src="newsletter.js"></script> -->
      <script>
        function showSidebar(){
    const sidebar = document.querySelector('.sidebar')
    sidebar.style.display = 'flex'
}
function hideSidebar(){
    const sidebar = document.querySelector('.sidebar')
    sidebar.style.display = 'none'
}

      </script>
</body>
 </html>