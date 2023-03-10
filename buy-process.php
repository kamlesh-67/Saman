<?php



$username = "root";
$hostname = "localhost";
$pass = "";
$dbname = "saman";
$tname = "products";
$tname2 = "cards";


$server = mysqli_connect($hostname, $username, $pass, $dbname);

// $query = "CREATE TABLE $tname2 (cardid INT(3) NOT NULL AUTO_INCREMENT PRIMARY KEY ,cardNumber INT(16) NOT NULL,ex_month VARCHAR(20) NOT NULL,CVV INT(5) NOT NULL, card_holder_name VARCHAR(100) NOT NULL)";

$id ;
if(isset($_COOKIE["pid"])){
    $id=$_COOKIE["pid"];
}else{
    setcookie("pid",$_POST['pid'],time()+(3600*10));
}
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


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $cardNumber = $_POST["card-number"];
    $ex_month = $_POST["ex-month"];
    $CVV = $_POST["CVV"];
    $card_holder_name = $_POST["card-holder-name"];

    if ($cardNumber == "" | $ex_month == "" | $CVV == "" | $card_holder_name == "") {
        $error = "Please enter something";
    } else {
        $query = "INSERT INTO $tname2 VALUES ('','$cardNumber','$ex_month','$CVV','$card_holder_name');";
        if (mysqli_query($server, $query)) {
            // echo "inserted";
        } else {
            echo "faild";
        }
    }}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="buy-process.css">
    <title>product</title>
</head>

<body>
    <div class="container">
        <div class="payment-box">


            <?php
            echo '<h1>Process To Buy</h1>
            <div class="product-detail">
                <img src="' . $img . '" alt="product image">
                <div class="product-info">';

            echo '<div class="data">
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
                </div>';
            ?>
        </div>
        <form action="order-done.php" method="post">
            <div class="get-card-details">
                <h2>Enter your card Details</h2>
                <div class="payment-method">
                    <input type="text" required maxlength="15" name="card-number" id="card-number" placeholder="Enter card number">
                    <div class="more">
                        <input type="month" required name="ex-month" id="ex-month">
                        <input type="password" required maxlength="3" name="CVV" id="CVV" placeholder="CVV">
                    </div>
                    <input type="text" required name="card-holder-name" id="card-holder-name" placeholder="Enter Card holder name">
                </div>

            </div>
            <div class="btn">

                <button type="submit">BUY</button>
            </div>
        </form>



    </div>
    </div>
</body>

</html>