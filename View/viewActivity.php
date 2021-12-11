<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
</head>

<body>
<?php

if ($activity) { ?>
    Id : <?= $activity->getId() ?><br />
    Nom : <?= $activity->getLabel() ?><br />
<?php } ?>
<a href="index.php?action=viewOrganizations">Liste de structures</a><br />
<a href="index.php?action=viewActivities">Liste d'activités</a>
</body>

</html>