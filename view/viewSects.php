<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
</head>

<body>

    <?php
//var_dump($accounts);
foreach ($sects as $sect) { ?>
    <form method="post" action="index.php?action=viewSect&id=<?= $sect->getId()?>&nompage=view">
        <label><?= $sect->getLibelle(); ?></label>
        <br>
        <input type="submit" name="viewSect" value="Détails"
            style="background-color : #D1D1D1 ; padding : 4px; width : 80px;border-radius : 7px;" />

    </form>
    <form method="post" action="index.php?action=viewSect&id=<?= $sect->getId()?>&nompage=modifier">
        <input type="submit" name="viewSect" value="Modifier"
            style="background-color : #FFA833 ; padding : 4px; width : 80px;border-radius : 7px;" />

    </form>
    <form method="post" action="index.php?action=deleteSecteur&id=<?= $sect->getId()?>">
        <input type="submit" name="deleteSecteur" value="Delete"
            style="background-color : #FF3333 ;padding : 4px; width : 80px; border-radius : 7px;" />

    </form>

    <?php
}
?>
    <br /><br />
    <form method="post" action="index.php?action=addSecteur">
        <table>
            <tr>
                <td>Libelle</td>
                <td><input required type="text" name="libelle" value="<?php
                        if(isset($_SESSION['libelle'])){
                            echo htmlspecialchars($_SESSION['libelle']);
                        }else if (isset($_COOKIE['libelle'])){
                            echo htmlspecialchars($_COOKIE['libelle']);
                        }
                        ?>"></td>
            </tr>
        </table>
        <input type="submit" name="add" value="Ajouter" style="background: #ffe7e8; border: 2px solid #e66465;">
    </form>
    <br /><br /><a href=" index.php?action=viewStructures">Liste des Structures</a>
</body>

</html>