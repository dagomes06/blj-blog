<?php
$errors = [];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = htmlentities( $_POST['name'] ?? '', ENT_QUOTES);
    $title = htmlentities($_POST['title'] ?? '', ENT_QUOTES);
    $note = htmlentities($_POST['note'] ?? '', ENT_QUOTES);
    $urls = htmlentities($_POST['urls'] ?? '', ENT_QUOTES);

$send = [
    "created by: $name<br>",
    "titel: $title<br>",
    "text: $note<br>"
];

    if($name === ''){
        $errors[] = 'Bitte geben Sie einen Namen ein';
    }

    if($title === ''){
        $errors[] = 'Bitte geben Sie einen Titel ein';
    }

    if($note === ''){
        $errors[] = 'Bitte geben Sie einen Text ein';
    }

    else{
$dbConnection = new PDO('mysql:host=localhost;dbname=blog', 'root', '',[PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',]);
$stmt = $dbConnection->prepare('INSERT INTO posts (created_by, created_at, post_title, post_text, urls) VALUES(:user, now(), :title, :note, :urls)');
$stmt->execute([':user' => $name, ':title' => $title, ':note' => $note, ':urls' => $urls]);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href= "../css/style.css">
    <title>Beitrag erstellen</title>
</head>
<body class ="inhalte">
    <header class="header">Beitrag erstellen</header>

    <?php if (count($errors) > 0) { ?>
            <div class = "box">
                <ul>
                    <?php foreach ($errors as $error) { ?>
                        <li><?= $error ?></li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>

    <?php
    include '../include/navigation.php'
    ?>
    
    <h3>Erstellen Sie einen Beitrag</h3>
    <form action ="create.php" method="post">
    <fieldset class="fieldset">

        <div>
            <label class="form-label" for="name">Ihr Name</label><br>
            <input type="text" id="name" name="name" value="<?=htmlspecialchars($name ?? '' )?>">
        </div>

        <div>
            <label class="form-label" for="title">Titel</label><br>
            <input type="text" id="title" name="title" value="<?= htmlspecialchars($title ?? '' )?>">
        </div>

        <div>
         <label class="form-label" for="note">Beitrag</label><br>
         <textarea name="note"  id="note" cols="40" rows="7" value="<?= htmlspecialchars($note ?? '' )?>"></textarea>
        </div>

        <div>
            <label class="form-label" for="urls"> URL eingeben</label><br>
            <input type="text" id="urls" name="urls" value="<?=htmlspecialchars($urls ?? '')?>">
        </div>

    </form>

        <div class="form-actions">
            <input class="btn btn-primary" type="submit" value="Absenden">
        </div>

    </fieldset>
</body>
</html>