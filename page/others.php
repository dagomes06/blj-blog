<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Andere Blogs</title>
</head>
<body class="inhalte">
<header class="header">Andere Blogs</header>

<?php
include '../include/navigation.php'
?>

<?php
    $pdo = new PDO('mysql:host=mysql2.webland.ch;dbname=d041e_dagomez', 'd041e_dagomez', '54321_Db!!!');

    $sql = "SELECT description, url, FROM urls";
    foreach ($pdo->query($sql) as $row) { 
        echo $row['description']; "".$row['url'];
    }
?>



</body>
</html>