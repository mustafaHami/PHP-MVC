<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
</head>

<body>
    <?php
    //var_dump($auth);

    if ($sect) { ?>
    <form method="post" action="index.php?action=updateSecteur">
        <table>
            <tr>
                <td>ID(Non modifiable) : <?= $sect->getId()?></td>
                <td><input type="hidden" name="id" value="<?= $sect->getId()?>"></td>
            </tr>
            <tr>
                <td>Libelle</td>
                <td><input required type="text" name="libelle" value="<?= $sect->getLibelle() ?>">
                </td>
            </tr>

        </table>
        <input type="submit" name="updateSecteur" value="Modifier"
            style="background-color : #FFA833 ; padding : 4px; width : 80px;border-radius : 7px;" />
    </form>
    <?php
    }
    ?>
    <br /><br /><a href="index.php?action=viewStructures">Liste des Structures</a>
</body>

</html>