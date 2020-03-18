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
                        <input type="text" name="search" class='form-control' placeholder="Search By Name" value=<?php echo @$_GET['search']; ?> >
                    </div>
                    <div class="col-md-6 text-left">
                        <button class="btn">Search</button>
                    </div>
                </form>

                <br>
                <br>
            </div>

            <div>
                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>City</th>
                    </tr>
                    <?php while( $row = $result->fetch_object() ): ?>
                        <tr>
                            <td><?php echo $row->titel ?></td>
                            <td><?php echo $row->artiest ?></td>
                            <td><?php echo $row->duur ?></td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="toevoegen_div">
    <a href="nummer_toevoegen.php"><h3>Nummer toevoegen</h3></a>

</div>
<table id="table1">

    <?php

    echo "<tr>";
    echo "<td class='text'>".'<h3>Titel</h3>'."</td>";
    echo "<td class='text'>". '<h3>Artiest</h3>'. "</td>";
    echo "<td class='text'>".'<h3>Duur</h3>'. "</td>";
    echo "<td>".'<h3></h3>'. "</td>";
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

            echo "<td>". "<a href='wijzig_nummer.php?titel=$row[titel]'>Wijzig</a>  " . "</td>";
            echo "<td>". "<a href='back/back_verwijder_nummer.php?titel=$row[titel]'>Verwijder</a>  " . "</td>";


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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Search</title>
    <style>

    </style>
</head>
<body>

</body>
</html>
