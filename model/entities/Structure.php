<?php

namespace mvc\model\entities;

require_once('Entity.php');

class Structure extends Entity
{

    private ?int $id;
    private ?int $nb_donateurs;
    private ?int $nb_actionnaires;
    private string $nom, $rue, $cp, $ville;
    private int $estasso;

    /**
     * Account constructor.
     * @param int|null $id
     * @param string $nom
     * @param string $rue
     * @param string $cp
     * @param string $ville
     * @param int $estasso
     * @param int $nb_donateurs
     * @param int $nb_actionnaires
     */
    public function __construct(?int $id, string $nom, string $rue, string $cp, string $ville, int $estasso, ?int $nb_donateurs, ?int $nb_actionnaires)
    {

        $this->id = $id;
        $this->nom = $nom;
        $this->rue = $rue;
        $this->cp = $cp;
        $this->ville = $ville;
        $this->estasso = $estasso;
        $this->nb_donateurs = $nb_donateurs;
        $this->nb_actionnaires = $nb_actionnaires;
    }

    /**
     * Get the value of id
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * Get the value of nb_donateurs
     */
    public function getNb_donateurs(): ?int
    {
        return $this->nb_donateurs;
    }

    /**
     * Set the value of nb_donateurs
     *
     * @return  self
     */
    public function setNb_donateurs(?int $nb_donateurs): void
    {
        $this->nb_donateurs = $nb_donateurs;
    }

    /**
     * Get the value of nb_actionnaires
     */
    public function getNb_actionnaires(): ?int
    {
        return $this->nb_actionnaires;
    }

    /**
     * Set the value of nb_actionnaires
     *
     * @return  self
     */
    public function setNb_actionnaires(?int $nb_actionnaires): void
    {
        $this->nb_actionnaires = $nb_actionnaires;
    }

    /**
     * Get the value of nom
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * Get the value of rue
     */
    public function getRue(): string
    {
        return $this->rue;
    }

    /**
     * Set the value of rue
     *
     * @return  self
     */
    public function setRue(string $rue): void
    {
        $this->rue = $rue;
    }

    /**
     * Get the value of cp
     */
    public function getCp(): string
    {
        return $this->cp;
    }

    /**
     * Set the value of cp
     *
     * @return  self
     */
    public function setCp(string $cp): void
    {
        $this->cp = $cp;
    }

    /**
     * Get the value of ville
     */
    public function getVille(): string
    {
        return $this->ville;
    }

    /**
     * Set the value of ville
     *
     * @return  self
     */
    public function setVille(string $ville): void
    {
        $this->ville = $ville;
    }

    /**
     * Get the value of estasso
     */
    public function getEstasso(): int
    {
        return $this->estasso;
    }

    /**
     * Set the value of estasso
     *
     * @return  int
     */
    public function setEstasso(int $estasso): void
    {
        $this->estasso = $estasso;
    }
}