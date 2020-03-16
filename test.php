//fotos displayen

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="#" enctype="multipart/form-data" method="post">
    <input multiple="" name="img[]" type="file" />
    <input name="submit" type="submit" />
</form>
<?php

$con = mysqli_connect("localhost","root","","mydb");
$con2 = mysqli_connect("localhost","root","","ima");
if(isset($_POST["submit"])){
    $filename = $_FILES['img']['name'];
    $file_tmp = $_FILES['img']['tmp_name'];
    $filetype = $_FILES['img']['type'];
    $filesize = $_FILES['img']['size'];
    for($i=0; $i<=count($file_tmp); $i++){
        if(!empty($file_tmp[$i])){
            $name = addslashes($filename[$i]);
            $temp = addslashes(file_get_contents($file_tmp[$i]));
            if(mysqli_query($con2, "Insert into multiple(name,image) values('$name','$temp')")){
            }
            else{
                echo "failed";
                echo "<br />";
            }
        }
    }
}
$res = mysqli_query($con2,"select * from multiple");
while($row = mysqli_fetch_array($res)){
    $displ = $row['name'];

// please place the single quotation ' instead &#39;


echo "<img src='IMG/$displ'>";
echo "<br />";
}
?>

</body>
</html>