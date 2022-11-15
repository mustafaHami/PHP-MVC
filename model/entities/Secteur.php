<?php
namespace mvc\model\entities;

require_once('Entity.php');

class Secteur extends Entity
{

     private ?int $id;
     private String $libelle;
     
    /**
     * Autorisation constructor.
     * @param int $id
     * @param string $libelle
     */
    public function __construct(?int $id, string $libelle)
    {
        $this->id = $id;
        $this->libelle = $libelle;  
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
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }



     /**
      * Get the value of libelle
      */ 
     public function getLibelle() : String
     {
          return $this->libelle;
     }

     /**
      * Set the value of libelle
      *
      * @return  self
      */ 
     public function setLibelle(string $libelle) : void
     {
          $this->libelle = $libelle;

     }
}