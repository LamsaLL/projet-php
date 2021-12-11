<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
</head>

<body>
    <?php

if ($organization) { ?>
    Id : <?= $organization->getId() ?><br />
    Nom : <?= $organization->getName() ?><br />
    Rue : <?= $organization->getStreet() ?><br />
    Code postale : <?= $organization->getPostalCode() ?><br />
    Ville : <?= $organization->getCity() ?><br />
    Est une assocociation : <?= $organization->getIsAssociation() ?><br />
    Nombre de donateurs: <?= $organization->getDonorsNumber() ?><br /><br />
    Nombre d'investisseurs: <?= $organization->getInvestorsNumber() ?><br /><br />
    <?php } ?>
    <a href="index.php?action=viewOrganizations">Liste des structures</a><br />
    <a href="index.php?action=viewActivities">Liste des activités</a>
</body>

</html>