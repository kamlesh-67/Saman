<?php

// $username = "root";
// $hostname = "localhost";
// $pass = "";
// $dbname = "saman";
// $tname = "products";


// $server = mysqli_connect($hostname, $username, $pass, $dbname);

// // $query = "CREATE DATABASE $dbname";
// // $query = "CREATE TABLE $tname (productid INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY ,title VARCHAR(100) NOT NULL,price INT(10) NOT NULL,description VARCHAR(200) NOT NULL, rating INT(1) NOT NULL,wishlisted BOOLEAN NOT NULL,cart BOOLEAN NOT NULL,img VARCHAR(20) NOT NULL)";



// // if(mysqli_query($server,$query)){
// //     // echo "done2";
// // }else{
// //     echo "faild2";
// // }

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $title = test_input($_POST["title"]);
//     $price = test_input($_POST["price"]);
//     $description = test_input($_POST["description"]);
//     $rating = test_input($_POST["rating"]);
//     $wishlisted = test_input($_POST["wishlisted"]);
//     $cart = test_input($_POST["cart"]);
//     $img = test_input($_POST["img"]);

//     if ($title == "" | $price == "" | $description == "" | $rating == "" | $wishlisted == "" | $cart == "" | $img == "") {
//         $error = "Please enter something";
//     } else {
//         $query = "INSERT INTO $tname VALUES ('','$title','$price','$description','$rating','$wishlisted','$cart','$img');";
//         if (mysqli_query($server, $query)) {
//             echo "inserted";
//         } else {
//             echo "faild";
//         }
//         $title = '';
//         $price = '';
//         $description = '';
//         $rating = '';
//         $wishlisted = '';
//         $cart = '';
//         $img = '';
//     }

// }




// function test_input($data)
// {
//     $data = trim($data);
//     $data = stripslashes($data);
//     $data = htmlspecialchars($data);
//     return $data;
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>saman</title>
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    <div class="container">

        <form action="insert.php" name="form" method="post" enctype="multipart/form-data">
            <caption>Admin Saman</caption>
            <div class="box">
                <label for="title">Title</label>
                <input type="text" name="title" id="title">
            </div>
            <div class="box">
                <label for="price">Price</label>
                <input type="text" name="price" id="price">
            </div>
            <div class="box">
                <label for="description">description</label>
                <input type="text" name="description" id="description">
            </div>
            <div class="box">
                <label for="rating">rating</label>
                <input type="text" name="rating" id="rating">
            </div>
            <div class="box-ra">
                <label for="wishlisted">wishlisted</label>
                <div>
                    <input type="radio" name="wishlisted" id="wishlisted1" value=1>yes
                    <input type="radio" name="wishlisted" id="wishlisted2" value=0>no
                </div>
            </div>
            <div class="box-ra">
                <label for="cart">cart</label>
                <div>
                    <input type="radio" name="cart" id="cart1" value=1>yes
                    <input type="radio" name="cart" id="cart2" value=0>no
                </div>
            </div>
            <div class="box">
                <label for="img">image</label>
                <input type="file" name="my_file" />
            </div>

            <button type="submit"  name="submit">Add</button>

        </form>
    </div>
</body>

</html>