<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update article</title>
</head>
<body>
    <form action="index.php?c=article&a=update&articleId=<?php echo $article->getId() ?>" method="post">
        <input type="text" name="title" value="<?php echo $article->getTitle() ?>">
        <textarea name="content" id="" cols="30" rows="10">
            <?php echo $article->getContent() ?>
        </textarea>
        <input type="comment" name="content" value="<?php echo $article->getContent() ?>">
        <input type="text" name="author" value="<?php echo $article->getAuthor() ?>">
        <select name="categoryId">
        <?php
        foreach ($categories as $category) { 
       ?>
        <option value="<?php echo $category->getId() ?>" <?php echo ($category->getId()=== $article->getCategoryId())? 'selected':'' ?>>

            <?php echo $category->getName() ?>
        </option>
        
    <?php
    }
    ?>

        </select>
        <input type="submit" value="Modifier">
    </form>


    <a href="index.php?c=article&a=list">Retour aux articles</a>
</body>
</html>