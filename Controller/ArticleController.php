<?php

declare(strict_types = 1);

class ArticleController
{
    public function index()
    {
        // Load all required data (Charger toutes les données requises)
        $articles = $this->getArticles();

        // Load the view (Charger la vue)
        require 'View/articles/index.php';
    }

    // Note: this function can also be used in a repository - the choice is yours (Remarque: cette fonction peut également être utilisée dans un référentiel - le choix vous appartient)
    private function getArticles()
    {
        // TODO: prepare the database connection (Préparez la connexion à la base de données)
        // Note: you might want to use a re-usable databaseManager class - the choice is yours (Remarque: vous voudrez peut-être utiliser une classe databaseManager réutilisable - le choix vous appartient)
        // TODO: fetch all articles as $rawArticles (as a simple array) (Récupérez tous les articles en tant que $rawArticles (sous forme de tableau simple))
        $rawArticles = [];

        $articles = [];
        foreach ($rawArticles as $rawArticle) {
            // We are converting an article from a "dumb" array to a much more flexible class (Nous convertissons un article d'un tableau "dumb" à une classe beaucoup plus flexible)
            $articles[] = new Article($rawArticle['title'], $rawArticle['description'], $rawArticle['publish_date']);
        }

        return $articles;
    }

    public function show()
    {
        // TODO: this can be used for a detail page (Cela peut être utilisé pour une page de détail)
    }
}