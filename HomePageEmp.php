<?php
// Start the session
session_start();

// Include database configuration (assuming valid details in config.php)
include 'config.php';

// Verify and sanitize customerId (replace with appropriate validation logic)
if (!isset($_SESSION['customerId']) || !is_numeric($_SESSION['customerId'])) {
    header("Location: error.php?message=Invalid customer ID");
    exit();
}
$customerId = $_SESSION['customerId'];

// Prepare SQL statement with placeholder for customerId
$sql = "SELECT role FROM job_roles WHERE ID = ?";
$stmt = $connection->prepare($sql);

// Bind parameter and execute
if ($stmt) {
    $stmt->bind_param("i", $customerId);
    $stmt->execute();

    // Bind result
    $stmt->bind_result($role);
    $stmt->fetch();

    // Close statement
    $stmt->close();

} if (!isset($_SESSION['customerId']) || !is_numeric($_SESSION['customerId'])) {
    header("Location: error.php?message=Invalid customer ID");
    exit();
}
$customerId = $_SESSION['customerId'];

// Prepare SQL statement with placeholder for customerId
$stmt = $connection->prepare("SELECT role, first_Name FROM job_roles INNER JOIN customer_information1 ON job_roles.ID = customer_information1.ID WHERE job_roles.ID = ?");

// Bind parameter and execute
if ($stmt) {
    $stmt->bind_param("i", $customerId);
    $stmt->execute();

    // Bind result
    $stmt->bind_result($role, $first_Name);
    $stmt->fetch();

    // Close statement
    $stmt->close();
}


// Proceed with actions for a customer
// ...
?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Pharmacy Website</title>
    <link rel="stylesheet" href="HomePage2.css">
    <link rel="stylesheet" href="/Test.js">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <header>
        <nav>
            <div class="logo">
           <a href="HomePageEmp.php">     <img src="image/logo.jpg" alt="Healthcare Pharmacy"></a>
            </div>
            <div class="logo-text">
                <p class="logo-text">QUEENSWAY</p>
            </div>

            <div class="search-bar">
                <input type="text" placeholder="Search...">
                <button type="submit">Search</button>
            </div>
            <button value="Upload New Prescription" class="btn" onclick="loadprescription()">Upload New Prescription</button>
            <!-- <button class="upload-button">Upload Prescription</button> -->
            <div class="nav-buttons">

            <a href="logout.php"><img src="image/logout.jpg"></a>
                <a href="#"><img src="image/carticon.jpg"></a>
                <span>0</span>
            </div>
        </nav>
    </header>

    <header2>
        <nav class="top-nav">
            <div class="nav-links">
                <ul>
                    <li class="mega-menu">
                        <a href="#">Medicine <span class="arrow">&#9662;</span></a>

                        <div class="mega-content">
                            <ul>
                                <a class="a2" href="">HEART</a>
                                <a class="a2" href="blank.html">CENTRAL NERVOUS SYSTEM</a>
                                <a class="a2" href="blank.html"> EAR, NOSE, THROAT</a>
                                <a class="a2" href="blank.html"> DIABETES</a>
                                <a class="a2 " href="blank.html">EYE</a>
                                <a class="a2" href="blank.html"> GASTRO INTESTINAL SYSTEM</a>
                                <a class="a2" href="blank.html">MALIGNANT DISEASE & IMMUNOSUPPRESSIONS</a>

                            </ul>
                        </div>
                    </li>
                    <li class="mega-menu">
                        <a href="#">Medical Devices <span class="arrow">&#9662;</span></a>
                        <div class="mega-content">
                            <ul>
                                <a class="a2" href="blank.html">FIRST AID</a>
                                <a class="a2" href="blank.html">HEALTH DEVICES</a>
                                <a class="a2" href="blank.html"> SUPPORTS & BRACES</a>


                            </ul>
                        </div>
                    </li>
                    <li class="mega-menu">
                        <a href="#">Wellness <span class="arrow">&#9662;</span></a>

                        <div class="mega-content">
                            <ul>
                                <a class="a2" href="blank.html">EYES & EARS</a>
                                <a class="a2" href="blank.html">COUGH, COLD & ALLERGY</a>
                                <a class="a2" href="blank.html">DIET & NUTRITION</a>
                                <a class="a2" href="blank.html"> BEAUTY SUPPLEMENTS</a>
                                <a class="a2 " href="blank.html">ADULT & DIABETIC CARE</a>
                                <a class="a2" href="blank.html"> PREVENTIVE CARE</a>
                                <a class="a2" href="blank.html">PAIN & FEVER</a>
                            </ul>
                        </div>
                    </li>
                    <li class="mega-menu">
                        <a href="#">Personal Care <span class="arrow">&#9662;</span></a>
                        <div class="mega-content">
                            <ul>
                                <a class="a2" href="blank.html">NOURISHMENT</a>
                                <a class="a2" href="blank.html">ACCESSORIES</a>
                                <a class="a2" href="blank.html">SKIN CARE</a>
                                <a class="a2" href="blank.html"> HAND & FOOT CARE</a>
                            </ul>
                        </div>
                    </li>
                    <div class="words">
                        <li><a href="blank.html">GSE</a></li>
                        <li><a href="blank.html">SWISSE</a></li>
                        <li><a href="blank.html">PROMOTIONS</a></li>

                    </div>
                </ul>
            </div>
        </nav>
    </header2>
    <div class="text">
  <ul style="text-align: left; ">
     <li><p style="color:#3280274; font-weight: bold;">Hello .. <?php echo ucfirst($first_Name); ?>
</p>   
    <li><p style="color: #337ab7;font-weight: bold; ">ID: <?php echo $customerId; ?></p></li>
    
     </li> <li><p style="color: #337ab7;font-weight: bold;">Position: <?php echo $role; ?></p></li>
  </ul>
 
</div>
    <!-- video -->
    <video controls width="840" height="460" class="video" autoplay loop muted>
        <source src="image/videoplayback.mp4" type="video/mp4">
    </video><br><br><br><br>
    <!-- video -->


    <!-- aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->
    <button  value="Upload Prescription" class="upload-button"  onclick="loadprescription()">Upload Prescription</button>

    <br><br>
    <div class="scrolling-container">
        <div class="scrolling-images" id="scrollingImages">
         
          <img src="./Web/img-1.png" alt="Image 1">
          <img src="./Web/img-2.png" alt="Image 2">
          <img src="./Web/img-3.png" alt="Image 3">
          <img src="./Web/img-5.png" alt="Image 5">
         
          <img src="./Web/img-6.png" alt="Image 6">
          <img src="./Web/img-7.png" alt="Image 7">
          <img src="./Web/img-8.png" alt="Image 8">

        </div>
        <button class="scrolling-button scroll-left" onclick="scrollImages(-1)">←</button>
        <button class="scrolling-button scroll-right" onclick="scrollImages(1)">→</button>
      </div>
      
      <script>
        const scrollingImages = document.getElementById('scrollingImages');
        const imageWidth = scrollingImages.clientWidth / 8; // Adjusted for the number of images
        let currentIndex = 1; // Start with the first set of images
        let autoScrollInterval;
      
        scrollingImages.addEventListener('transitionend', () => {
          // No automatic scrolling in this version
        });
      
        function scrollImages(direction) {
          currentIndex += direction;
      
          if (currentIndex < 0) {
            currentIndex = 5;
          } else if (currentIndex > 5) {
            currentIndex = 0;
          }
      
          const newPosition = -currentIndex * imageWidth * 8; // Move the entire set of images
          scrollingImages.style.transition = 'transform 0.5s ease-in-out';
          scrollingImages.style.transform = `translateX(${newPosition}px)`;
      
          // Reset the automatic slideshow interval
          clearInterval(autoScrollInterval);
          autoScrollInterval = setInterval(() => {
            scrollImages(1);
          }, 5000);
        }
      
        // Start the automatic slideshow
        autoScrollInterval = setInterval(() => {
          scrollImages(1);
        }, 5000);
      </script>
      
      <br><br><br>
 
    <div class="shopnow-image">
        <img src="image/hair.png" alt="hair pic" class="hair">
        <input type="button" value="Shop Now" class="hair-button">
        <img src="image/supplement.png" alt="supplement png" class="supplement">
        <input type="button" value="Shop Now" class="supplement-button">


    </div>
    <div>
        <div class="hair-text">
            <p>
            <h3>Men's Hair Growth & Loss Prevention</h3>
            Supplements & Oils designed to nourish your hair
            follicles and provide you with the healthiest hair.
            </p>
        </div>

        <div class="sports-text">
            <p>
            <h3> Sports Supplements</h3>
            Maximize your workouts and provide your
            body with the necessary protein and amino acids it needs.
            </p>
        </div>
    </div>



    <!-- Product Item -->
    <div class="grid-container">
        <div class="grid-item">
            <img src="image/sustagen.jpeg" alt="Product 1">
            <h3>Sustagen</h3>
            <p>LKR 2999.00</p>
            <button class="add-to-cart">Add to Cart</button>
        </div>

        <div class="grid-item">
            <img src="image/image2.jpeg" alt="Product 1">
            <h3>Multi Vitamin</h3>
            <p>LKR 900.00</p>
            <button class="add-to-cart">Add to Cart</button>
        </div>

        <div class="grid-item">
            <img src="image/images 10.jpeg" alt="Product 1">
            <h3>Vitamin D</h3>
            <p>LKR 550.00</p>
            <button class="add-to-cart">Add to Cart</button>
        </div>

        <div class="grid-item">
            <img src="image/images (1).jpeg" alt="Product 1">
            <h3>Vitamin B</h3>
            <p>LKR 380.00</p>
            <button class="add-to-cart">Add to Cart</button>
        </div>

        <div class="grid-item">
            <img src="image/image5.jpg" alt="Product 1">
            <h3>Xpert</h3>
            <p>LKR 499.00</p>
            <button class="add-to-cart">Add to Cart</button>
        </div>

        <div class="grid-item">
            <img src="image/dsc_0286-1_copy.jpg" alt="Product 1">
            <h3>Fish Oil</h3>
            <p>LKR 1299.00</p>
            <button class="add-to-cart">Add to Cart</button>
        </div>

        <div class="grid-item">
            <img src="image/image7.png" alt="Product 1">
            <h3>Metabolism</h3>
            <p>LKR 2200.00</p>
            <button class="add-to-cart">Add to Cart</button>
        </div>

        <div class="grid-item">
            <img src="image/image8.jpg" alt="Product 1">
            <h3>Detol</h3>
            <p>LKR 485.00</p>
            <button class="add-to-cart">Add to Cart</button>
        </div>


    </div>

    <script src="Test.js"></script>

    <!-- Product Item -->



    <div class="content">
        <h1 class="Healthcare">QUEENSWAY</h1>
        <p>Queensway pharmacy limited a 100% subsidiary of Queensway pharmacy is one of the 1st branded retail
            Pharmaceutical<br>
            Chains in Sri Lanka that has entered the market with a view of creating a difference in the retail
            pharmaceutical trade.<br>
            Headed by a team of professionals, Healthguard has introduced an innovative concept centered on superior
            customer care,<br>
            latest technology in data management, a wide product assortment, affordable prices and a host of
            value additions.</p>
    </div>




    <!-- footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>company</h4>
                    <ul>
                        <li><a href="#">about us</a></li>
                        <li><a href="#">our services</a></li>
                        <li><a href="#">privacy policy</a></li>
                        <li><a href="#">afflicate program</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>get help</h4>
                    <ul>
                        <li><a href="#">Faq</a></li>
                        <li><a href="#">shipping</a></li>
                        <li><a href="#">order status</a></li>
                        <li><a href="#">return</a></li>
                        <li><a href="#">payment option</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>contact us</h4>
                    <ul>
                        <li><a href="#">011-4323123</a></li>
                        <li><a href="#">011-5645342</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>follow us</h4>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>


            </div>
        </div>
    </footer>
    <!-- footer -->


    <script>
   function  loadprescription(){

    window.location.href = "upload.html";


   }


    </script>
</body>

</html>