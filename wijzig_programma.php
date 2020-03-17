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

$programmanaam = $_GET["programmanaam"];
echo $programmanaam;


$sql2 = "select programmaID, datum, beginTijd, eindTijd, presentatie from programma 
where programmanaam='$programmanaam'";
$result = $conn->query($sql2);

if ($result->num_rows > 0) {
// output data of each row
    while ($row = $result->fetch_assoc()) {
        $programmaID = $row['programmaID'];
        $datum = $row['datum'];
        $begintijd = $row['beginTijd'];
        $eindtijd = $row['eindTijd'];
        $presentator = $row['presentatie'];

    }
}else{
    $conn->error;


}
$conn->close();



?>



<table id="table1">
    <form action='back/back_wijzig_programma.php' method="post">
        <div id="form">
            <h1>Programma wijzigen</h1>
            <label for="">Oude programma naam</label><br><input type="text" name="programmanaam1" readonly="readonly" value="<?php echo $programmanaam; ?>"><br><br>
            <label for="">Nieuwe programma naam</label><br><input type="text" name="programmanaam2" value="">
            <br><br><br>

            <label for="">Datum</label><br>
            <input type="date" required  name="datum" value="<?php echo $datum; ?>">
            <br><br>
            <label for="">Begin tijd</label><br>
            <input type="time" required name="begintijd" value="<?php echo $begintijd; ?>">
            <br><br>
            <label for="">Eind tijd</label><br>
            <input type="time" required name="eindtijd" value="<?php echo $eindtijd; ?>">
            <br><br>
            <label for="">Presentator</label><br>
            <input type="text" required name="presentatie" value="<?php echo $presentator; ?>"><br>
            <br><br><br>
            <input type="submit" class="submit" value="Wijzigen"><br>
        </div>
    </form>

    <div id="1" >
    </div>
</table>

<?php
//include "back/conn.php";
//
//
//
//$DBConnect = new mysqli("localhost","root","","mydb");
//    $sql = "UPDATE programma SET programmaNaam = '$programmaNaam', datum = '$datum', beginTijd = '$beginTijd',
//eindTijd = '$eindtijd' presentatie = '$presentator' WHERE ";
//
//
//
//
//if ($conn->query($sql) == true){
//    header("location:../zenders.php");
//
//}else{
//    echo "Er is iets fout gegaan, probeer het opnieuw.<br><br>";
//    echo "De error is: ";
//    echo $sql. "<br>". $conn->error;
//}
//
//$conn->close();
//
//
//?>







</body>
</html>







