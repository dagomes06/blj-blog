<?php
$errors = [];

$name = htmlspecialchars($_POST['name'] ?? '');
$title = htmlspecialchars($_POST['title'] ?? '');
$note = htmlspecialchars($_POST['note'] ?? '');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = $_POST['name'];
    $title = $_POST['title'];
    $note = $_POST['note'];

$send = [
    "created by: $name<br>",
    "titel: $title<br>",
    "text: $note<br>"
];
var_dump($send);


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
$dbConnection = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
$stmt = $dbConnection->prepare('INSERT INTO posts (created_by, created_at, post_title, post_text));
VALUES(:user, now(), :titel, :nachricht)');
$stmt->execute([':user' => $name, ':titel' => $title, ':nachricht' => $note]);
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
    <form action ="" method="post">
    <fieldset class="fieldset">

        <div>
            <label class="form-label" for="name">Ihr Name</label><br>
            <input type="text" id="name" name="name" value="<?= $name ?? '' ?>">
        </div>

        <div>
            <label class="form-label" for="title">Titel</label><br>
            <input type="text" id="title" name="title" value="<?= $title ?? '' ?>">
        </div>

        <div>
         <label class="form-label" for="note">Beitrag</label><br>
         <textarea name="note"  id="note" cols="40" rows="5" value="<?= $note ?? '' ?>"></textarea>
        </div>

    </form>

        <div class="form-actions">
            <input class="btn btn-primary" type="submit" value="Absenden">
        </div>
    </fieldset>

</body>
</html>