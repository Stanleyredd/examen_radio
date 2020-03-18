<?php
/**
 * Created by PhpStorm.
 * User: stanley
 * Date: 17-3-2020
 * Time: 19:57
 */

include "back/conn.php";




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

        /*  ↓↓↓↓navbar↓↓↓↓ */
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
        #table1 {
            margin: 50px auto;
        }


        td {
            border: 1px black solid;

        }
        #toevoegen_div{
            text-align: center;
        }
        a{
            text-decoration: none;

        }

    </style>
</head>
<body>
<?php
include "navbar.php";
?>
<div id="toevoegen_div">
    <a href="playlist_toevoegen.php"><h3>Playlist toevoegen</h3></a>
</div>
<table id="table1">

    <?php

    echo "<tr>";
    echo "<td class='text'>".'<h3>artiest</h3>'."</td>";
    echo "<td class='text'>". '<h3>Song</h3>'. "</td>";
    echo "<td class='text'>".'<h3>Duur</h3>'. "</td>";

    echo "</tr>";


    $DBConnect = new mysqli("localhost","root","","mydb");
    $sql = "select nummer.artiest, nummer.titel, nummer.duur, 
nummer.nummerID from 
nummer left join playlist on 
playlist.nummer_nummerID=nummer.nummerID where 
playlistNaam = 'dancehour'";
    $result = $DBConnect->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {


            echo "<tr>";
            echo "<td>".$row['artiest']. "</td>";
            echo "<td>".$row['titel']. "</td>";
            echo "<td>".$row['duur']. "</td>";

//            echo "<td>". "<a href='wijzig_nummer.php'>Wijzig</a>  " . "</td>";
//            echo "<td>". "<a href='back/back_verwijder_nummer.php'>Verwijder</a>  " . "</td>";



            echo "</tr>";
        }
    } else {
        echo "<div id='id_error'>";
        echo "<p></p>";
        echo "</div>";
    }
    $DBConnect->close();
    ?>
<?php
    $DBConnect = new mysqli("localhost","root","","mydb");
    $sql_total = "SELECT  SEC_TO_TIME( SUM( TIME_TO_SEC( duur ) ) ) AS timeSum FROM nummer";
//    $sql_total = "SELECT SUM(duur)AS timeSum FROM nummer";
    $result = $DBConnect->query($sql_total);


    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
               $timeSum = $row['timeSum'];
        }
    } else {
        echo "0 results";
    }
    $DBConnect->close();


    echo "<tr>";
        echo "<td></td>";

        echo "<td style='text-align: right'>Totaal</td>";
        echo "<td>$timeSum</td>";
        echo "</tr>";



?>

</table>




</body>
</html>
