<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
    <title>Document</title>

</head>
<body>

<?php
include_once "back/conn.php";

$zenderID = $_GET["zenderID"];



$sql = "select zenderID, zenderNaam, omschrijving from zender where zenderID=$zenderID";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {


       $zenderID = $row["zenderID"];
       $zendernaam = $row["zenderNaam"];
       $omschrijving = $row["omschrijving"];


    }

} else { echo "0 results"; }

$conn->close();

?>
<form action='back/back-wijzig.php' method="post">
    <div id="form">
        <label hidden aria-hidden="true" for="">id: </label>      <input aria-hidden="true" type="text" class="gegevens" name="zenderID" hidden value="<?php echo $zenderID; ?>">


        <label for="">Zendernaam</label>        <br>    <input type="text" class="gegevens" name="zendernaam" required value="<?php echo $zendernaam; ?>">  <br>
        <label for="">zenderOmschrijving</label>         <br>    <input type="text" class="gegevens" name="omschrijving" required value="<?php echo $omschrijving; ?>">          <br>
        <br>

        <input type="submit" class="submit" value="Wijzig">
        <a href='index.php' class="badge badge-primary">Terug naar de gebruikers!</a>

    </div>




</form>

<?php

?>







</body>
</html>







