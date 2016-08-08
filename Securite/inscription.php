<?php

if (isset($_POST['login'], $_POST['pass'])) {

    $salt = 'rcBATr$B4C8(AHD64rq64zw25u_s19g#g-zpuQt)';

    $dsn = 'mysql:host=localhost;charset=UTF8';
    $pdo = new PDO($dsn, 'root', '');

    $sql = "SHOW DATABASES";
    $stmt = $pdo->query($sql);

    $listeBases = $stmt->fetchAll(PDO::FETCH_COLUMN);

    if (!in_array('romain', $listeBases)) {
        $sql = "CREATE DATABASE romain";
        $pdo->exec($sql);
    }

    $sql = "USE romain";
    $pdo->query($sql);

    $sql = "SHOW TABLES";
    $stmt = $pdo->query($sql);

    $listeTables = $stmt->fetchAll(PDO::FETCH_COLUMN);

    if (!in_array('user', $listeTables)) {
        $sql = "CREATE TABLE user (login VARCHAR(40), pass CHAR(32))";
        $pdo->exec($sql);
    }

    $sql = "INSERT INTO user (login, pass) VALUES (:login, :pass)";

    $stmt = $pdo->prepare($sql);

    $stmt->bindValue('login', $_POST['login']);
    $stmt->bindValue('pass', password_hash($_POST['pass'], PASSWORD_BCRYPT, ['salt' => $_POST['login'] . $salt]));

    if ($stmt->execute()) {
        $msg = "Vous êtes bien inscrit";
    }
    else {
        $msg = "Une erreur s'est produite pendant l'inscription";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Inscription</title>
    </head>
    <body>
    <h2>Inscription</h2>
    <?php if (isset($msg)) : ?>
    <p><?=$msg?></p>
    <?php endif; ?>
    <form method="post">
        <p>
            Login :
            <input type="text" name="login">
        </p>
        <p>
            Pass :
            <input type="password" name="pass">
        </p>
        <p>
            <button type="submit">Inscription</button>
        </p>
    </form>
    </body>
</html>