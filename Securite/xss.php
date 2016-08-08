<?php

$dsn = 'mysql:host=localhost;dbname=romain;charset=UTF8';

$pdo = new PDO($dsn, 'root', '');

$sql = "SELECT login FROM user LIMIT 5";

$stmt = $pdo->query($sql);

$listeUsers = $stmt->fetchAll(PDO::FETCH_COLUMN);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<h2>Liste des derniers inscrits : </h2>
<ul>
    <?php foreach($listeUsers as $user) : ?>
    <li><?=htmlspecialchars($user)?></li>
    <?php endforeach; ?>
</ul>
</body>
</html>