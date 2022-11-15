<?php

namespace mvc\controller;

require_once('AController.php');
require_once(__DIR__ . '/../model/managers/SecteursStructuresManager.php');

use mvc\model\entities\SecteursStructures;
use mvc\model\manager\SecteursStructuresManager;

class SecteurStructureController extends AController
{
    public function __construct()
    {
        $this->manager = new SecteursStructuresManager();
    }
    
    public function viewSecteurStructure(int $idStructure){
        $secteursStructures = $this->findAllSecteurStructure($idStructure);
        
    }
}
    
    ?>