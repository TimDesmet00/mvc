<?php
declare(strict_types = 1);

class HomepageController
{
    public function index()
    {
        // Usually, any required data is prepared here (Généralement, toutes les données requises sont préparées ici)
        // For the home, we don't need to load anything (Pour la maison, nous n'avons rien à charger)

        // Load the view (Charger la vue)
        require 'View/home.php';
    }
}