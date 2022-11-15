<?php
session_start();
require_once('./controller/SecteurController.php');
require_once('./controller/StructureController.php');
use mvc\controller\SecteurController;
use mvc\controller\StructureController;

try {
    if (isset($_GET['action'])) {
        if (stripos($_GET['action'], 'structure')) {
            $controler = new StructureController();
            switch ($_GET['action']) {
                case 'viewStructure':
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        if(isset($_GET['nompage'])){
                            if($_GET['nompage'] == 'view'){
                                $structure = $controler->viewStructure($_GET['id'],"view");
                            }else if($_GET['nompage'] == 'modifier'){
                                $structure = $controler->viewStructure($_GET['id'],"modifier");
                            }else{
                                $error = 'Erreur : Nom de la page inconnue <br/>';
                            }
                        }else{
                            $error = 'Erreur : Nom de la page vide <br/>';
                        }
                    } else {
                        $error = 'Erreur : mauvais identifiant<br/>';
                    }
                    break;
                case 'viewStructures':
                    $structures = $controler->viewStructures();
                    break;
                case 'addStructure':
                    if (isset($_POST['nom'], $_POST['rue'], $_POST['cp'], $_POST['ville'], $_POST['nb_donateurs'],$_POST['nb_actionnaires'])) {
                        if(isset($_POST['radiosecteur'])){
                            $controler->addStructure();  
                            // // foreach($_POST['radiosecteur'] as $valeur){
                            //    var_dump(intval($valeur));
                            // }
                                                 
                        }else{
                            $error = 'Erreur : Chaque structure doit être associée à un secteur<br/>';
                        }
                        
                    } else {
                        $error = 'Erreur de paramètres<br/>';
                    }
                    break;
                case 'deleteStructure':
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $structure = $controler->deleteStructure($_GET['id']);
                    } else {
                        $error = 'Erreur : mauvais identifiant<br/>';
                    }
                    break;
                case 'updateStructure':
                    if (isset($_POST['id'],$_POST['nom'], $_POST['rue'], $_POST['cp'], $_POST['ville'], $_POST['nb_donateurs'],$_POST['nb_actionnaires'])) 
                    {
                        if(isset($_POST['radiosecteur'])){
                             $controler->updateStructure();
                        }else{
                            $error = 'Erreur : Chaque structure doit être associée à un secteur<br/>';
                        }
                       
                    } else {
                        $error = 'Erreur de paramètres <br/>';
                    }
                    break;
                default :
                    $error = 'Erreur : action non reconnue<br/>';
                    break;
            }
        } elseif (stripos($_GET['action'], 'sect')) {
            $controler = new SecteurController();
            switch ($_GET['action']) {
                case 'viewSect':
                        if (isset($_GET['id']) && $_GET['id'] > 0) {
                            if(isset($_GET['nompage'])){
                                if($_GET['nompage'] == 'view'){
                                    $sect = $controler->viewSect($_GET['id'],"view");
                                }else if($_GET['nompage'] == 'modifier'){
                                    $sect = $controler->viewSect($_GET['id'],"modifier");
                                }else{
                                    $error = 'Erreur : Nom de la page inconnue <br/>';
                                }
                            } else {
                                $error = 'Erreur : Nom de la page vide <br/>';
                            }
                    }else{
                        $error = 'Erreur : mauvais identifiant<br/>';                    }
 
                    break;
                case 'viewSects':
                    $sects = $controler->viewSects();
                    break;
                case 'addSecteur':
                    if (isset($_POST['libelle'])) {
                        $controler->addSect();
                    } else {
                        $error = 'Erreur de paramètres<br/>';
                    }
                    break;
                case 'deleteSecteur':
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $structure = $controler->deleteSecteur($_GET['id']);
                    } else {
                        $error = 'Erreur : mauvais identifiant<br/>';
                    }
                    break;
                case 'updateSecteur':      
                    var_dump($_POST);
                    if (isset($_POST['id'])){
                        if(isset($_POST['libelle'])){
                            $controler->updateSecteur();
                        }else{
                            $error = 'Erreur de libelle <br/>';
                        }    
                    } else {
                        $error = 'Erreur de id <br/>';
                    }
                    break;
                default :
                    $error = 'Erreur : action non reconnue<br/>';
                    break;
            }
        } else {
            $error = 'Erreur : action non reconnue<br/>';
        }
    } else {
        ?>
<a href="index.php?action=viewStructures">Liste des Structures</a><br />
<a href="index.php?action=viewSects">Liste des Secteurs</a>
<?php
    }
}
catch (Exception $ex) {
    $error='Error '.$ex->getCode().' : '.$ex->getMessage().'<br/>'.str_replace("\n","<br/>",
            $ex->getTraceAsString());
}
if (isset($error)) {
    require(__DIR__.'/view/error.php');
}
?>