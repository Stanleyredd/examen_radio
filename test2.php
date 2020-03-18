<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <title>PHP Search</title>
</head>
<body>
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
</body>
</html>