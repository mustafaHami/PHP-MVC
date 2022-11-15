<?php

namespace mvc\model\manager;

require_once(__DIR__ . '/../entities/Structure.php');
require_once(__DIR__ . '/../entities/Entity.php');
require_once('PDOManager.php');

use mvc\model\entities\Structure;
use mvc\model\entities\Entity;
use \PDOStatement;

class StructureManager extends PDOManager
{
    public function findById(int $id): ?Entity
    {
        $stmt = $this->executePrepare("select * from structure where id=:id", ['id' => $id]);
        $structure = $stmt->fetch();
        if (!$structure) return null;
        return  new Structure(
            $structure['ID'],
            $structure['NOM'],
            $structure['RUE'],
            $structure['CP'],
            $structure['VILLE'],
            $structure['ESTASSO'],
            $structure['NB_DONATEURS'],
            $structure['NB_ACTIONNAIRES']
        );
    }

    public function find(): PDOStatement
    {
        $stmt = $this->executePrepare("select * from structure", []);
        return $stmt;
    }

    public function findAll(int $pdoFecthMode): array
    {
        $stmt = $this->find();
        $structures = $stmt->fetchAll($pdoFecthMode);

        $structuresEntities = [];
        foreach ($structures as $structure) {
            $structuresEntities[] = new Structure(
                $structure['ID'],
                $structure['NOM'],
                $structure['RUE'],
                $structure['CP'],
                $structure['VILLE'],
                $structure['ESTASSO'],
                $structure['NB_DONATEURS'],
                $structure['NB_ACTIONNAIRES']
            );
        }
        return $structuresEntities;
    }

    public function insert(Entity $e): PDOStatement
    {
        $req = "insert into `structure` (`ID`, `NOM`, `RUE`, `CP`, `VILLE`, `ESTASSO`, `NB_DONATEURS`, `NB_ACTIONNAIRES`)  values (:id, :nom, :rue, 
                    :cp, :ville, :estasso, :nb_donateurs,:nb_actionnaires)";

        $params = array('id' => $e->getId(), 'nom' => $e->getNom(), 'rue' => $e->getRue(), 'cp' => $e->getCp(), 'ville' => $e->getVille(), 'estasso' => $e->getEstasso(), 'nb_donateurs' => $e->getNb_donateurs(), 'nb_actionnaires' => $e->getNb_actionnaires());

        $res = $this->executePrepare($req, $params);
        return $res;
    }

    public function update(Entity $e): PDOStatement
    {
        $req = "update `structure` set nom = :nom, rue =:rue, cp =:cp, ville = :ville, estasso = :estasso, nb_donateurs = :nb_donateurs, nb_actionnaires = :nb_actionnaires where id = :id";
        $params = array('id' => $e->getId(), 'nom' => $e->getNom(), 'rue' => $e->getRue(), 'cp' => $e->getCp(), 'ville' => $e->getVille(), 'estasso' => $e->getEstasso(), 'nb_donateurs' => $e->getNb_donateurs(), 'nb_actionnaires' => $e->getNb_actionnaires());
        $res = $this->executePrepare($req, $params);

        return $res;
    }
    public function delete(int $id): PDOStatement
    {
        $req = $this->executePrepare("delete from `structure` where id =:id", ['id' => $id]);

        return $req;
    }
    public function findByName(String $variable): ?int
    {
        $stmt = $this->executePrepare("select * from structure where nom=:nom", ['nom' => $variable]);
        $structure = $stmt->fetch();
        return $structure['ID'];
    }
}