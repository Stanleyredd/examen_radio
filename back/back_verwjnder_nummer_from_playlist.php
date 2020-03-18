<?php
/**
 * Created by PhpStorm.
 * User: stanley
 * Date: 18-3-2020
 * Time: 10:36
 */
include_once "conn.php";
$titel = $_GET['titel'];


//$sql_delte = "DELETE FROM `playlist` WHERE `playlist`.`programmaID` = 2 AND `playlist`.`nummer_nummerID` = 2"

$sql2 = "select * from nummer where titel='$titel'";
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
$sql_delete = "DELETE FROM playlist WHERE playlist.programmaID = 2 AND playlist.nummer_nummerID = '$nummerID'";

if ($DBConnect->query($sql_delete) == true){
    header("location:../playlist.php");

}else{
    echo "Er is iets fout gegaan, probeer het opnieuw.<br><br>";
    echo "De error is: ";
    echo $sql_delete. "<br>". $DBConnect->error;
}

$DBConnect->close();

?>
