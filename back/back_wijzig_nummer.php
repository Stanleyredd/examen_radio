<?php
/**
 * Created by PhpStorm.
 * User: stanley
 * Date: 5-8-2019
 * Time: 22:59
 */

include "conn.php";
?>
<?php
$nummerID = $_GET['nummerID'];

$sql2 = "select titel from nummer where nummerID='$nummerID'";
$result = $conn->query($sql2);

if ($result->num_rows > 0) {
// output data of each row
while ($row = $result->fetch_assoc()) {
$titel = $row['titel'];


}
}else{
$conn->error;


}
$conn->close();



?>



<?php

$nummerID = $_GET['nummerID'];
$nieuwetitel = $_POST['nieuwetitel'];
$artiest = $_POST['artiest'];
$duur = $_POST['duur'];



echo $nummerID."<br>";
echo $titel."<br>";
echo $nieuwetitel."<br>";
echo $artiest."<br>";
echo $duur."<br>";


if ($nieuwetitel == ""){
    echo "er is niks ingevuld";
    $sql = "UPDATE nummer SET titel = '$titel', artiest = '$artiest', duur = '$duur' WHERE nummer.nummerID = $nummerID";
}else {
    $sql = "UPDATE nummer SET titel = '$nieuwetitel', artiest = '$artiest', duur = '$duur' WHERE nummer.nummerID = $nummerID";
}


$DBConnect = new mysqli("localhost","root","","mydb");

if ($DBConnect->query($sql) == true){
    header("location:../nummers.php");

}else{
    echo "Er is iets fout gegaan, probeer het opnieuw.<br><br>";
    echo "De error is: ";
    echo $sql. "<br>". $DBConnect->error;
}

$DBConnect->close();







?>

