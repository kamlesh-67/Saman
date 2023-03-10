<?php

$username = "root";
$hostname = "localhost";
$pass = "";
$dbname = "saman";
$tname2 = "cards";


$server = mysqli_connect($hostname, $username, $pass, $dbname);


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
    <title>Document</title>
    <script
        src="https://cdn.jsdelivr.net/npm/tsparticles-preset-fireworks@2/tsparticles.preset.fireworks.bundle.min.js"></script>

<style>
    body{
        overflow: hidden;
    }
    .container{
        height: 100vh;
        width: 100vw;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
        position: absolute;
        top: 0;
        left: 0;
        /* background-color: azure; */
        z-index: 1000000;
    }
    .box{
        height: 250px;
        width: 500px;
        border: 1px solid white;
        position: absolute;
        border-radius: 10px;
        color: red  ;
        text-align: center;
        text-transform: capitalize;
    backdrop-filter: blur(5px) saturate(200%);
    -webkit-backdrop-filter: blur(5px) saturate(200%);
    background-color: #00ffff46;
    border-radius: 8px;
    border: 1px solid #d1d5db4d;
    }
    .box a{
        color: white;
        text-decoration: none;
    }
    .box p{
        margin: auto;
        height: 40px;
        width: 130px;
        background-color: brown;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid white;
        border-radius: 25px;
    }
</style>
</head>

<body>
<div class="container">
    <div class="box">
        <h1>🎊Congratulations🎊</h1>
    <h3>Your order has placed</h3>
    <p><a href="prodect-detail.php">buy more</a></p>
    </div>
</div>

    <script>
        (async () => {
            await loadFireworksPreset(tsParticles); // this is required only if you are not using the bundle script

            await tsParticles.load("tsparticles", {
                preset: "fireworks",
            });
        })();
    </script>

</body>

</html>