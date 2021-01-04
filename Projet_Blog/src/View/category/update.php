<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update category</title>
</head>
<body>

<a href="index.php?c=article&a=list">Retour à l'espace admin</a>

    <form action="index.php?c=category&a=update&categoryId=<?php echo $category->getId() ?>" method="post">
        <input type="text" name="categoryName" value="<?php echo $category->getName() ?>">
        <input type="submit" value="Modifier">
    </form>


</body>
</html>