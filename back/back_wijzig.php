<?php
/**
 * Created by PhpStorm.
 * User: stanley
 * Date: 5-8-2019
 * Time: 22:59
 */

include "conn.php";

$znaam = $_POST["zendernaam"];
$znaam2 = $_POST["zendernaam2"];

$zenderID = $_POST["zenderID"];
$omschrijving = $_POST["omschrijving"];


echo $zenderID."<br>";
echo $znaam."<br>";
echo $znaam2."<br>";
echo $omschrijving."<br>";


if ($znaam2 == ""){
    echo "er is niks ingevuld";
    $sql = "UPDATE zender SET zenderNaam = '$znaam', omschrijving= '$omschrijving' WHERE zender.zenderID = $zenderID";
}else {
    $sql = "UPDATE zender SET zenderNaam = '$znaam2', omschrijving= '$omschrijving' WHERE zender.zenderID = $zenderID";
    }



if ($conn->query($sql) == true){
    header("location:../zenders.php");

}else{
    echo "Er is iets fout gegaan, probeer het opnieuw.<br><br>";
    echo "De error is: ";
    echo $sql. "<br>". $conn->error;
}

$conn->close();







?>

