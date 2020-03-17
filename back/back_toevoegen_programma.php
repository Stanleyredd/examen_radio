<?php
/**
 * Created by PhpStorm.
 * User: stanley
 * Date: 3-8-2019
 * Time: 22:31
 */

include "conn.php";
$zendernaam = $_POST["zendernaam"];


$sql2 = "select zenderID from zender where zenderNaam='$zendernaam'";
$result = $conn->query($sql2);

if ($result->num_rows > 0) {
// output data of each row
    while ($row = $result->fetch_assoc()) {
        $zenderID = $row['zenderID'];
    }
}else{
    echo "error";

}
$conn->close();


?>
<?php
//zendernaam achterhalen
$DBConnect = new mysqli("localhost","root","","mydb");

$sql_zendernaam = "select zender.zenderID, zender.zenderNaam from zender left join programma on programma.zenderID = zender.zenderID where programma.programmaID = '$programmaID'";
$result = $DBConnect->query($sql_zendernaam);

if ($result->num_rows > 0) {
// output data of each row
    while ($row = $result->fetch_assoc()) {
        $zenderNaam = $row['zenderNaam'];
        echo $zenderNaam;
    }
}else{
    echo "error";

}
$DBConnect->close();


?>
<?php

$DBConnect = new mysqli("localhost","root","","mydb");


$programmaNaam = $_POST["programmanaam"];
$datum = $_POST["datum"];
$beginTijd = $_POST["begintijd"];
$eindTijd = $_POST["eindtijd"];
$presentator = $_POST["presentatie"];


$sql = "insert into programma (programmaID, programmaNaam, datum, beginTijd, eindTijd, presentatie, zenderID)
values (NULL,'$programmaNaam', '$datum', '$beginTijd', '$eindTijd', '$presentator', '$zenderID')";




//INSERT INTO `programma` (`programmaID`, `programmaNaam`, `datum`, `beginTijd`, `eindTijd`, `presentatie`, `zenderID`)
//VALUES (NULL, 'ets', '2020-03-17', '12:59', '00:24', 'etrt', '9');
//
//

if ($DBConnect->query($sql) == true){
    echo "gelukt";
//    header("location:../programma.php?zendernaam=$zenderNaam");
    header("location:../zenders.php");

}else{
    echo "Er is iets fout gegaan, probeer het opnieuw.<br><br>";
    echo "De error is: ";
    echo "error ".$sql. "<br>". $DBConnect->error;
}



$DBConnect->close();

?>





