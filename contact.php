<?php
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

<div>
    <form action='back/back_contact.php' method="post">
        <div id="form">
            <h1>Nummer wijzigen</h1>

            <label for="">Onderwerp</label><br><input type="text" name="onderwerp" value="">
            <br><br><br>

            <label for="">Vraag</label><br>
            <textarea name="vraag" cols="30" rows="10"></textarea>
                <br><br>
            <label for="">E-mail</label><br>
            <input type="email" required name="email" value="">
            <br><br><br><?php
            include_once"navbar.php";

            $ok = isset($_GET['gelukt']);

            //Insert this code where you wanted to show the msg
            if($ok)  {
                echo '<div class="alert alert-success" role="alert" style="color: forestgreen">
             Uw vraag is opgestuurt
           </div>';
            }

            ?>
            <input type="submit" class="submit" value="Verstuur"><br>
        </div>
    </form>

</div>




</body>
</html>