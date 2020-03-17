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
    <title>Document</title>
    <style>
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


    </style>

</head>
<body>
<?php
include_once"navbar.php";

$titel = $_GET["titel"];

$sql2 = "select nummerID, artiest, duur from nummer where titel='$titel'";
$result = $conn->query($sql2);

if ($result->num_rows > 0) {
// output data of each row
    while ($row = $result->fetch_assoc()) {
        $nummerID = $row['nummerID'];
        $artiest = $row['artiest'];
        $duur = $row['duur'];


    }
}else{
    $conn->error;


}
$conn->close();



?>



<table id="table1">
    <form action='back/back_wijzig_nummer.php?nummerID=<?php echo $nummerID ?>' method="post">
        <div id="form">
            <h1>Nummer wijzigen</h1>
            <label for="">Oude titel</label><br><input type="text" name="oudetitel" readonly="readonly" value="<?php echo $titel; ?>"><br><br>
            <label for="">Nieuwe titel</label><br><input type="text" name="nieuwetitel" value="">
            <br><br><br>

            <label for="">Artiest</label><br>
            <input type="text" required  name="artiest" value="<?php echo $artiest; ?>">
            <br><br>
            <label for="">Duur</label><br>
            <input type="time" required name="duur" value="<?php echo $duur; ?>">
            <br><br><br>
            <input type="submit" class="submit" value="Wijzigen"><br>
        </div>
    </form>

    <div id="1" >
    </div>
</table>








</body>
</html>







