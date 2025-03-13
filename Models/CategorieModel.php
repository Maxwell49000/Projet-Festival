<?php

require_once '../Core/DbConnect.php';


class CategorieModel extends DbConnect
{

    // Fonction contenant la requête pour afficher toutes les catégories:
    public function findAll()
    {
        // Requête pour selectionner tous les champs de la table categorie:
        $this->request = "SELECT * FROM categorie";
        $result = $this->connection->query($this->request);
        $categorie = $result->fetchAll();
        // var_dump($categorie);
        // die;
        return $categorie;
    }
}
