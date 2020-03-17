<?php
/**
 * Created by PhpStorm.
 * User: stanley
 * Date: 3-8-2019
 * Time: 22:31
 */

include "conn.php";


$titel = $_POST["titel"];
$artiest = $_POST["artiest"];
$duur = $_POST["duur"];
echo $titel;

$sql = "insert into nummer (titel, artiest, duur) values ('$titel', '$artiest', '$duur')";

if ($conn->query($sql) == true){
    echo "gelukt";
//    header("location:../zenders.php");
}else{
    echo "Er is iets fout gegaan, probeer het opnieuw.<br><br>";
    echo "De error is: ";
    echo "error ".$sql. "<br>". $conn->error;
}



$conn->close();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<span id="error" class="text-danger"></span>
<span id="success" class="text-success"></span>


</body>
</html>





