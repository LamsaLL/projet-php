<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="/php-lp/projet-php/projet-php/style/style.css" />
</head>

<body>
    <table>
        <thead>
        <tr>
            <th>id</th>
            <th>Nom</th>
        </tr>
        </thead>
        <tbody>
        <?php
            foreach ($activities as $activity) {
        ?>
            <tr>
                <td><?php echo $activity->getId(); ?></td>
                <td><?php echo $activity->getLabel(); ?></td>
            </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
</body>

</html>