<?php
/**
 * Created by PhpStorm.
 * User: stanley
 * Date: 5-8-2019
 * Time: 23:15
 */
include "conn.php";
$programmanaam = $_GET["programmanaam"];
echo $programmanaam;

$sql2 = "select programmaID from programma where programmanaam='$programmanaam'";
$result = $conn->query($sql2);

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




$DBConnect2 = new mysqli("localhost","root","","mydb");

$sql = "DELETE FROM programma WHERE programma.programmaID = '$programmaID'";


if ($DBConnect2->query($sql) == true){
    header("location:../programma.php?zendernaam=$zenderNaam");


}else{
    echo "Er is iets fout gegaan, probeer het opnieuw.<br><br>";
    echo "De error is: ";
    echo $sql. "<br>". $DBConnect2->error;
}

$DBConnect2->close();