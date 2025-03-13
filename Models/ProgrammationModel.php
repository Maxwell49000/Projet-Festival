<?php

require_once '../Core/DbConnect.php';


class ProgrammationModel extends DbConnect
{
    // Fonction contenant la requête pour afficher toutes les créations:
    public function findAll()
    {
        // Requête pour selectionner tous les champs de la table creation:
        $this->request = "SELECT * FROM programmation JOIN categorie ON programmation.id_categorie = categorie.id_categorie";
        $result = $this->connection->query($this->request);
        $programmation = $result->fetchAll();

        return $programmation;
    }

    public function select($programmation)
    {
        // Création d'une variable $id  pour getter l'id (la faire transiter):
        $id = $programmation->getId_programmation();

        // Requête selectionnant tous les champs de la table creation ou l'id = l'id:
        $this->request = "SELECT * FROM programmation JOIN categorie ON programmation.id_categorie = categorie.id_categorie WHERE id_programmation =  $id";
        $result = $this->connection->query($this->request);
        $selection = $result->fetch();

        return $selection;
    }

    public function eventSelect($programmation)
    {
        // Création d'une variable $id  pour getter l'id (la faire transiter):
        $id = $programmation->getId_programmation();

        // Requête selectionnant tous les champs de la table creation ou l'id = l'id:
        $this->request = "SELECT * FROM programmation 
                          JOIN categorie ON programmation.id_categorie = categorie.id_categorie 
                          WHERE programmation.id_categorie = $id";
        $result = $this->connection->query($this->request);
        $selection = $result->fetchALL();

        return $selection;
    }

    public function delete($programmation)
    {
        // Création d'une variable $id  pour getter l'id (la faire transiter):
        $id = $programmation->getId_programmation();

        // Requête supprimant tous les champs de la table creation ou l'id = l'id:
        $this->request = "DELETE FROM programmation WHERE id_programmation =  $id";

        return $this->connection->exec($this->request);
    }

    public function create($programmation)
    {
        // var_dump($categories);
        // Création de variables pour getter les informations de la table (les faire transiter):
        $nom = $programmation->getNom();
        $description = $programmation->getDescription();
        $date_evenement = $programmation->getDate_evenement();
        $quantite = $programmation->getQuantite();
        $id_categorie = $programmation->getId_categorie();
        $prix = $programmation->getPrix();
        $photo = $programmation->getPhoto();
        // var_dump($prix);
        // die;

        // Requête pour inserer dans la BDD les valeurs précedement getté:
        $this->request = 'INSERT INTO programmation VALUES (NULL,
         "' . $photo . '",
         "' . $nom . '",
          "' . $description . '",
           "' . $date_evenement . '",
            ' . $quantite . ',
             ' . $prix . ',
              ' . $id_categorie . ')';
        $success = $this->connection->exec($this->request);
        // var_dump($this->request);
        // die;

        $id_categorie = $this->connection->lastInsertId();


        return $success;
    }

    // Fonction permetant d'envoyer les informations mis à jour à la BDD:
    public function updateProgrammation($programmation)
    {
        // Création de variables pour y stocker les differents getters:
        $id_programmation = $programmation->getId_programmation();
        $nom = addslashes($programmation->getNom());
        $description = addslashes($programmation->getDescription());
        $date_evenement = $programmation->getDate_evenement();
        $quantite = $programmation->getQuantite();
        $id_categorie = $programmation->getId_categorie();
        $prix = $programmation->getPrix();
        $photo = $programmation->getPhoto();
        // var_dump($prix);
        // var_dump($photo);
        // var_dump($description);
        // die;

        // Requête pour mettre à jour en BDD avec les variables précedement déclarées:
        $this->request = "UPDATE programmation SET photo = '$photo', nom = '$nom', description ='$description', 
            date_evenement ='$date_evenement', quantite = $quantite , prix = $prix , id_categorie= $id_categorie WHERE id_programmation = $id_programmation";

        return $this->connection->exec($this->request);
    }
    public function search()
    {
        $query = $_POST['query'];
        // var_dump($query);
        // die;

        $this->request = 'SELECT * FROM programmation WHERE nom LIKE "%' . $query . '%"  OR description LIKE "%' . $query . '%"';
        $resultat = $this->connection->query($this->request);
        $results = $resultat->fetchAll();

        return $results;
    }



    public function getProgrammationById($id)
    {
        $stmt = $this->connection->prepare("SELECT nom, description, prix FROM programmation WHERE id_programmation = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Retourner un objet contenant les colonnes
        return $stmt->fetch();
    }


    // Vérifie si le nombre de places demandées est disponible
    public function checkAvailability($id_programmation, $quantite)
    {
        $query = "SELECT quantite FROM programmation WHERE id_programmation = $id_programmation";
        $result = $this->connection->query($query)->fetch();

        return $result && $result->quantite >= $quantite;
    }

    public function updatePlaces($id_programmation, $quantite)
    {
        $query = "UPDATE programmation SET quantite = quantite - $quantite WHERE id_programmation = $id_programmation";
        $this->connection->exec($query);
    }
}
