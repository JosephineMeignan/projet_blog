<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $article->getTitle() ?></title>
</head>
<body>
<?php

include ('header.php');

?>



<section class="banner-section">
<a href="index.php?c=article&a=list-client" class="comeBack">Retour aux articles</a>

<div class="col-lg-12 col-md-12 col-sm-12 post-title-block">
               
               <h1 class="text-center"><?php echo $article->getTitle() ?></h1>
               <ul class="list-inline text-center">
                   <li><?php echo $article->getAuthor() ?> |</li>
                   <li><?php echo $category->getName() ?> |</li>
                   <li><?php echo $article->getDate() ?> |</li>
               </ul>
           </div>
</section>

<section class="post-content-section">
    <div class="container">

        <div class="row">

            <div class="col-lg-9 col-md-9 col-sm-12">
                <p><?php echo $article->getContent() ?></p>
            </div>
        
        </div>

        <h2>Commentaire :</h2>

    <?php foreach ($comments as $comment) { ?>
        <h3><?php echo $comment->getAuthor() ?></h3>
        <time><?php echo $comment->getDate() ?></time>
        <p><?php echo $comment->getComment() ?></p>
    <?php } ?>

    <h3>Laisse un commentaire :</h3>
        <form action="index.php?c=article&a=add-comment&articleId=<?php echo $article->getId() ?>" method="post">
            <label for="Author">Pseudo :</label>
            <input type="hidden" name="articleId" value="<?php echo $comment->getArticleId() ?>">

            <input type="text" name="author" value="<?php echo $comment->getAuthor() ?>"></br>

            <label for="comment">Commentaire :</label> </br>
            <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
            <button class="submit" type="submit">Envoyer</button>
        </form>
</section>

</body>
</html>