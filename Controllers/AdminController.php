<?php

ob_start();

require_once 'Controller.php';
require_once '../Models/AvisModel.php';
require_once '../Entities/Avis.php';
require_once '../Models/ProgrammationModel.php';
require_once '../Entities/Programmation.php';
require_once '../Entities/Categorie.php';
require_once '../Models/CategorieModel.php';
require_once '../Models/ReservationModel.php';


class AdminController extends Controller
{

    // Fonction pour afficher la requête d'affichage des évènement pour l'ADMIN:
    public function homeAdmin()
    {
        // Instanciation de la class ProgrammationModel pour appeler une de ses méthode juste après:
        $programmationModel = new ProgrammationModel();

        // Création d'un objet "$programmations" pour y stocker le resultat de la requête que l'on appel (findAll):
        $programmations = $programmationModel->findAll();


        $message = isset($_GET['message']) ? $_GET['message'] : "";

        // Envoi la vue dans le dossier Admin puis dans le fichier homeAdmin (page d'accueil ADMIN):
        $this->render('admin/homeAdmin', ['programmations' => $programmations, 'message' => $message]);
    }

    // Fonction pour supprimer un évènement:
    public function deleteProgrammation()
    {

        // Définition et test de la variable $id contenant le GET de ID:
        $id = isset($_GET['id']) ? $_GET['id'] : '';

        // Instanciation de la class Programmation et settage de l'ID:
        $programmation = new Programmation();
        $programmation->setId_programmation($id);

        // Instanciation de la class programmationModel et appel de la méthode "delete" (contenant uniquement la requete DELETE):
        $deletemodel = new ProgrammationModel();
        $success = $deletemodel->delete($programmation);
        // var_dump($success);
        // die;
        $message = $success ? "Programmation bien suprimée." : "Suppression non effectuée.";

        // Redirection:
        header('location:index.php?controller=Admin&action=homeAdmin&message=' . urlencode($message));
    }

    // Fonction pour créer un évènement:
    public function createProgrammationAction()
    {
        // Instanciation de la class CategorieModelModel et appel de la méthode "findAll" (pour récuperer les catégories liées aux évènements):
        $categories = new CategorieModel();
        $categories = $categories->findAll();

        // Envoi la vue dans le dossier Admin puis dans le fichier createProgrammationAction:
        $this->render('admin/createProgrammationAction', ['categories' => $categories]);
    }

    public function add()
    {
        // Récuperation des valeurs POST du formulaire d'ajout des évènements et stockage dans des variables:
        $nom = $_POST["nom"];
        $description = $_POST["description"];
        $date_evenement = $_POST["date_evenement"];
        $quantite = $_POST["quantite"];
        $id_categorie = $_POST["categorie"];
        $prix = $_POST["prix"];

        // Vérification si un fichier a été uploadé et qu'il n'y a pas d'erreur:
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
            // Répertoire où sera stockée l'image:
            $uploadDir = 'img/';
            // Types de fichiers autorisés:
            $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
            // Taille maximale autorisée (2 Mo):
            $maxSize = 2 * 1024 * 1024;
            // Récupération des informations du fichier uploadé:
            // Chemin temporaire du fichier:
            $fileTmpPath = $_FILES['photo']['tmp_name'];
            // Taille du fichier:
            $fileSize = $_FILES['photo']['size'];
            // Type MIME du fichier:
            $fileType = mime_content_type($fileTmpPath);
            // Extension du fichier:
            $extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
            // Génération d'un nom unique pour éviter les conflits de fichiers:
            $newFileName = uniqid() . '.' . $extension;
            // Chemin complet du fichier final:
            $uploadFile = $uploadDir . $newFileName;

            // Vérification du type de fichier:
            if (!in_array($fileType, $allowedTypes)) {
                die("Format de fichier non autorisé.");
            }
            // Vérification de la taille du fichier:
            if ($fileSize > $maxSize) {
                die("Fichier trop volumineux (max 2 Mo).");
            }
            // Déplacement du fichier du dossier temporaire vers le dossier de destination:
            if (move_uploaded_file($fileTmpPath, $uploadFile)) {
                // Stocke le chemin du fichier pour l'enregistrement en base de données:
                $photo = $uploadFile;
            } else {
                die("Échec de l'upload du fichier.");
            }
        }


        // // Gestion de l'upload:
        // $photo = '';
        // if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        //     $uploadDir = 'img/'; //Assurez vous que ce dossier existe et est accessible en écriture
        //     $uploadFile = $uploadDir . basename($_FILES['photo']['name']);

        //     // Déplacer le fichier uploadé:
        //     if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFile)) {
        //         $photo = $uploadFile; //stocker le chemin relatif dans la BDD
        //     }


        // Test des informations récupérés via le POST:
        if (
            isset($nom) && isset($description) && isset($date_evenement) && isset($quantite) && isset($id_categorie) && isset($prix)
            && !empty($nom) && !empty($description) && !empty($date_evenement) && !empty($quantite) && !empty($id_categorie) && !empty($prix)
        ) {
            // Instanciation de la class Programmation et SET de ses attributs:
            $programmation = new Programmation();
            $programmation->setNom($nom);
            $programmation->setDescription($description);
            $programmation->setDate_evenement($date_evenement);
            $programmation->setQuantite($quantite);
            $programmation->setId_categorie($id_categorie);
            $programmation->setPhoto($photo);
            $programmation->setPrix($prix);

            // var_dump($programmation);
            // die;


            // Instanciation de la class ProgrammationModel et appel de la méthode "create" (contenant uniquement la requete INSERT):
            $programmationModel = new ProgrammationModel();
            $success = $programmationModel->create($programmation);
            $message = $success ? "Évènement bien ajouté." : "Création non effectuée.";
            // Appel de findAll pour récupérer l'ensemble des événements après l'ajout, cela garantit que la vue affichera la liste à jour de tous les événements.
            $programmations = $programmationModel->findAll();
            $this->render('admin/homeAdmin', ['message' => $message, 'programmations' => $programmations]);
        }
    }
    // Fonction pour mettre à jour un évènement 1/2 (récupération via la BDD):
    public function updateProgrammation()
    {
        // Définition et test de la variable $id contenant le GET de ID:
        $id = isset($_GET['id']) ? $_GET['id'] : '';

        // Instanciation de la class programmation et settage de l'ID:
        $programmation = new Programmation();
        $programmation->setId_programmation($id);

        // Instanciation de la class CategorieModel et appel de la méthode"findAll" (pour récuperer les catégories liées aux évènements):
        $categorieModel = new CategorieModel();
        $categories = $categorieModel->findAll();
        // var_dump($categories);
        // die();

        // Instanciation de la class ProgrammationModel et appel de la méthode "select" (contenant uniquement la requete select):
        $programmationModel = new ProgrammationModel();
        $programmation = $programmationModel->select($programmation);
        // var_dump($programmation, $categories);

        // Envoi la vue dans le dossier Admin puis dans le fichier updateProgrammationAction:
        $this->render('admin/updateProgrammation', ['programmation' => $programmation, 'categories' => $categories]);
    }


    // Fonction pour mettre à jour un évènement 2/2 (envoi à la BDD):
    public function update()
    {
        // var_dump($_POST['categorie']);
        // die();

        // Récupération des champs du formulaire via $_POST et contrôle de ses derniers avec isset:
        $id_programmation = isset($_POST['id_programmation']) ? $_POST['id_programmation'] : '';
        $id_categorie = isset($_POST['categorie']) ? $_POST['categorie'] : '';
        $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
        $description = isset($_POST['description']) ? $_POST['description'] : '';
        $date_evenement = isset($_POST['date_evenement']) ? $_POST['date_evenement'] : '';
        $quantite = isset($_POST['quantite']) ? $_POST['quantite'] : '';
        $prix = isset($_POST['prix']) ? $_POST['prix'] : '';
        $photo = isset($_POST['photo']) ? $_POST['photo'] : '';

        // Instanciation de la class Programmation pour pouvoir acceder au settage:
        $programmation = new Programmation();
        $programmation->setNom($nom);
        $programmation->setDescription($description);
        $programmation->setDate_evenement($date_evenement);
        $programmation->setQuantite($quantite);
        $programmation->setId_programmation($id_programmation);
        $programmation->setId_Categorie($id_categorie);
        $programmation->setPhoto($photo);
        $programmation->setPrix($prix);

        // Instanciation de la class ProgrammationModel pour pouvoir acceder à sa méthode updtateProgrammation(elle get les précedent setters 
        //  et envoi en BDD via la requête):
        $programmationModel = new ProgrammationModel();
        $success = $programmationModel->updateProgrammation($programmation);

        $message = $success ? "Programmation bien modifiée." : "Modification non effectuée.";

        // Redirection:
        header('Location: index.php?controller=Admin&action=homeAdmin&message=' . urlencode($message));
    }

    public function displayReservationAction()
    {
        // Instanciation de la class ProgrammationModel pour appeler une de ses méthode juste après:
        $reservationModel = new ReservationModel();

        // Création d'un objet "$programmations" pour y stocker le resultat de la requete que l'on appel (findAll):
        $reservations = $reservationModel->findAll();

        $message = isset($_GET['message']) ? $_GET['message'] : "";

        // Envoi la vue dans le dossier programmation puis dans le fichier displayprogrammationAction:
        $this->render('admin/displayReservationAction', ['reservations' => $reservations, 'message' => $message]);
    }


    public function deleteReservationAction()
    {
        try {
            if (!isset($_GET['id_reservation']) || empty($_GET['id_reservation'])) {
                throw new Exception("ID de réservation invalide.");
            }

            $id_reservation = intval($_GET['id_reservation']);

            $reservationModel = new ReservationModel();
            $reservationModel->deleteReservation($id_reservation);

            header('Location: index.php?controller=Admin&action=displayReservationAction');
            exit;
        } catch (Exception $e) {
            header('Location: index.php?controller=Admin&action=displayReservationAction&message=' . urlencode("Erreur : " . $e->getMessage()));
            exit;
        }
    }
}
