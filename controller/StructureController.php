<?php

namespace mvc\controller;

require_once('AController.php');
require_once('fonctions.php');
require_once(__DIR__ . '/../model/managers/StructureManager.php');
require_once(__DIR__ . '/../model/managers/SecteurManager.php');
require_once(__DIR__ . '/../model/managers/SecteursStructuresManager.php');


use mvc\model\entities\SecteursStructures;
use mvc\model\entities\Structure;

use mvc\model\manager\StructureManager;
use mvc\model\manager\SecteurManager;
use mvc\model\manager\SecteursStructuresManager;

use \PDO;
class StructureController extends AController
{
    public function __construct()
    {
        $this->manager = new StructureManager();
        $this->managerSecteur = new SecteurManager();
        $this->managerSecteurStructure = new SecteursStructuresManager();
    }

    public function viewStructures(): void
    {
        $title = 'Liste des structures';
        $structures = $this->findAll();
        $secteurs = $this->managerSecteur->findAll(PDO::FETCH_ASSOC);
        require(__DIR__ . '/../view/viewStructures.php');
    }

    public function viewStructure(int $id,String $valeur): void
    {
        if($valeur == "view"){
            $title = 'Détail de la structure';
            $structure = $this->findById($id);
            $secteurStructures = $this->managerSecteurStructure->findByIdStructure(PDO::FETCH_ASSOC,$id);
            $secteurs = [];
            foreach ($secteurStructures as $sectStruc) {
                $idSecteur = $sectStruc->getIdSecteur();
                $secteurs[] = $this->managerSecteur->findById($idSecteur);
            }
            if ($structure && $secteurs) {
                require(__DIR__ . '/../view/viewStructure.php');
            } else {
                $error = 'id de la structure non valide';
                require(__DIR__ . '/../view/error.php');
            }
        }else if($valeur == "modifier"){
            $title = 'Mofication de la structure';
            $structure = $this->findById($id);
            $secteurStructures = $this->managerSecteurStructure->findByIdStructure(PDO::FETCH_ASSOC,$id);
            $secteurs = $this->managerSecteur->findAll(PDO::FETCH_ASSOC);
            if ($structure &&  $secteurs) {
                require(__DIR__ . '/../view/viewStructureUpdate.php');
            } else {
                $error = 'id de la structure non valide';
                require(__DIR__ . '/../view/error.php');
            }  
        }

    }

    public function addStructure(): void
    {
        $isestasso = isset($_POST['estasso']) ? 1 : 0;
        $idStructure = $this->manager->findByName($_POST['nom']);

		if(isset($_POST['nom'], $_POST['rue'], $_POST['cp'], $_POST['ville'], $isestasso, $_POST['nb_donateurs'], $_POST['nb_actionnaires'])){
            $_SESSION['nom']=  $_POST['nom'];
            $_SESSION['rue']=  $_POST['rue'];
            $_SESSION['cp']=  $_POST['cp'];
            $_SESSION['ville']=  $_POST['ville'];
            $_SESSION['nb_donateurs']=  $_POST['nb_donateurs'];
            $_SESSION['nb_actionnaires']=  $_POST['nb_actionnaires'];
            $_SESSION['estasso']=  $isestasso;
            
            createCookie('nom',$_POST['nom']);
			createCookie('rue',$_POST['rue']);
			createCookie('ville',$_POST['ville']);
            createCookie('nb_donateurs',$_POST['nb_donateurs']);
			createCookie('nb_actionnaires',$_POST['nb_actionnaires']);
            createCookie('estasso', $isestasso);
            createCookie('cp',$_POST['cp']);

		}
        if($idStructure == null){
            $structure = new Structure(null, $_POST['nom'], $_POST['rue'], $_POST['cp'], $_POST['ville'], $isestasso, $_POST['nb_donateurs'], $_POST['nb_actionnaires']);
            $this->insert($structure);
            $idStructure = $this->manager->findByName($_POST['nom']);
            foreach($_POST['radiosecteur'] as $valeur){
                $secteurStructure = new SecteursStructures(null,$idStructure,intval($valeur));
               $this->managerSecteurStructure->insert($secteurStructure);
            }
            header('Location: index.php?action=viewStructures');
        }else{
            $error = 'Nom déjà existant';
            require(__DIR__ . '/../view/error.php');
        }

        
    }
    public function deleteStructure(int $id): void
    {
        $this->managerSecteurStructure->deleteStructure($id);
        $this->delete($id);
        header('Location: index.php?action=viewStructures');
    }

    public function updateStructure() : void
    {
        $isestasso = isset($_POST['estasso']) ? 1 : 0;
        $this->managerSecteurStructure->deleteStructure($_POST['id']);
        foreach($_POST['radiosecteur'] as $valeur){
            $secteurStructure = new SecteursStructures(null,$_POST['id'],intval($valeur));
           $this->managerSecteurStructure->insert($secteurStructure);
        }
        
        $structure = new Structure($_POST['id'], $_POST['nom'], $_POST['rue'], $_POST['cp'], $_POST['ville'], $isestasso, $_POST['nb_donateurs'], $_POST['nb_actionnaires']);

        $this->update($structure);
        
        header('Location: index.php?action=viewStructures');
    }
}