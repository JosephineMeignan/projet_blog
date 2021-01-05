<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
</head>

<body>
<?php

include ('header.php');

?>
<section class="banner-section">
    <h1 class="text-center">Bienvenue sur mon blog</h1>
</section>


<div class="articleClient">
    <?php
    foreach ($articles as $article) { ?>
        <div class="article">
            <h2><?php echo $article->getTitle() ?></h2>
            <p>Par: <?php echo $article->getAuthor() ?></p>
            <p><time>Crée le: <?php echo $article->getDate() ?></time></p>
            <a href="index.php?c=article&a=voir-client&articleId=<?php echo $article->getId() ?>">Lire la suite</a>
        </div>
    <?php
    }
    ?>
</div>


</body>

</html>