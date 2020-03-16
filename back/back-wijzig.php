<?php
/**
 * Created by PhpStorm.
 * User: stanley
 * Date: 5-8-2019
 * Time: 22:59
 */

include "conn.php";


$zenderID = $_POST["zenderID"];
$zendernaam = $_POST["zendernaam"];
$omschrijving = $_POST["omschrijving"];


echo "test";
echo $zenderID."<br>";
echo $zendernaam."<br>";
echo $omschrijving."<br>";


$sql = "update zender set zenderID='$zenderID', zendernaam='$zendernaam', omschrijving='$omschrijving' where zenderID='$zenderID';" ;
if ($conn->query($sql) == true){
    header("location:../index.php");

}else{
    echo "Er is iets fout gegaan, probeer het opnieuw.<br><br>";
    echo "De error is: ";
    echo $sql. "<br>". $conn->error;
}

$conn->close();




?>

