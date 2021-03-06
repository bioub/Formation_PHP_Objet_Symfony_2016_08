<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Mon Blog</title>
</head>
<body>
<h2>Liste des articles</h2>
<table>
    <tr>
        <th>Titre</th>
        <th>Auteur</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($articles as $article) :?>
    <tr>
        <td><?=$article->getTitre()?></td>
        <td>
            <?php if ($article->getAuteur()) : ?>
            <?=$article->getAuteur()->getPseudo()?>
            <?php else : ?>
            Pas d'auteur
            <?php endif; ?>
        </td>
        <td>
            <a href="#">Afficher</a>
            <a href="#">Modifier</a>
            <a href="#">Supprimer</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
</body>
</html>