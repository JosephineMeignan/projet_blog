<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add category</title>
</head>
<body>

<a href="index.php?c=article&a=list">Retour à l'espace admin</a>


    <form action="index.php?c=category&a=add" method="post">
        <input type="text" name="categoryName" placeholder="Nom de la catégorie">
        <input type="submit" value="Ajouter">
    </form>

</body>
</html>