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
    Id : <?= $sect->getId() ?><br />
    libelle : <?= $sect->getLibelle() ?><br />
    <?php } ?>
    <p>Liste des structures appartenant à ce secteur :</p>

    <ul>


        <?php
    foreach($structures as $structure){?>
        <li><?=$structure->getNom()?></li>
        <?php
    } 
    ?>
    </ul><br><br>


    <a href="index.php?action=viewStructures">Liste des Structures</a><br />
    <a href="index.php?action=viewSects">Liste des Secteurs</a>
</body>

</html>