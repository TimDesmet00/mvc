<?php

declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

//incluez tous vos fichiers de modèle ici
require 'Model/Article.php';
//include all your controllers here
require 'Controller/HomepageController.php';
require 'Controller/ArticleController.php';

// Obtenir la page actuelle à charger
// If nothing is specified, it will remain empty (home should be loaded) (Si rien n'est spécifié, il restera vide (la page d'accueil doit être chargée))
$page = $_GET['page'] ?? null;

// Load the controller (Charger le contrôleur)
// It will *control* the rest of the work to load the page (Il *contrôlera* le reste du travail pour charger la page)
switch ($page) {
    
    case 'articles-index':
        // This is shorthand for: (Ceci est un raccourci pour:)
        // $articleController = new ArticleController; (nouveau ArticleController;)
        // $articleController->index(); 
        (new ArticleController())->index();
        break;
    case 'articles-show':
        // TODO: detail page 
    case 'home':
    default:
        (new HomepageController())->index();
        break;
}