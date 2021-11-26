<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="style/style.css" />
</head>

<body>
    <table>
        <thead>
        <tr>
            <th>id</th>
            <th>Nom</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
            foreach ($activities as $activity) {
        ?>
            <tr>
                <td><?php echo $activity->getId(); ?></td>
                <td><?php echo $activity->getLabel(); ?></td>
                <td>
                    <a href="index.php?action=viewActivity&id=<?= $activity->getId()?>">Détail
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