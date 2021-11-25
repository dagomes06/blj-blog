<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Alle Beiträge</title>
</head>
<body class = "inhalte">
    <header class="header">Alle Beiträge</header>

    <?php
    include '../include/navigation.php'
    ?>
    <?php
    $pdo = new PDO('mysql:host=localhost;dbname=blog', 'root', '');

    $sql = "SELECT created_by, created_at, post_title, post_text FROM posts";
    foreach ($pdo->query($sql) as $row) {
       echo "Erstellt von: ".$row['created_by']." am: ".$row['created_at']."<br />";
       echo "Titel: ".$row['post_title']."<br> Beitrag: ".$row['post_text']."<br /><br />";
    }?>

</body>
</html>