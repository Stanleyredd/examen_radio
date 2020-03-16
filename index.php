<?php
/**
 * Created by PhpStorm.
 * User: stanley
 * Date: 26-2-2020
 * Time: 09:19
 */

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








        .item2 { grid-area: main1; }
        .item3 { grid-area: main2; }
        .item4 { grid-area: main3; }
        .item5 { grid-area: footer; }

        .grid-container {
            display: grid;
            grid-template-areas:
                'header header header header header header'
                'main1 main1 main2 main2 main3 main3'
                'footer footer footer footer footer footer';
            grid-gap: 10px;
            padding: 10px;

        }

        .grid-container > .item2,.item3,.item4 {
            background-color: rgba(255, 255, 255, 0.8);
            text-align: center;
            padding: 20px 0;

            font-size: 30px;
        }

        .item5{
            background-color: rgba(255, 255, 255, 0.8);
            text-align: left;
            padding: 20px 0;
            font-size: 30px;


            position: fixed;
            bottom: 0;
            width: 100%;


        }



    </style>
</head>
<body>
<?php
include_once"navbar.php";
?>

<div class="grid-container">
    <div class="item2">
        <img src="IMG/bruiloft-dj-huwelijksfeest.jpg" alt="">
    </div>
    <div class="item3">
        <img src="IMG/bruiloft-dj-huwelijksfeest.jpg" alt="">

    </div>
    <div class="item4">
        <img src="IMG/bruiloft-dj-huwelijksfeest.jpg" alt="">
    </div>
    <div class="item5">Copyright Kraeken & Krønen</div>
</div>



</body>
</html>
