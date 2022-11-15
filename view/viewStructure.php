<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
</head>

<body>
    <?php
//var_dump($account);
if ($structure) { ?>
    Id : <?= $structure->getId() ?><br />
    Nom : <?= $structure->getNom() ?><br />
    Rue : <?= $structure->getRue() ?><br />
    Code Postal : <?= $structure->getCp() ?><br />
    Ville : <?= $structure->getVille() ?><br />
    Nombre de donnateurs : <?= $structure->getNb_donateurs() ?><br />
    Nombre d'actionnaires : <?= $structure->getNb_actionnaires() ?><br /><br />
    Est une association :<?php if($structure->getEstasso()){
        echo' Oui';
        }else{
            echo' Non'; 
        } ?>
    <p>Liste des secteurs à laquelle appartient la structure :</p>
    <ul>
        <?php foreach ($secteurs as $secteur){?>
        <li><?= $secteur->getLibelle();?></li>
        <?php
    }
    ?>
    </ul>
    <br /><br />
    <?php
    }
    ?>
    <a href="index.php?action=viewStructures">Liste des Structures</a><br />
    <a href="index.php?action=viewSects">Liste des Secteurs</a>
</body>

</html>