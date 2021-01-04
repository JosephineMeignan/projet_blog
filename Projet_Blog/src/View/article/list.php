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
    <h1 class="text-center">Espace admin</h1>
</section>


<div class="contain">

<div class="blockOne">
<a href="index.php?c=article&a=add-article&g=list">Ajouter un article</a>
    <?php
    foreach ($articles as $article) { ?>
        <div class="article">
            <h2><?php echo $article->getTitle() ?></h2>
            <p>Par: <?php echo $article->getAuthor() ?></p>
            <p><time>Crée le: <?php echo $article->getDate() ?></time></p>
            <a href="index.php?c=article&a=voir&articleId=<?php echo $article->getId() ?>">Lire la suite</a>

            <form action="index.php?c=article&a=delete-article" method="post">
                <input type="hidden" name="articleId" value="<?php echo $article->getId() ?>">
                <input class="submit" type="submit" name="delete" value="Supprimer">
            </form>


            <a href="index.php?c=article&a=update&articleId=<?php echo $article->getId() ?>">Modifier</a>

        </div>
    <?php
    }
    ?>
</div>

<div class="blockTwo">
<a href="index.php?c=category&a=add">Ajouter une categorie</a>
    
    <?php
    foreach ($categories as $category) { ?>
        <div class="category">
            <p><?php echo $category->getName() ?></p>


            <form action="index.php?c=article&a=delete-category" method="post">
                <input type="hidden" name="categoryId" value="<?php echo $category->getId() ?>">
                <input class="submit" type="submit" name="delete" value="Supprimer">
            </form>


            <a href="index.php?c=category&a=update&categoryId=<?php echo $category->getId() ?>">Modifier</a>

        </div>
    <?php
    }
    ?>
</div>

</div>

</body>

</html>