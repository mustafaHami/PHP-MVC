<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
</head>

<body>

    <?php
   
    foreach ($structures as $structure) { ?>
    <form method="post" action="index.php?action=viewStructure&id=<?= $structure->getId()?>&nompage=view">
        <label style="font-size: 20px;"><?= $structure->getNom(); ?></label>
        <br>
        <input type="submit" name="viewStructure" value="Détails"
            style="background-color : #D1D1D1 ; padding : 4px; width : 80px;border-radius : 7px;" />
    </form>
    <form method="post" action="index.php?action=viewStructure&id=<?= $structure->getId()?>&nompage=modifier ">
        <input type="submit" name="updateStructure" value="Modifier"
            style="background-color : #FFA833 ; padding : 4px; width : 80px;border-radius : 7px;" />
    </form>
    <form method='post' action="index.php?action=deleteStructure&id=<?= $structure->getId()?>">
        <input type="submit" name="deleteStructure" value="Delete"
            style="background-color : #FF3333 ;padding : 4px; width : 80px; border-radius : 7px;" />

    </form>



    <hr>
    <?php
    }
    ?>
    <br /><br />
    <form method="post" action="index.php?action=addStructure">
        <table>
            <tr>
                <td>Nom</td>
                <td><input required type="text" name="nom"
                        style="border: 1px solid black; padding : 3px; border-radius : 4px" value="<?php
                        if(isset($_SESSION['nom'])){
                            echo htmlspecialchars($_SESSION['nom']);
                        }else if (isset($_COOKIE['nom'])){
                            echo htmlspecialchars($_COOKIE['nom']);

                        }
                        ?>"></td>
            </tr>
            <tr>
                <td>Rue</td>
                <td><input required type="text" name="rue"
                        style="border: 1px solid black; padding : 3px; border-radius : 4px" value="<?php
                        if(isset($_SESSION['rue'])){
                            echo htmlspecialchars($_SESSION['rue']);
                        }else if (isset($_COOKIE['rue'])){
                            echo htmlspecialchars($_COOKIE['rue']);

                        }
                        ?>"></td>
            </tr>
            <tr>
                <td>Code postal</td>
                <td><input required type="text" name="cp"
                        style="border: 1px solid black; padding : 3px; border-radius : 4px" value="<?php
                        if(isset($_SESSION['cp'])){
                            echo htmlspecialchars($_SESSION['cp']);
                        }else if (isset($_COOKIE['cp'])){
                            echo htmlspecialchars($_COOKIE['cp']);

                        }
                        ?>"> </td>
            </tr>
            <tr>
                <td>Ville</td>
                <td><input required type="text" name="ville"
                        style="border: 1px solid black; padding : 3px; border-radius : 4px" value="<?php
                        if(isset($_SESSION['ville'])){
                            echo htmlspecialchars($_SESSION['ville']);
                        }else if (isset($_COOKIE['ville'])){
                            echo htmlspecialchars($_COOKIE['ville']);

                        }
                        ?>"> </td>
            </tr>
            <tr>
                <td>Nombre de donnateurs</td>
                <td><input required type="number" name="nb_donateurs"
                        style="border: 1px solid black; padding : 3px; border-radius : 4px" value="<?php
                        if(isset($_SESSION['nb_donateurs'])){
                            echo htmlspecialchars($_SESSION['nb_donateurs']);
                        }else if (isset($_COOKIE['nb_donateurs'])){
                            echo htmlspecialchars($_COOKIE['nb_donateurs']);

                        }
                        ?>"></td>
            </tr>
            <tr>
                <td>Nombre d' actionnaires</td>
                <td><input required type="number" name="nb_actionnaires"
                        style="border: 1px solid black; padding : 3px; border-radius : 4px" value="<?php
                        if(isset($_SESSION['nb_actionnaires'])){
                            echo htmlspecialchars($_SESSION['nb_actionnaires']);
                        }else if (isset($_COOKIE['nb_actionnaires'])){
                            echo htmlspecialchars($_COOKIE['nb_actionnaires']);

                        }
                        ?>"></td>
            </tr>
            <tr>
                <td>Est une association</td>
                <td><input type="checkbox" name="estasso" <?php
                        if(isset($_SESSION['estasso'])){
                            if($_SESSION['estasso'] ==1){
                               echo "checked";
                            }
                        }else if (isset($_COOKIE['estasso'])){
                            if($_COOKIE['estasso'] ==1){
                                echo "checked";
                             }

                        }
                        ?>></td>
            </tr>
            <?php
        $i=1;foreach ($secteurs as $secteur) { ?>
            <tr>
                <td>
                    <input type="checkbox" id="<?= $secteur->getLibelle();?>" name="radiosecteur[]"
                        value="<?= $secteur->getId();?>" <?php if($i ==1){echo 'checked';$i++;}?>>
                    <label for="<?= $secteur->getLibelle();?>"><?= $secteur->getLibelle();?></label>
                </td>

            </tr>
            <?php
    }
    ?>
        </table>
        <input type="submit" name="add" value="Ajouter" style="background: #ffe7e8; border: 2px solid #e66465;">

    </form>
    <br /><br /><a href=" index.php?action=viewSects">Liste des Secteurs</a>
</body>

</html>