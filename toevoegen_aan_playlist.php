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
        <h3>Alle nummers</h3>
</div>
<table id="table1">

    <?php

    echo "<tr>";
    echo "<td class='text'>".'<h3>Titel</h3>'."</td>";
    echo "<td class='text'>". '<h3>Artiest</h3>'. "</td>";
    echo "<td class='text'>".'<h3>Duur</h3>'. "</td>";
    echo "<td>".'<h3></h3>'. "</td>";
    echo "</tr>";


    $DBConnect = new mysqli("localhost","root","","mydb");
    $sql = "Select * from nummer";
    $result = $DBConnect->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {


            echo "<tr>";
            echo "<td>".$row['titel']. "</td>";
            echo "<td>".$row['artiest']. "</td>";
            echo "<td>".$row['duur']. "</td>";

            echo "<td>". "<a href='toevoegen_aan_playlist2.php?titel=$row[titel]'>Toevoegen aan playlist</a>  " . "</td>";


            echo "</tr>";
        }
    } else {
        echo "<div id='id_error'>";
        echo "<p></p>";
        echo "</div>";
    }
    $DBConnect->close();
    ?>







</table>




</body>
</html>
