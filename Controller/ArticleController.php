<?php

declare(strict_types = 1);
// require 'Model/Article.php';

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

        // premier test , deplacer dans utils/connection.php
        // try {
        //     require '../utils/pdo.php';
        //     $pdo = new PDO($db, $user, $pass);
        //     echo 'Connexion réussie';
        //     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // } catch (PDOException $e) {
        //     echo 'Erreur de connexion : ' . $e->getMessage();
        // }
        require '../utils/connexion.php';
        $pdo = Pdo();
        // Note: you might want to use a re-usable databaseManager class - the choice is yours (Remarque: vous voudrez peut-être utiliser une classe databaseManager réutilisable - le choix vous appartient)
        // TODO: fetch all articles as $rawArticles (as a simple array) (Récupérez tous les articles en tant que $rawArticles (sous forme de tableau simple))
        $rawArticles = [$pdo->query('SELECT * FROM article')->fetchAll()];

        $articles = [];
        foreach ($rawArticles as $rawArticle) {
            // We are converting an article from a "dumb" array to a much more flexible class (Nous convertissons un article d'un tableau "dumb" à une classe beaucoup plus flexible)
            $articles[] = new Article($rawArticle['id'], $rawArticle['title'], $rawArticle['description'], $rawArticle['publish_date']);
        }

        return $articles;
    }

    public function show()
    {
        // Get the article ID from the request parameters (Obtenez l'ID de l'article à partir des paramètres de la requête)
        $articleId = $_GET['id'];

        // Load all required data (Charger toutes les données requises)
        $articles = $this->getArticles();

        // Find the specific article based on the ID
        $article = null;
        foreach ($articles as $articleItem) {
            if ($articleItem->getId() == $articleId) {
                $article = $articleItem;
                break;
            }
        }

        // Display the article details
        if ($article) {
            echo 'Title: ' . $article->getTitle() . '<br>';
            echo 'Description: ' . $article->getDescription() . '<br>';
            echo 'Publish Date: ' . $article->getPublishDate() . '<br>';
        } else {
            echo 'Article not found';
        }
    }
        
}
