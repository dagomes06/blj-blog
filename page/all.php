<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $comment = htmlentities($_POST['comment'] ?? '', ENT_QUOTES);
    $ID = htmlentities($_POST['id'] ?? '', ENT_QUOTES);
    
    if($comment === ''){
    $errors[] = 'Bitte geben Sie ein Kommentar ein';
    }
    
        else{
    $dbConnection = new PDO('mysql:host=localhost;dbname=blog', 'root', '',[PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',]);
    $stmt = $dbConnection->prepare('INSERT INTO posts(id) VALUES(:id)');
    $stmt->execute([':id' => $ID]);
        }
    }


    if (isset($_POST["blog-id"])) {
        $ID = $_POST["blog-id"];
    }

    if(isset($_POST['Liken']) && $_POST['Liken'] == 'Liken') {
        $dbConnection = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
        $stmt = $dbConnection->prepare("UPDATE posts Set likes = likes + 1 WHERE ID = $ID");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Stylesheet" href="../css/style.css">
    <title>Alle Beiträge</title>
</head>
<body class = "inhalte">
    <header class="header">Alle Beiträge</header>

    <?php
    include '../include/navigation.php';

    $user = 'root';
    $password = '';
    $database = 'blog';

    $pdo = new PDO('mysql:host=localhost;dbname=' . $database, $user, $password, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);

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

        <form action ="all.php" method="post">
        <div>
         <label for="note">Kommentieren</label><br>
         <textarea name="comment"  id="comment" cols="50" rows="3" value="<?= htmlspecialchars($comment ?? '' )?>"></textarea> 
         <input class="" type="submit" value="Comment">
        </div>

        </form>
        
        <form action="all.php" Method = 'POST'>
                    <input class = liken type="submit" name="Liken" value="Liken" />
                    <input name="blog-id" type="hidden" value="<?= $data["ID"] ?>" />
                </form>

    </div>
<?php } ?>
</div>


</body>
</html>