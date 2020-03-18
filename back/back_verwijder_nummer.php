<?php
/**
 * Created by PhpStorm.
 * User: stanley
 * Date: 5-8-2019
 * Time: 23:15
 */

include "conn.php";

?>
<?php
    $titel = $_GET["titel"];

    $sql2 = "select nummerID, artiest, duur from nummer where titel='$titel'";
    $result = $conn->query($sql2);

    if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
    $nummerID = $row['nummerID'];
    }
    }else{
    $conn->error;
    }
    $conn->close();
    ?>
<?php
echo $nummerID."<br>";
$DBConnect = new mysqli("localhost","root","","mydb");
$sql = "delete from nummer where nummerID='$nummerID';";

if ($DBConnect->query($sql) == true){
    header("location:../nummers.php");

}else{
    echo "Er is iets fout gegaan, probeer het opnieuw.<br><br>";
    echo "De error is: ";
    echo $sql. "<br>". $DBConnect->error;
}

$DBConnect->close();