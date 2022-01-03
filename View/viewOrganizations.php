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
        <input required type="text" name="name"
            value=<?php if (isset($_SESSION['nameSession'])) echo htmlspecialchars($_SESSION['nameSession']);?>>

        <label for="street">Rue</label>
        <input required type="text" name="street"
            value=<?php if (isset($_SESSION['streetSession'])) echo htmlspecialchars($_SESSION['streetSession']);?>>

        <label for="postalCode">Code postale</label>
        <input required type="text" maxlength="5" name="postalCode"
            value=<?php if (isset($_SESSION['postalCodeSession'])) echo htmlspecialchars($_SESSION['postalCodeSession']);?>>

        <label for="city">Ville</label>
        <input required type="text" name="city"
            value=<?php if (isset($_SESSION['citySession'])) echo htmlspecialchars($_SESSION['citySession']);?>>

        <label for="isAsso">Est asso</label>
        <input type="checkbox" name="isAsso" <?php 
            if (isset($_SESSION['isAssoSession'])) {
                if ($_SESSION['isAssoSession'] == 1) {
                    echo 'checked';
                }
            }        
            ?>>

        <label for="donorsNumber">Nombre de donnateurs</label>
        <input type="number" min="1" name="donorsNumber"
            value=<?php if (isset($_SESSION['donorsNumberSession'])) echo htmlspecialchars($_SESSION['donorsNumberSession']);?>>

        <label for="investorsNumber">Nombre d'investisseurs</label>
        <input type="number" min="1" name="investorsNumber"
            value=<?php if (isset($_SESSION['investorsSession'])) echo htmlspecialchars($_SESSION['investorsSession']);?>>

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
                    <a
                        href="index.php?action=viewOrganization&id=<?= $organization->getId()?>"><button>Détail</button></a>
                    <a
                        href="index.php?action=modifyOrganization&id=<?= $organization->getId()?>"><button>Modifier</button></a>
                    <a
                        href="index.php?action=deleteOrganization&id=<?= $organization->getId()?>"><button>Supprimer</button></a>
                </td>

            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
    <a href=".">Revenir à l'accueil</a><br />
</body>

</html>