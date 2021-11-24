<?php


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $created_by = $_POST['created_by'];
    $created_at = $_POST['created_at'];
    $post_title = $_POST['post_title'];
    $post_text = $_POST['post_text'];

$send = [
    "created by: $created_by<br>",
    "created at: $created_at<br>",
    "titel: $post_title<br>",
    "text: $post_text<br>"
];


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
            <input type="text" id="title" name="title">
        </div>

        <div>
         <label class="form-label" for="note">Beitrag</label><br>
         <textarea name="note" id="note" cols="40" rows="5"></textarea>
        </div>

    </form>

        <div class="form-actions">
            <input class="btn btn-primary" type="submit" value="Absenden">
        </div>


    </fieldset>

</body>
</html>