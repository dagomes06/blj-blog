<?php
    $user = 'root';
    $password = '';
    $database = 'blog';

    $pdo = new PDO('mysql:host=localhost;dbname=' . $database, $user, $password, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    if(isset($_POST['post-id-up'])) {
        $id  = $_POST['post-id-up'];
        $pdo->exec("UPDATE posts set likes = likes + 1 where id = " . $id);
     }
     else if (isset($_POST['post-id-down'])) {
        $id  = $_POST['post-id-down'];
        $pdo->exec("UPDATE posts set likes = likes - 1 where id = " . $id);
     }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="Stylesheet" href="../css/style.css">
    <title>Alle Beiträge</title>
</head>
<body class = "inhalte">
    <header class="header">Alle Beiträge</header>

    <?php
    include '../include/navigation.php';
    ?>
<div class="position">
<?php

$stmt = $pdo->query('SELECT * FROM `posts`');
foreach($stmt->fetchAll() as $x){
?>
    <div class="kasten">
        <div class="post_title"><?php echo($x['post_title'])?></div><br>
        <div class="post_text"><?php echo($x['post_text'])?></div><br>
        <div class ="urls"><img class ="picture" src=<?php echo ($x['urls'])?>></div><br>
        <div class="created_by"><?php echo($x['created_by'])?></div>
        <div class="created_at"><?php echo($x['created_at'])?></div><br>

        <form action="all.php" Method = 'POST'>
                    <input type="image" src="../pictures/daumenhoch.jpg" alt="Finger hoch" name="Liken" value="Like">
                    <input name="post-id-up" type="hidden" value="<?= $x["id"] ?>" />
                    <div class="likes"><?php echo($x['likes'])?></div> 
                </form>
        <form action="all.php" Method = 'POST'>
                    <input type="image" src="../pictures/thumbsdown.jpg" alt="Finger runter" name="Disliken" value="Dislike">
                    <input name="post-id-down" type="hidden" value="<?= $x["id"] ?>"/>

        </form>
    </div>
<?php } ?>
</div>
</body>
</html>