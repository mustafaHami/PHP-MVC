<?php

namespace mvc\controller;

require_once(__DIR__ . '/../model/managers/PDOManager.php');
require_once(__DIR__ . '/../model/managers/PDOManagerSectStruct.php');

use mvc\model\entities\Entity;
use mvc\model\manager\PDOManager;
use mvc\model\manager\PDOManagerSectStruct;
use \PDOStatement;
use \PDO;

abstract class AController
{
    //protected PDOManager $manager;
    protected PDOManager $managerStructure;
    protected PDOManager $managerSecteur;
    protected PDOManagerSectStruct $managerSecteurStructure;
    /**
     * @return PDOManager
     */
    public function getManager(): PDOManager
    {
        return $this->manager;
    }

    /**
     * @param PDOManager $manager
     */
    public function setManager(PDOManager $manager): void
    {
        $this->manager = $manager;
    }
    /**
     * @return PDOManagerSectStruct
     */
    public function getManagerSecteurStructure(): PDOManagerSectStruct
    {
        return $this->managerSecteurStructure;
    }

    /**
     * @param PDOManagerPDOManagerSectStruct $manager
     */
    public function setManagerSecteurStructure(PDOManagerSectStruct $managerSecteurStructure): void
    {
        $this->managerSecteurStructure = $managerSecteurStructure;
    }
    /**
     * @param int $id
     * @return Entity
     */
    public function findById(int $id): ?Entity
    {
        return ($this->getManager()->findById($id));
    }
    /**
     * @param int $id
     * @return array
     */
    public function findByIdStructure(int $idStructure): array
    {
        return ($this->getManagerSecteurStructure()->findByIdStructure(PDO::FETCH_ASSOC,$idStructure));
    }
        /**
     * @param int $id
     * @return array
     */
    public function findByIdSecteur(int $idSecteur): array
    {
        return ($this->getManagerSecteurStructure()->findByIdStructure(PDO::FETCH_ASSOC,$idSecteur));
    }
    /**
     * @return PDOStatement
     */
    public function find(): PDOStatement
    {
        return ($this->getManager()->find());
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        return ($this->getManager()->findAll(PDO::FETCH_ASSOC));
    }
    /**
     * @return array
     */
    public function findAllSecteurStructure(): array
    {
        return ($this->getManagerSecteurStructure()->findAll(PDO::FETCH_ASSOC));
    }
    /**
     * @param Entity $o
     */
    public function insert(Entity $e): void
    {
        $this->getManager()->insert($e);
    }
    
    public function findByName(String $variable): void
    {
        $this->getManager()->findByName($variable);
    }
    
    public function delete(int $id): void
    {
        $this->getManager()->delete($id);
    }
    
    public function deleteStructure(int $idStructure): void
    {
        $this->deleteStructure->deleteStructure($idStructure);
    }
    
    public function deleteSecteur(int $idSecteur): void
    {
        $this->getManagerSecteurStructure()->deleteSecteur($idSecteur);
    }
    
    public function update(Entity $e): void
    {
        $this->getManager()->update($e);
    }
}