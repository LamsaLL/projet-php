<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="style/style.css" />
</head>

<body>
<form action="index.php?action=addOrganization" method="post">
    <?php
    if (isset($organization)) { ?>
        <label for="name">Nom</label>
        <input required type="text" name="name" value="<?=$organization->getName()?>"></br>

        <label for="street">Rue</label>
        <input required type="text" name="street" value="<?=$organization->getStreet()?>"></br>

        <label for="postalCode">Code postale</label>
        <input required type="text" maxlength="5" name="postalCode" value="<?=$organization->getPostalCode()?>"></br>

        <label for="city">Ville</label>
        <input required type="text" name="city" value="<?=$organization->getCity()?>"></br>

        <label for="isAsso">Est asso</label>
        <input type="checkbox" name="isAsso" value="<?=$organization->getIsAssociation()?>" <?php if($organization->getIsAssociation() == 1){echo "checked";} ?>></br>

        <label for="donorsNumber">Nombre de donnateurs</label>
        <input type="number" min="1" name="donorsNumber" value="<?=$organization->getDonorsNumber()?>"></br>

        <label for="investorsNumber">Nombre d'investisseurs</label>
        <input type="number" min="1" name="investorsNumber" value="<?=$organization->getInvestorsNumber()?>"></br>

        <input type="hidden" name="editOrganization" value="<?=$organization->getId()?>" />
        <input type="submit" name="edit" value="Modifier">
    <?php } ?>
</form>
<a href="index.php"><button>Retour</button></a><br />
</body>

</html>