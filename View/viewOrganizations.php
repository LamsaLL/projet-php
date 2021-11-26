<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="style/style.css" />
</head>

<body>
    <button>Ajouter une nouvelle structure</button>
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
                    <button>Supprimer</button>
                </td>

            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</body>

</html>