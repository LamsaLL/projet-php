<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="style/style.css" />
</head>

<body>
    <form action="index.php?action=addActivity" method="post">
        <?php
        if (isset($activity)) { ?>
            <label for="activityLabel">Nom</label>
            <input type="text" name="label" value="<?= $activity->getLabel() ?>"><br />
            <input type="hidden" name="editActivity" value="<?= $activity->getId()?>" />
            <input type="submit" name="edit" value="Modifier">
        <?php } ?>
    </form>
<a href="index.php"><button>Retour</button></a><br />
</body>

</html>