<?php
/**
 * Created by PhpStorm.
 * User: stanley
 * Date: 3-8-2019
 * Time: 22:31
 */

include "conn.php";


$playlistNaam = $_POST["playlistnaam"];
$artiest = $_POST["artiest"];
$titel = $_POST["titel"];
$duur = $_POST["duur"];


$sql = "select distinct(programmaID) from playlist where playlistnaam='$playlistNaam'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
    while ($row = $result->fetch_assoc()) {
        $programmaID = $row['programmaID'];
    }
}else{
    echo "error";

}
$conn->close();


?>

<?php
$DBConnect2 = new mysqli("localhost","root","","mydb");

$sql2 = "select *from nummer where titel='$titel'";
$result = $DBConnect2->query($sql2);

if ($result->num_rows > 0) {
// output data of each row
    while ($row = $result->fetch_assoc()) {
        $nummerID = $row['nummerID'];
        echo $nummerID;
    }
}else{
    echo "error";

}
$DBConnect2->close();


?>



<?php

$DBConnect = new mysqli("localhost","root","","mydb");

$sql = "INSERT INTO playlist (programmaID, nummer_nummerID, playlistNaam) VALUES ('$programmaID', '$nummerID', '$playlistNaam');";

if ($DBConnect->query($sql) == true){
    echo "gelukt";
    header("location:../playlist.php");
}else{
    echo "Er is iets fout gegaan, probeer het opnieuw.<br><br>";
    echo "De error is: ";
    echo "error ".$sql. "<br>". $DBConnect->error;
}



$DBConnect->close();

?>






