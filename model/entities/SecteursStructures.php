<?php

namespace mvc\model\entities;

require_once('Entity.php');

class SecteursStructures extends Entity 
{
    private ?int $id; 
    private int $idStructure;
    private int $idSecteur;
   /**
     * Account constructor.
     * @param int $idStructure
     * @param int $idSecteur
     */
    function __construct(?int $id,int $idStructure,int $idSecteur)
    {
        $this->id = $id;
        $this->idSecteur = $idSecteur;
        $this->idStructure = $idStructure;
    }
    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return self
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }
    
    /**
     * Get the value of idStructure
     */ 
    public function getIdStructure() :int
    {
        return $this->idStructure;
    }

    /**
     * Set the value of idStructure
     *
     * @return  self
     */ 
    public function setIdStructure(int $idStructure): void
    {
        $this->idStructure = $idStructure;

    }

    /**
     * Get the value of idSecteur
     */ 
    public function getIdSecteur() : int 
    {
        return $this->idSecteur;
    }

    /**
     * Set the value of idSecteur
     *
     * @return  self
     */ 
    public function setIdSecteur(int $idSecteur) :void
    {
        $this->idSecteur = $idSecteur;
    }
}

?>