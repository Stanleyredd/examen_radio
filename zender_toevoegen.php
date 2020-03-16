<?php
/**
 * Created by PhpStorm.
 * User: stanley
 * Date: 2-8-2019
 * Time: 17:11
 */

include 'back/conn.php';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
    <title>Iclicks</title>
</head>
<body>

<form action="back/back-add.php" method="post" style="text-align: center">
    <div id="form">
        <label for="">Naam van de zender</label>        <br>    <input type="text"class="gegevens" name="zendernaam" required value="">             <br>
        <label for="">Omschrijving</label>         <br>    <input type="text" class="gegevens" name="zenderomschrijving" required value="">             <br>
        <br>
        <input type="submit" class="submit" value="Toevoegen"><br>
        <a href='index.php' class="badge badge-primary">Terug naar de gebruikers!</a>

    </div>




</form>


</body>
</html>











