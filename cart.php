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





// if(mysqli_query($server,$query)){
//     // echo "done2";
// }else{
//     echo "faild2";
// }


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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="cart.css">
    <link rel="stylesheet" href="1style.css">
    <style>
        a {
            text-decoration: none;
            color: black;
        }
    </style>
    <title>My cart - saman</title>
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
                    <!-- <div class="username">kamlesh</div> -->
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

        <div class="banner">
            <h1>My Cart</h1>
        </div>

        <div class="cartcontainer">
            <div class="product-detail-section">
                <!-- <div class="box">
                    <div class="img"></div>
                    <div class="data">
                        <div class="title-data">
                            <div class="product-detail-title">title</div>
                            <div class="product-detail-price">$60</div>
                            <div class="product-detail-rating"><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i></div>
                        </div>
                        <div class="product-detail-description">Lorem ipsum dolor sit amet consectetur adipisicing sectetur adipisicing elit. Alias, dignissimos?
                            Placeat, illo.</div>
                    </div>
                    <div class="buttons">
                        <button type="submit">add to cart</button>
                        <button type="submit"><i class="fa-regular fa-heart"></i></button>
                    </div>
                </div>
            </div> -->
            <?php
                echo '<p style="display:none; id="nextpage"></p>';

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

                    // $_SESSION['id'] = $item;
                    // echo '<p style="display:none; id="">'.$item.'</p>';

                    // echo '<a href="detailpage.php" onClick="nextpage()">
                    echo '<a href="detailpage.php?pid='.$item.'">
                    <div class="box">
                    
                        <div class="img"><img src=' . $img . ' alt="product"></div>
                            <div class="data">
                                <div class="title-data">
                                    <div class="product-detail-title" id="title">' . $title . '</div>
                                    <div class="product-detail-price">' . $price . '</div>
                                    <div class="product-detail-rating">';

                    for ($i = 1; $i <= 5; $i++) {
                        if ($i <= $rating) {
                            echo '<i class="fa-solid fa-star" style="color:#FFBF00;"></i>';
                        } else {
                            echo '<i class="fa-regular fa-star"></i>';
                        }
                    };
                    echo '</div>
                                </div>
                            <div class="product-detail-description">' . $description . '</div>
                        </div>  
                        <div class="buttons">
                            <button type="submit">add to cart </button>
                            <button type="submit" style="color:#000000;"> ';
                    if ($wishlisted)
                        echo '<i class="fa-solid fa-heart" style="color:#df3735;"></i>';
                    else
                        echo '<i class="fa-regular fa-heart"></i>';

                    echo ' </button>
                        </div>
                        </div>
                        </a>
            ';
                }
                ?>

        </div>




    </section>










    <script src="script.js"></script>
</body>

</html>