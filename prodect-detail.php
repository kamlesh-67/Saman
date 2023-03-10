<?php



$username = "root";
$hostname = "localhost";
$pass = "";
$dbname = "saman";
$tname = "products";


$server = mysqli_connect($hostname, $username, $pass, $dbname);


// $query = "CREATE DATABASE $dbname";
// $query = "CREATE TABLE $tname (productid INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY ,title VARCHAR(100) NOT NULL,price INT(10) NOT NULL,description VARCHAR(200) NOT NULL, rating INT(1) NOT NULL,wishlisted BOOLEAN NOT NULL,cart BOOLEAN NOT NULL,img VARCHAR(20) NOT NULL)";
$query = "SELECT productid FROM $tname";
$res = mysqli_query($server, $query);
$ids = array();
// loop through the result and add each ID to the array
while ($row = mysqli_fetch_assoc($res)) {
    $ids[] = $row['productid'];
}





?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <script src="https://kit.fontawesome.com/1d4c1e8286.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="detail-style.css">
    <title>Saman </title>
    <style>
        a {
            text-decoration: none;
            color: black;
        }
    </style>
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
    <section class="detail">

        <div class="product-filter">
            <form action="#" method="post">
                <div class="rating">
                    <p>Rating</p>
                    <div><input type="radio" name="rating" id="rating1"> <i class="fa-regular fa-star"></i></div>
                    <div><input type="radio" name="rating" id="rating2"> <i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i></div>
                    <div><input type="radio" name="rating" id="rating3"> <i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i></div>
                    <div><input type="radio" name="rating" id="rating4"> <i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i></div>
                    <div><input type="radio" name="rating" id="rating5"> <i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i></div>
                </div>
                <div class="price">
                    <p>price</p>
                    <input type="radio" name="price" id="price1"> below - 500<br>
                    <input type="radio" name="price" id="price2"> 500 - 1000<br>
                    <input type="radio" name="price" id="price3"> 1000 - 2000<br>
                    <input type="radio" name="price" id="price4"> 2000 - 5000<br>
                    <input type="radio" name="price" id="price5"> 5000 - 10000<br>
                    <input type="radio" name="price" id="price6"> 10000 - 20000<br>

                </div>
                <div class="sort">
                    <p>Sort</p>
                    <input type="radio" name="sort" id="sort1"> Sort by price low to high<br>
                    <input type="radio" name="sort" id="sort2"> Sort by price high to low<br>
                    <input type="radio" name="sort" id="sort3"> Sort by rating low to high<br>
                    <input type="radio" name="sort" id="sort4"> Sort by rating high to low<br>

                </div>

                <button type="submit">Filter</button>
            </form>
        </div>
        <div class="product-detail-section">



            <?php
            foreach ($ids as $item) {

                $query = "SELECT * FROM $tname WHERE productid=$item";
                $res = mysqli_query($server, $query);

                $row = mysqli_fetch_assoc($res);
                $title = $row["title"];
                $price = $row["price"];
                $description = $row["description"];
                $rating = $row["rating"];
                $wishlisted = $row["wishlisted"];
                $cart = $row["cart"];
                $img = "upload/" . $row["img"];




                echo '<a href="proucts-details-page.php?pid=' . $item . '">
                    <div class="box">
                        <div class="img"><img src=' . $img . ' alt="product"></div>
                        <div class="data">
                            <div class="title-data">
                                <div class="product-detail-title">' . $title . '</div>
                                <div class="product-detail-price">₹' . $price . '</div>
                                <div class="product-detail-rating">';
                for ($i = 1; $i <= 5; $i++) {
                    if ($i <= $rating) {
                        echo '<i class="fa-solid fa-star" style="color:#FFBF00;"></i>';
                    } else {
                        echo '<i class="fa-regular fa-star"></i>';
                    }
                };
                echo '
                                </div>
                            </div>
                            <div class="product-detail-description">' . $description . '</div>
                        </div>
                        <div class="buttons">
                            <button type="submit">add to cart</button>
                            <button type="submit"> ';
                if ($wishlisted)
                    echo '<i class="fa-solid fa-heart" style="color:#df3735;"></i>';
                else
                    echo '<i class="fa-regular fa-heart"></i>';

                echo ' </button>
                        </div>
                    </div>
                    </a>';
            }


            ?>








        </div>


    </section>

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