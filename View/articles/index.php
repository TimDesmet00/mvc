<?php require 'View/includes/header.php'?>

<?php  // Use any data loaded in the controller here
// require '../../controller/ArticleController.php'  ?>

<section>
    <h1>Articles</h1>
    <ul>
        <?php foreach ($articles as $article) : ?>
            <li><?= $article->title ?> (<?= $article->formatPublishDate() ?>)</li>
        <?php endforeach; ?>
    </ul>
</section>

<?php require 'View/includes/footer.php'?>