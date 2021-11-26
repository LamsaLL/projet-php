<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="/php-lp/projet-php/projet-php/style/style.css" />
</head>

<body>
    <?php
// var_dump($organizations);
    ?>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Nom</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($organizations as $organization) { 
            ?>
            <tr>
                <td><?php echo $organization->getId(); ?></td>
                <td><?php echo $organization->getName(); ?></td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
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

</html>