<?php
/**
 * Created by PhpStorm.
 * User: stanley
 * Date: 5-8-2019
 * Time: 23:15
 */

include "conn.php";

$Znaam = $_GET["zendernaam"];


echo $Znaam."<br>";





$sql = "delete from zender where zendernaam='$Znaam';";

if ($conn->query($sql) == true){
    header("location:../zenders.php");


}else{
    echo "Er is iets fout gegaan, probeer het opnieuw.<br><br>";
    echo "De error is: ";
    echo $sql. "<br>". $conn->error;
}

$conn->close();