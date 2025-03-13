<?php
// Class Programmation:

class Programmation
{

    private $id_programmation;
    private $nom;
    private $description;
    private $date_evenement;
    private $quantite;
    private $id_categorie;
    private $photo;
    private $prix;

    /**
     * Get the value of id_programmation
     */
    public function getId_programmation()
    {
        return $this->id_programmation;
    }

    /**
     * Set the value of id_programmation
     *
     * @return  self
     */
    public function setId_programmation($id_programmation)
    {
        $this->id_programmation = $id_programmation;

        return $this;
    }

    /**
     * Get the value of nom
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of date_evenement
     */
    public function getDate_evenement()
    {
        return $this->date_evenement;
    }

    /**
     * Set the value of date_evenement
     *
     * @return  self
     */
    public function setDate_evenement($date_evenement)
    {
        $this->date_evenement = $date_evenement;

        return $this;
    }

    /**
     * Get the value of quantite
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set the value of quantite
     *
     * @return  self
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get the value of id_categorie
     */
    public function getId_categorie()
    {
        return $this->id_categorie;
    }

    /**
     * Set the value of id_categorie
     *
     * @return  self
     */
    public function setId_categorie($id_categorie)
    {
        $this->id_categorie = $id_categorie;

        return $this;
    }

    /**
     * Get the value of photo
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set the value of photo
     *
     * @return  self
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get the value of prix
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set the value of prix
     *
     * @return  self
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }
}
