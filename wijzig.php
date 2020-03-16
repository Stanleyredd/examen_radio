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

?>

<?php
include "back/conn.php";







$znaam = $_GET["zendernaam"];

$query = "select zenderID, zendernaam, omschrijving from zender WHERE zendernaam='$znaam'";
$result = $conn->query($query);
if ($result->num_rows > 0){
    while ($row = $result->fetch_assoc()){

        $znaam = $row["zendernaam"];
        $zenderID = $row["zenderID"];
        $omschrijving = $row["omschrijving"];

    }

}else{
    echo "errpr";
}
$conn->close();

?>

<table id="table1">
    <form action="back/back_wijzig.php?zenderID=$zenderID" method="post">
        <div id="form">
            <label hidden aria-hidden="true" for="">zenderID: </label>      <input aria-hidden="true" type="text" class="gegevens" name="zenderID" hidden value="<?php echo $zenderID; ?>">

            <h1>Zender wijzigen</h1>
            <label for="">Oude zendernaam</label><br><input type="text" name="zendernaam" readonly="readonly" value="<?php echo $znaam; ?>"><br><br>
            <label for="">Nieuwe zendernaam</label><br><input type="text" name="zendernaam2" value="">
            <br><br><br>
            <label for="">Omschrijving</label><br><textarea name="omschrijving" cols="30" rows="10" required><?php echo $omschrijving; ?></textarea>                                     <br>
            <br>
            <input type="submit" class="submit" value="Wijzigen"><br>
        </div>
    </form>

    <div id="1" >
    </div>
</table>








</body>
</html>







