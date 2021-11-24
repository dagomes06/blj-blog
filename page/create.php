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