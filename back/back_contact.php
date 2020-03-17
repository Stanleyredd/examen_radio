<?php
/**
 * Created by PhpStorm.
 * User: stanley
 * Date: 17-3-2020
 * Time: 23:45
 */
include "conn.php";

$onderwerp = $_POST["onderwerp"];
$vraag = $_POST["vraag"];
$email = $_POST["email"];


$sql = "insert into contact (onderwerp, vraag, email) values ('$onderwerp', '$vraag', '$email')";

if ($conn->query($sql) == true){
    echo "gelukt";
    header("location:../contact.php?gelukt");
}else{
    echo "Er is iets fout gegaan, probeer het opnieuw.<br><br>";
    echo "De error is: ";
    echo "error ".$sql. "<br>". $conn->error;
}


