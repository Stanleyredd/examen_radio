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
        *{
            /*border: 1px black dotted;*/
        }
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
        .container{
            text-align: center;
        }
        table.table1 {
            margin: 50px auto;
            text-align: center;
            text-decoration: none;
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
?> <div id="toevoegen_div">
    <a href="nummer_toevoegen.php"><h3>Nummer toevoegen</h3></a>

</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-top: 5%;">
            <div class="row">

                <?php

                $conn = new mysqli('localhost', 'root', '', 'mydb');
                if(isset($_GET['search'])){
                    $searchKey = $_GET['search'];
                    $sql = "SELECT * FROM nummer WHERE titel LIKE '%$searchKey%' OR  artiest LIKE '%$searchKey%'";
                }else
                    $sql = "SELECT * FROM nummer";
                $result = $conn->query($sql);
                ?>



                <form action="" method="GET">
                    <div class="col-md-6">
                        <label for="">Typ het nummer dat je zoekt!</label><br><br>
                        <input type="text" name="search" class='form-control' placeholder="Zoek hier" value=<?php echo @$_GET['search']; ?> ><br><br>
                    </div>
                    <div class="col-md-6 text-left">
                        <button class="btn">Zoek!</button>
                    </div>
                </form>


            </div>

            <div>
                <div class="table1">
                <table class="table1">
                    <tr>
                        <th>Titel</th>
                        <th>Nummer</th>
                        <th>Duur</th>
                        <th>Wijzig</th>
                        <th>Verwijder</th>
                    </tr>
                    <?php while($row = $result->fetch_object() ): ?>
                        <tr>
                            <td><?php echo $row->titel ?></td>
                            <td><?php echo $row->artiest ?></td>
                            <td><?php echo $row->duur ?></td>

                            <td><a href='wijzig_nummer.php?titel=<?php
                                 $titel = $row->titel; echo $titel ?>'>Wijzig</a></td>
                            <td><a href='back/back_verwijder_nummer.php?titel=<?php
                                $titel = $row->titel; echo $titel ?>''>Verwijder</a></td>

                        </tr>
                    <?php endwhile; ?>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="toevoegen_div">
    <a href="nummer_toevoegen.php"><h3>Nummer toevoegen</h3></a>

</div>





</body>
</html>

