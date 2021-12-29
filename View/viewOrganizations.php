<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="style/style.css" />
</head>

<body>
    <form method="post" action="index.php?action=addOrganization">
        <label for="name">Nom</label>
        <input required type="text" name="name">

        <label for="street">Rue</label>
        <input required type="text" name="street">

        <label for="postalCode">Code postale</label>
        <input required type="text" maxlength="5" name="postalCode">

        <label for="city">Ville</label>
        <input required type="text" name="city">

        <label for="isAsso">Est asso</label>
        <input type="checkbox" name="isAsso" >

        <label for="donorsNumber">Nombre de donnateurs</label>
        <input type="number" min="1" name="donorsNumber">

        <label for="investorsNumber">Nombre d'investisseurs</label>
        <input type="number" min="1" name="investorsNumber">

        <input type="submit" name="add" value="Ajouter">
    </form>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Nom</th>
                <th>Rue</th>
                <th>Code postal</th>
                <th>Ville</th>
                <th>Est une association</th>
                <th>Nombre de donnateurs</th>
                <th>Nombre d'investisseurs</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($organizations as $organization) { 
            ?>
            <tr>
                <td><?php echo $organization->getId(); ?></td>
                <td><?php echo $organization->getName(); ?></td>
                <td><?php echo $organization->getStreet(); ?></td>
                <td><?php echo $organization->getPostalCode(); ?></td>
                <td><?php echo $organization->getCity(); ?></td>
                <td><?php echo $organization->getIsAssociation(); ?></td>
                <td><?php echo $organization->getDonorsNumber(); ?></td>
                <td><?php echo $organization->getInvestorsNumber(); ?></td>
                <td>
                    <a href="index.php?action=viewOrganization&id=<?= $organization->getId()?>">Détail
                    </a>
                    <button>Modifier</button>
                    <a href="index.php?action=deleteOrganization&id=<?= $organization->getId()?>"><button>Supprimer</button></a>
                </td>

            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</body>

</html>