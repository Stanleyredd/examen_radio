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

    <link rel="stylesheet" href="style.css">
    <title>Radio</title>
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

        input {
            width: 30%;
            text-align: center;
        }



    </style>
</head>
<body>
<?php
include_once"navbar.php";
?>
<table id="table1">


    <form action="back/back_toevoegen_nummer.php" method="post">
        <div id="form">
            <h1>Nummer toevoegen</h1>
            <label for="" >Titel</label><br>
            <input type="text" required name="titel">
            <br><br>
            <label for="">Artiest</label><br>
            <input type="text" required  name="artiest">
            <br><br>
            <label for="">duur</label><br>
            <input type='time' required name="duur">
            <br><br><br><br><br><br>
            <input type="submit" class="submit" value="Toevoegen"><br>
        </div>
    </form>

    <div id="1" >
    </div>
</table>


</body>
</html>











