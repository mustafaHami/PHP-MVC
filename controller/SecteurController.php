<?php

namespace mvc\controller;

require_once('AController.php');
require_once(__DIR__ . '/../model/managers/StructureManager.php');
require_once(__DIR__ . '/../model/managers/SecteurManager.php');
require_once(__DIR__ . '/../model/managers/SecteursStructuresManager.php');

use mvc\model\entities\Secteur;
use mvc\model\manager\SecteurManager;

use mvc\model\entities\SecteursStructures;
use mvc\model\manager\SecteursStructuresManager;

use mvc\model\entities\Structure;
use mvc\model\manager\StructureManager;

use \PDO;
class SecteurController extends AController
{
    public function __construct()
    {
        $this->manager= new SecteurManager();
        $this->managerStructure = new StructureManager();
        $this->managerSecteurStructure = new SecteursStructuresManager();
    }

    public function viewSects() : void
    {
        $title = 'Liste des secteurs';
        $sects = $this->findAll();

        require(__DIR__ . '/../view/viewSects.php');
    }

    public function viewSect(int $id,String $nompage) : void
    {
        if($nompage == 'view'){
            $title = 'Détail de secteur';
            $sect = $this->findById($id);
            $secteurStructures = $this->managerSecteurStructure->findByIdSecteur(PDO::FETCH_ASSOC,$id);
            $structures = [];
            foreach ($secteurStructures as $sectStruc) {
                $idStructure = $sectStruc->getIdStructure();
                $structures[] = $this->managerStructure->findById($idStructure);
            }
            if ($sect && $structures) {
                require(__DIR__ . '/../view/viewSect.php');
            }
            else {
                $error = 'id du secteur non valide';
                require(__DIR__ . '/../view/error.php');
            }
        }else if($nompage == 'modifier'){
            $title = 'Modification de secteur';
            $sect = $this->findById($id);
    
            if ($sect) {
                require(__DIR__ . '/../view/viewSectUpdate.php');
            }
            else {
                $error = 'id du secteur non valide';
                require(__DIR__ . '/../view/error.php');
            }
        }

    }

    public function addSect() : void
    {
        $idSecteur = $this->manager->findByName($_POST['libelle']);
        createCookie('libelle',$_POST['libelle']);
        $_SESSION['libelle'] = $_POST['libelle'];
        if($idSecteur == null){
            $sect = new Secteur(null,$_POST['libelle']);
            $this->insert($sect);
            header('Location: index.php?action=viewSects');

        }else{
            $error = 'Libelle déjà existant !';
            require(__DIR__ . '/../view/error.php');
        }
        
    }
    public function deleteSecteur(int $id): void{
        
        $this->managerSecteurStructure->deleteSecteur($id);
        $this->delete($id);
        header('Location: index.php?action=viewSects');
    }

    public function updateSecteur() :void {
        
        $sect = new Secteur($_POST['id'],$_POST['libelle']);
        $this->update($sect);
        header('Location: index.php?action=viewSects');    

    }
}