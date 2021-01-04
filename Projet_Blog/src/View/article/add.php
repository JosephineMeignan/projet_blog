<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add article</title>
</head>
<body>
<?php

include ('header.php');

?>
<a href="index.php?c=article&a=list">Retour à l'espace admin</a>

<h3 class="addArticle">Ajouter un article</h3>

    <form id="formAddArtcile" action="index.php?c=article&a=add-article" method="post">
        <input class="champAddArticle" type="text" name="title" placeholder="Titre">
        <textarea class="champAddArticle" name="content" id="editor" cols="30" rows="10"></textarea> 

        <input class="champAddArticle" type="text" name="author" placeholder="Auteur">
        <select class="champAddArticle" name="categoryId">
            
        <?php
        foreach ($categories as $category) { 
        ?>

        <option value="<?php echo $category->getId() ?>">
            <?php echo $category->getName() ?>
        </option>
        
        <?php
        }
        ?>
        
        </select>
        <input type="submit" value="Ajouter">
    </form>

    <script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>
    <script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>


</body>
</html>