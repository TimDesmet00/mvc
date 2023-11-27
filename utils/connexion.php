<?php

class Pdo() {
    require './pdo.php';
    try {
        $pdo = new PDO($db, $user, $pass);
        echo 'Connexion réussie';
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Erreur de connexion : ' . $e->getMessage();
    }
} 

class orm() extends Pdo() {
    public function get($table)
    {
        $sql = 'SELECT * FROM $table';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function get_id($table, $id)
    {
        $sql = 'SELECT * FROM $table WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch();
        return $result;
    }

    public function create($table, $id_article, $title, $description, $publish_date, $id_author)
    {
        $sql = 'INSERT INTO $table (id_article, title, description, publish_date, id_author) VALUES (:id_article, :title, :description, :publish_date, :id_author)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id_article' => $id_article, 'title' => $title, 'description' => $description, 'publish_date' => $publish_date, 'id_author' => $id_author]);
    }

    public function update($table, $id, $title, $description, $publish_date, $id_author)
    {
        $sql = 'UPDATE article SET title = :title, description = :description, publish_date = :publish_date, id_author = :id_author WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id, 'title' => $title, 'description' => $description, 'publish_date' => $publish_date, 'id_author' => $id_author]);
    }

    public function deleteArticle($table, $id)
    {
        $sql = 'DELETE FROM $table WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
    }
}