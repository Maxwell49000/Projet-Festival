<?php

require 'Controller.php';
require_once '../Models/AvisModel.php';
require_once '../Entities/Avis.php';
require_once '../Models/ProgrammationModel.php';
require_once '../Entities/Programmation.php';
require_once '../Models/CategorieModel.php';


class ProgrammationController extends Controller
{
    // Fonction pour afficher la requête d'affichage:
    public function displayProgrammationAction()
    {
        // Instanciation de la class ProgrammationModel pour appeler une de ses méthode juste après:
        $programmationModel = new ProgrammationModel();

        // Création d'un objet "$programmations" pour y stocker le resultat de la requete que l'on appel (findAll):
        $programmations = $programmationModel->findAll();

        $message = isset($_GET['message']) ? $_GET['message'] : "";

        // Envoi la vue dans le dossier programmation puis dans le fichier displayprogrammationAction:
        $this->render('programmation/displayProgrammationAction', ['programmations' => $programmations, 'message' => $message]);
    }
    public function show()
    {
        // Définition et test de la variable $id contenant le GET de ID:
        $id = isset($_GET['id']) ? $_GET['id'] : '';

        // Instanciation de la class Programmation et settage de l'ID:
        $programmation = new Programmation();
        $programmation->setId_programmation($id);

        // Instanciation de la class ProgrammationnModel et appel de la méthode "select" (contenant uniquement la requete select):
        $programmationModel = new ProgrammationModel();
        $programmation = $programmationModel->select($programmation);

        // Instanciation de la class AvisModel et settage de l'Id:
        $avis = new Avis();
        $avis->setId_avis($id);

        // Instanciation de la class AvisModel et appel de la méthode "select" (contenant uniquement la requete select):
        $avisModel = new AvisModel();
        $avis = $avisModel->select($avis);


        // Envoi la vue dans le dossier programmation puis dans le fichier show:
        $this->render('programmation/show', ['programmation' => $programmation, 'avis' => $avis]);
    }
    public function eventshow()
    {
        // Définition et test de la variable $id contenant le GET de ID:
        $id = isset($_GET['id']) ? $_GET['id'] : '';

        // Instanciation de la class Programmation et settage de l'ID:
        $programmation = new Programmation();
        $programmation->setId_programmation($id);

        // Instanciation de la class ProgrammationnModel et appel de la méthode "eventSelect" (contenant uniquement la requete select):
        $programmationModel = new ProgrammationModel();
        $programmation = $programmationModel->eventSelect($programmation);

        // Envoi la vue dans le dossier programmation puis dans le fichier eventShow:
        $this->render('programmation/eventShow', ['programmation' => $programmation]);
    }

    // Fonction pour la barre de recherche évènement:
    public function find()
    {
        // Vérifie que l'utilisateur a bien envoyé une requête
        // "trim" nettoie les espaces blancs en début et en fin de la chaîne de la requête,
        //  assurant que seules les données pertinentes sont envoyées pour traitement:
        if (!isset($_POST['query']) || empty(trim($_POST['query']))) {
            return;
        }

        $query = htmlspecialchars($_POST['query']); // Nettoie l'entrée utilisateur

        // Appel du modèle pour chercher les résultats
        $programmationModel = new ProgrammationModel();
        $results = $programmationModel->search($query);

        // Envoie les résultats à la vue
        $this->render('programmation/search', ['results' => $results]);
    }
}
