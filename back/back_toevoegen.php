<?php
/**
 * Created by PhpStorm.
 * User: stanley
 * Date: 3-8-2019
 * Time: 22:31
 */

include "conn.php";


$Znaam = $_POST["zendernaam"];
$Zomschrijving = $_POST["zenderomschrijving"];

$sql = "insert into zender (zendernaam, omschrijving) values ('$Znaam', '$Zomschrijving')";

if ($conn->query($sql) == true){
    echo "gelukt";
    header("location:../zenders.php");
}else{
    echo "Er is iets fout gegaan, probeer het opnieuw.<br><br>";
    echo "De error is: ";
    echo "error ".$sql. "<br>". $conn->error;
}



$conn->close();

?>






