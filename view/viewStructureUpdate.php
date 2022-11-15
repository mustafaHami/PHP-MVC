<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
</head>

<body>
    <?php
//var_dump($account);
if ($structure) { 
?>
    <form method="post" action="index.php?action=updateStructure">
        <table>
            <tr>
                <td>ID (Non modifiable) <?= $structure->getId()?></td>
                <td><input type="hidden" name="id" style="border: 1px solid black; padding : 3px; border-radius : 4px"
                        value="<?= $structure->getId()?>"></td>
            </tr>
            <tr>
                <td>Nom</td>
                <td><input required type="text" name="nom"
                        style="border: 1px solid black; padding : 3px; border-radius : 4px"
                        value="<?= $structure->getNom()?>"></td>
            </tr>
            <tr>
                <td>Rue</td>
                <td><input required type="text" name="rue"
                        style="border: 1px solid black; padding : 3px; border-radius : 4px"
                        value="<?= $structure->getRue() ?>"></td>
            </tr>
            <tr>
                <td>Code postal</td>
                <td><input required type="text" name="cp"
                        style="border: 1px solid black; padding : 3px; border-radius : 4px"
                        value="<?= $structure->getCp() ?>"></td>
            </tr>
            <tr>
                <td>Ville</td>
                <td><input required type="text" name="ville"
                        style="border: 1px solid black; padding : 3px; border-radius : 4px"
                        value="<?= $structure->getVille() ?>"></td>
            </tr>
            <tr>
                <td>Nombre de donnateurs</td>
                <td><input required type="number" name="nb_donateurs"
                        style="border: 1px solid black; padding : 3px; border-radius : 4px"
                        value="<?= $structure->getNb_donateurs() ?>"></td>
            </tr>
            <tr>
                <td>Nombre d' actionnaires</td>
                <td><input required type="number" name="nb_actionnaires"
                        style="border: 1px solid black; padding : 3px; border-radius : 4px"
                        value="<?= $structure->getNb_actionnaires() ?>"></td>
            </tr>
            <tr>
                <td>Est une association</td>
                <td><input type="checkbox" name="estasso" <?php if($structure->getEstasso()){ echo 'checked';
        } ?>></td>
            </tr>
            <?php
        
        foreach ($secteurs as $secteur) { 
            $cocher = false;
            foreach($secteurStructures as $sectStruc){
                if($sectStruc->getIdSecteur() == $secteur->getId()){
                    $cocher = true;
                }
            }?>

            <tr>
                <td>
                    <input type="checkbox" id="<?= $secteur->getLibelle();?>" name="radiosecteur[]"
                        value="<?= $secteur->getId();?>" <?php if($cocher == true){echo 'checked';}?>>
                    <label for="<?= $secteur->getLibelle();?>"><?= $secteur->getLibelle();?></label>
                </td>

            </tr>
            <?php
    }
    ?>
        </table>
        <input type="submit" name="modifier" value="Modifier"
            style="background-color : #FFA833 ; padding : 4px; width : 80px;border-radius : 7px;" />

    </form>
    <?php
    }
    ?>
    <br /><br /><a href=" index.php?action=viewSects">Liste des Secteurs</a>
</body>

</html>