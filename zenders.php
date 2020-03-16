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


<img src="IMG/flooop.png" alt="logo">

<ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="contact.php">Contact</a></li>
    <li><a href="zenders.php">Zenders</a></li>
</ul>


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
            echo "<td>" . $row['zendernaam'] . "<br><a href='zenders.php?zendernaam=$row[zendernaam]'>programmaoverzicht</a><br>"."<a  href='back/back-delete.php?zendernaam=$row[zendernaam]'>verwijder</a>"."</td>";
            if ($counter % 3 == 0) {
                echo '</tr>';
            }
            $counter++;
        }
    } else {
        echo "0 results";
    }
    ?>

    <form action="back/back-add.php" method="post">
        <div id="form">
            <h1>Zender toevoegen</h1>
            <label for="">Naam van de zender</label><br><input type="text"class="gegevens" name="zendernaam" required value=""><br><br><br>
            <label for="">Omschrijving</label><br><input type="text" class="gegevens" name="zenderomschrijving" required value="">             <br>
            <br>
            <input type="submit" class="submit" value="Toevoegen"><br>

        </div>
    </form>

    <div id="1" >
         </div>

</body>
</html>
