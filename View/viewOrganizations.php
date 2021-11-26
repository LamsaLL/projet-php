<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="/php-lp/projet-php/projet-php/style/style.css" />
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
                    <button>Détail</button>
                    <button>Modifier</button>
                    <button>Supprimer</button>
                </td>

            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
<<<<<<< HEAD
    <!-- <br /><br />
    <form method="post" action="index.php?action=addAccount">
        <table>
            <tr>
                <td>Login</td>
                <td><input required type="text" name="login"></td>
            </tr>
            <tr>
                <td>Nom</td>
                <td><input required type="text" name="name"></td>
            </tr>
            <tr>
                <td>Prénom</td>
                <td><input required type="text" name="surname"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input required type="email" name="email"></td>
            </tr>
            <tr>
                <td>Mot de passe</td>
                <td><input required type="password" name="pass"></td>
            </tr>
            <tr>
                <td>Administrateur</td>
                <td><input type="checkbox" name="isadmin"></td>
            </tr>
        </table>
        <input type="submit" name="add" value="Ajouter">
    </form>
    <br /><br /><a href="index.php?action=viewAuths">Liste des autorisations</a>
    -->
</body>
=======
>>>>>>> 5a889b2058d318562c25a10cfa62ce96915aca31

</html>