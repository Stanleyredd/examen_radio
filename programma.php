<?php
/**
 * Created by PhpStorm.
 * User: stanley
 * Date: 12-3-2020
 * Time: 14:41
 */
include_once "back/conn.php"
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /**{*/
            /*border: 1px black dotted;*/
        /*}*/
        body{
            padding: 0;
            margin: 0;

        }
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        /* Change the link color to #111 (black) on hover */
        li a:hover {
            background-color: #111;
        }

        #form {
            width: 35%;
            margin: 0 auto;
            margin-top: 10px;
            border: 1px black solid;
            text-align: center;
        }

        #table1 {
            margin: 50px auto;
        }

        td {
            border: 1px black solid;

        }

        .zender_naam{
            background-color: teal;
            text-align: left;
        }
        #header{
            text-align: center;
        }
        a{
            text-decoration: none;
            text-align: right
        }
        #id_error{
            text-align: center;
        }


    </style>
</head>
<body>
<?php
include_once"navbar.php";
$znaam = $_GET["zendernaam"];




$sql2 = "select zenderID from zender where zenderNaam='$znaam'";
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

<h1 id="header">Het programma van zender: <?php echo "$znaam";?></h1>
<div id="header">
<?php echo "<a id='id_error' href='programma_toevoegen.php?zendernaam=$znaam'>Programma toevoegen</a>"; ?>
</div>
<table id="table1">

    <?php

    echo "<tr>";
    echo "<td class='text'>".'<h3>Programma</h3>'."</td>";
    echo "<td class='text'>". '<h3>Datum</h3>'. "</td>";
    echo "<td class='text'>".'<h3>Tijd</h3>'. "</td>";
    echo "<td class='text'>".'<h3>Duur in minuten</h3>'. "</td>";
    echo "<td class='text'>".'<h3>Presentator</h3>'. "</td>";
    echo "<td>".'<h3></h3>'. "</td>";
    echo "<td>".'<h3></h3>'. "</td>";
    echo "</tr>";


    $DBConnect = new mysqli("localhost","root","","mydb");
$sql = "select programma.programmaNaam, programma.datum, programma.begintijd, programma.eindtijd, programma.presentatie, programma.zenderID, zender.zenderID from programma
left join zender on zender.zenderID = programma.zenderID where zender.zenderID = '$zenderID' ORDER BY programma.datum DESC;";
$result = $DBConnect->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {


        echo "<tr>";
        echo "<td>".$row['programmaNaam']. "</td>";
        echo "<td>".$row['datum']. "</td>";
        echo "<td>".$row['begintijd']." - " .$row['eindtijd'] . "</td>";
        echo "<td>"."x". "</td>";
        echo "<td>".$row['presentatie']. "</td>";
        echo "<td>". "<a href=\"wijzig_programma.php?programmanaam=$row[programmaNaam]\">Wijzig</a>  " . "</td>";
        echo "<td>". "<a href='back/back_verwijder_programma.php?programmanaam=$row[programmaNaam]'>Verwijder</a>  " . "</td>";


        echo "</tr>";
    }
} else {
    echo "<div id='id_error'>";
    echo "<p>Deze zender heeft nog geen programma</p>";
    echo "</div>";
}
$DBConnect->close();
?>







</table>







</body>
</html>
