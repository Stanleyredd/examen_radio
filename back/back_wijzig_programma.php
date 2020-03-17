<?php
/**
 * Created by PhpStorm.
 * User: stanley
 * Date: 5-8-2019
 * Time: 23:15
 */
include "conn.php";
$programmaNaam1 = $_POST["programmanaam1"];
$programmaNaam2 = $_POST["programmanaam2"];
$datum = $_POST["datum"];
$beginTijd = $_POST["begintijd"];
$eindtijd = $_POST["eindtijd"];
$presentator = $_POST["presentatie"];






//echo $programmaNaam1;
//echo $programmaNaam2;
//echo $datum;
//echo $beginTijd;
//echo $eindtijd;
//echo $presentator;



?>
<?php
    //ProgrammaID achterhalen
    $DBConnect = new mysqli("localhost","root","","mydb");
    $sql_programmaID = "select programmaID from programma where programmaNaam = '$programmaNaam1'";
    $result = $DBConnect->query($sql_programmaID);

    if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
    $programmaID = $row['programmaID'];
    }
    }else{
    echo "error";

    }
    $DBConnect->close();


    ?>
<?php


$DBConnect = new mysqli("localhost","root","","mydb");

if ($programmaNaam2 == ""){
    echo "er is niks ingevuld";

    $sql = "UPDATE programma SET programmaNaam = '$programmaNaam1', datum='$datum', beginTijd = '$beginTijd',
eindTijd = '$eindtijd', presentatie = '$presentator' WHERE programma.programmaID='$programmaID'";


}else {
    $sql = "UPDATE programma SET programmaNaam = '$programmaNaam2', datum='$datum', beginTijd = '$beginTijd',
eindTijd = '$eindtijd', presentatie = '$presentator' WHERE programma.programmaID='$programmaID'";

}






if ($DBConnect->query($sql) == true){
header("location:../zenders.php");

}else{
echo "Er is iets fout gegaan, probeer het opnieuw.<br><br>";
echo "De error is: ";
echo $sql. "<br>". $DBConnect->error;
}

$DBConnect->close();


?>