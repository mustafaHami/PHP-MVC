<?php 

namespace mvc\model\manager;

require_once(__DIR__ . '/../entities/SecteursStructures.php');
require_once(__DIR__ . '/../entities/Entity.php');
require_once('PDOManagerSectStruct.php');

use mvc\model\entities\SecteursStructures;
use mvc\model\entities\Entity;
use mvc\model\entities\Secteur;
use \PDOStatement;

class SecteursStructuresManager extends PDOManagerSectStruct
{
    public function findById(int $id): ?Entity
    {
        $stmt = $this->executePrepare("select * from secteurs_structures where id=:id", ['id' => $id]);
        $secteurStructure = $stmt->fetch();
        if (!$secteurStructure) return null;
        return  new SecteursStructures(
            $secteurStructure['ID'],
            $secteurStructure['ID_STRUCTURE'],
            $secteurStructure['ID_SECTEUR']
        );
    }
    public function findByIdStructure(int $pdoFecthMode,int $idStructure): array
    {
        $stmt = $this->executePrepare("select * from secteurs_structures where ID_STRUCTURE=:ID_STRUCTURE", ['ID_STRUCTURE' => $idStructure]);
        $secteurStructures = $stmt->fetchAll($pdoFecthMode);
        $secteurStructureEntities = [];
        foreach ($secteurStructures as $secteurStructure) {
            $secteurStructureEntities[] = new SecteursStructures(
                $secteurStructure['ID'],
                $secteurStructure['ID_STRUCTURE'],
                $secteurStructure['ID_SECTEUR']
            );
        }
        return $secteurStructureEntities;
    }
    public function findByIdSecteur(int $pdoFecthMode,int $idSecteur): array
    {
        $stmt = $this->executePrepare("select * from secteurs_structures where id_Secteur=:id_Secteur", ['id_Secteur' => $idSecteur]);
        $secteurStructures = $stmt->fetchAll($pdoFecthMode);
        $secteurStructureEntities = [];
        foreach ($secteurStructures as $secteurStructure) {
            $secteurStructureEntities[] = new SecteursStructures(
                $secteurStructure['ID'],
                $secteurStructure['ID_STRUCTURE'],
                $secteurStructure['ID_SECTEUR']
            );
        }
        return $secteurStructureEntities;
    }
    public function find(): PDOStatement
    {
        $stmt = $this->executePrepare("select * from secteurs_structures", []);
        
        return $stmt;
    }

    public function findAll(int $pdoFecthMode): array
    {
        $stmt = $this->find();
        $secteurStructures= $stmt->fetchAll($pdoFecthMode);

        $secteurStructureEntities = [];
        foreach ($secteurStructures as $secteurStructure) {
            $secteurStructureEntities[] = new SecteursStructures(
                $secteurStructure['ID'],
                $secteurStructure['ID_STRUCTURE'],
                $secteurStructure['ID_SECTEUR']
            );
        }
        return $secteurStructureEntities;
    }

    public function insert(Entity $e): PDOStatement
    {
        $req = "insert into `secteurs_structures` (`ID`, `ID_STRUCTURE`, `ID_SECTEUR`)  values (:id, :id_structure, :id_secteur)";

        $params = array('id' => $e->getId(), 'id_structure' => $e->getIdStructure(), 'id_secteur' => $e->getIdSecteur());

        $res = $this->executePrepare($req, $params);
        return $res;
    }

    public function updateSecteur(Entity $e): PDOStatement
    {
        $req = "update `secteurs_structures` set id_secteur = :id_secteur where id = :id";
        $params = array('id_secteur' => $e->getId(), 'id' => $e->getId());
        $res = $this->executePrepare($req, $params);

        return $res;
    }
    
    public function updateStructure(Entity $e): PDOStatement
    {
        $req = "update `secteurs_structures` set id_structure = :id_structure where id = :id";
        $params = array('id_secteur' => $e->getId(), 'id' => $e->getId());
        $res = $this->executePrepare($req, $params);

        return $res;
    }
    
    public function deleteSecteur(int $idSecteur): PDOStatement{
        $req = $this->executePrepare("delete from `secteurs_structures` where id_secteur =:id_secteur", ['id_secteur' => $idSecteur]);

        return $req;
    }
    public function deleteStructure(int $idStructure): PDOStatement{
        $req = $this->executePrepare("delete from `secteurs_structures` where id_structure =:id_structure", ['id_structure' => $idStructure]);
        return $req;
    }
}