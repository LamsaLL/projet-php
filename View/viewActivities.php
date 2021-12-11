<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="style/style.css" />
</head>

<body>
    <form method="post" action="index.php?action=addActivity">
        <label for="label">Nom</label>
        <input required type="text" name="label">

        <input type="submit" name="add" value="Ajouter">
    </form>
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
                    <a href="index.php?action=viewActivity&id=<?= $activity->getId()?>">Détail</a>
                    <button>Modifier</button>
                    <a href="index.php?action=deleteActivity&id=<?= $activity->getId()?>"><button>Supprimer</button></a>
                </td>
            </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
</body>

</html>