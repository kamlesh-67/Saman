<?php

$username = "root";
$hostname = "localhost";
$pass = "";
$dbname = "saman";
$tname = "products";


$server = mysqli_connect($hostname, $username, $pass, $dbname);

// $query = "CREATE DATABASE $dbname";
// $query = "CREATE TABLE $tname (productid INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY ,title VARCHAR(100) NOT NULL,price INT(10) NOT NULL,description VARCHAR(200) NOT NULL, rating INT(1) NOT NULL,wishlisted BOOLEAN NOT NULL,cart BOOLEAN NOT NULL,img VARCHAR(20) NOT NULL)";



// if(mysqli_query($server,$query)){
//     // echo "done2";
// }else{
//     echo "faild2";
// }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = test_input($_POST["title"]);
    $price = test_input($_POST["price"]);
    $description = test_input($_POST["description"]);
    $rating = test_input($_POST["rating"]);
    $wishlisted = test_input($_POST["wishlisted"]);
    $cart = test_input($_POST["cart"]);

    $file = $_FILES['my_file']['name'];
    if (($_FILES['my_file']['name'] != "")) {
        // Where the file is going to be stored
        $target_dir = "upload/";
        // $file = $_FILES['my_file']['name'];
        $path = pathinfo($file);
        $filename = $path['filename'];
        $ext = $path['extension'];
        $temp_name = $_FILES['my_file']['tmp_name'];
        $path_filename_ext = $target_dir . $filename . "." . $ext;

        // Check if file already exists
        if (file_exists($path_filename_ext)) {
            echo "Sorry, file already exists.";
        } else {
            move_uploaded_file($temp_name, $path_filename_ext);
            echo "Congratulations! File Uploaded Successfully.";
        }



    }



    if ($title == "" | $price == "" | $description == "" | $rating == "" | $wishlisted == "" | $cart == "" ) {
        $error = "Please enter something";
    } else {
        $query = "INSERT INTO $tname VALUES ('','$title','$price','$description','$rating','$wishlisted','$cart','$file');";
        if (mysqli_query($server, $query)) {
            echo "inserted";
        } else {
            echo "faild";
        }
        $title = '';
        $price = '';
        $description = '';
        $rating = '';
        $wishlisted = '';
        $cart = '';
        $file = '';
    }

}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


mysqli_close($server);