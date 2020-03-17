<?php
/**
 * Created by PhpStorm.
 * User: stanley
 * Date: 26-2-2020
 * Time: 11:53
 */
include_once "back/conn.php"

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
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

    /*De rest*/

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
    #header{
        text-align: center;
    }
    #link_toevoegen{

        text-decoration: none;
    }
    #zender_links{
        text-align: center;
    }
    a{
        text-decoration: none;
    }


</style>
<body>

<?php

$query = "select zenderID, zendernaam, omschrijving from zender";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {


    }
}

?>


<?php
include_once"navbar.php";
?>

<h1 id="header">Dit zijn alle zenders</h1>
<table id="table1">
    <?php

    $sql = "SELECT zendernaam FROM zender";
        $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $counter = 1;
        while ($row = mysqli_fetch_array($result)) {
            if ($counter % 3 == 1) {
                echo '<tr>';
            }
            echo "<td>" . "<h4>" .$row['zendernaam']. "</h4>" . "<br><a href='programma.php?zendernaam=$row[zendernaam]'>Programmaoverzicht</a><br>".
                "<a  href='back/back_verwijder.php?zendernaam=$row[zendernaam]'>Verwijder</a><br>".
                "<a href='wijzig.php?zendernaam=$row[zendernaam]'>Edit</a>
"."</td>";
            if ($counter % 3 == 0) {
                echo '</tr>';
            }
            $counter++;
        }
    } else {
        echo "0 results";
    }
    ?>



    <div id="1" >
         </div>
</table>

<div id="zender_links">
    <a id="link_toevoegen" href="zender_toevoegen.php">Zender toevoegen!</a><br><br>
    <a id="link_toevoegen" href="wijzig.php">Zender wijzigen!</a><br><br>
    <a id="link_toevoegen" href="zender_toevoegen.php">Zender verwijderen!</a><br><br>


</div>
</body>
</html>
