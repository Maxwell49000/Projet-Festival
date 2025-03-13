<?php

require_once 'Controller.php';
require_once '../Models/ProgrammationModel.php';
require_once '../Entities/Programmation.php';
require_once '../Models/CategorieModel.php';



class HomeController extends Controller
{
    // Affiche la vue de l'accueil:
    public function homeAction()
    {
        $this->render('home/homeAction');
    }


    public function panierView()
    {
        // Affiche la vue du panier:
        $this->render('panier/panier');
    }
}
