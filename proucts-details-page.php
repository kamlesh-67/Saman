<!-- <?php



$username = "root";
$hostname = "localhost";
$pass = "";
$dbname = "saman";
$tname = "products";


$server = mysqli_connect($hostname, $username, $pass, $dbname);


$id = $_GET["pid"];
$query = "SELECT * FROM $tname WHERE productid=$id";
$res = mysqli_query($server, $query);

$row = mysqli_fetch_assoc($res);


$title = $row["title"];
$price = $row["price"];
$description = $row["description"];
$rating = $row["rating"];
$wishlisted = $row["wishlisted"];
$cart = $row["cart"];
$img = "upload/" . $row["img"];




?> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="proucts-details-page.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title><?php echo $title.' - '.$description; ?></title>
</head>

<body>
    <div class="preloader" id="preloader">
        <div class="spinnerWrap">
            <div class="spinner" id="spinner2"></div>
        </div>
    </div>
    <section>
        <header>
            <div class="logo"><a href="index.html"><img src="gallery/logo.png" alt="logo" height="27px"></a></div>

            <div class="search">
                <div class="search-icon">
                    <label for="search"><i class="fa-solid fa-magnifying-glass"></i></label>
                </div>
                <input type="text" name="search" id="search">
            </div>


            <div class="navbar">

                <ul>
                    <li><a href="wishlist.html"><i class="fa-regular fa-heart"></i></a></li>
                    <li><a href="profile.html"><i class="fa-regular fa-user"></i></a></li>
                    <li><a href="cart.html"><i class="fa-solid fa-cart-shopping"></i></a></li>
                    <li onclick="menu()"><a href="#"><i class="fa-solid fa-bars"></i></a></li>
                    <div class="menu" id="menu">
                        <div class="cross" onclick="cross()"><i class="fa-solid fa-xmark"></i></div>
                        <a href="index.html" class="footer-links">Home</a>
                        <a href="about.html" class="footer-links">About</a>
                        <a href="prodect-detail.html" class="footer-links">Products</a>
                        <a href="contect.html" class="footer-links">Contact</a>

                    </div>

                </ul>
            </div>
        </header>
    </section>

    <?php

    echo '
    <div class="container">
        <div class="detai-page-box">
            <div class="img-box"><img src="'.$img.'" alt=""></div>
        </div>
        <div class="product-detail-info">
            <div class="detail-title">'.$title.'</div>
            <div class="detail-price">₹'.$price.'</div>
            <div class="detail-rating">';

            for ($i = 1; $i <= 5; $i++) {
                if ($i <= $rating) {
                    echo '<i class="fa-solid fa-star" style="color:#FFBF00;"></i>';
                } else {
                    echo '<i class="fa-regular fa-star"></i>';
                }
            };
            echo '</div>
            <div class="detail-description">'.$description.'</div>
            <form action="buy-process.php" method="post">
            <input type="hidden" name="pid" id="pid" value="'.$id.'">
            <button type="submit">Buy</button>
            </form>
        </div>
    </div>';

    ?>


<footer class="footer-sec">
        <div class="main">


            <div class="logo row">
                <div class="footer-header">
                    <img src="gallery/logo.png" class="manik" alt="">
                </div>
                <div class="logo-des">
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                        alteration in some form, by injected humour.</p>

                    <a href="#" class="btn-know">Know More</a>
                </div>


            </div>



            <div class="office row">
                <div class="footer-header">
                    <h3>Office</h3>
                </div>
                <div class="office-des">
                    <p>kkc pg college <br> churu road ,sardarshahar(churu)<br>pin - 331403<br>rajasthan</p>

                    <a href="#">kkc@saman.com</a>

                    <p class="num">+919413124345</p>
                </div>
            </div>


            <div class="link row">
                <div class="footer-header">
                    <h3>Links</h3>
                </div>

                <div class="link-des">
                    <a href="index.html" class="footer-links">Home</a>
                    <a href="about.html" class="footer-links">About</a>
                    <a href="prodect-detail.html" class="footer-links">Products</a>
                    <a href="contect.html" class="footer-links">Contact</a>
                </div>

            </div>


            <div class="newsletter row">
                <div class="footer-header">
                    <h3>Newsletter</h3>
                </div>
                <div class="newsletter-des">
                    <div class="subcribe"><i class="sub-icon ri-mail-check-fill"></i>
                        <input type="mail" placeholder="Enter Email ID" required>
                        <i class="sub-icon ri-arrow-right-line"></i>
                    </div>
                    <div class="icons">
                        <a href="#"><i class="social-icon ri-facebook-fill"></i></a>
                        <a href="#"><i class="social-icon ri-instagram-line"></i></a>
                        <a href="#"><i class="social-icon ri-linkedin-fill"></i></a>
                        <a href="#"><i class="social-icon ri-github-line"></i></a>

                    </div>
                </div>
            </div>


        </div>
        <div class="copyright">
            <hr>
            <p>© Copyright 2023 saman.</p>
        </div>
    </footer>

<script src="script.js"></script>
</body>

</html>

