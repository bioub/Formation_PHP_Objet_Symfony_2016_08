<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Mon Blog</title>
</head>
<body>
    <h2>Ajouter un article</h2>

    <?php if (isset($message)) : ?>
    <p><?=$message?></p>
    <?php endif; ?>

    <form method="post">
        <p>
            Titre : <input type="text" name="titre">
        </p>
        <p>
            Contenu : <textarea name="contenu"></textarea>
        </p>
        <p>
            <button type="submit">Ajouter</button>
        </p>
    </form>
</body>
</html>