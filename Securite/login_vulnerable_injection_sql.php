<?php

if (isset($_POST['login'], $_POST['pass'])) {


    $dsn = 'mysql:host=localhost;dbname=romain;charset=UTF8';
    $pdo = new PDO($dsn, 'root', '');

    $sql = "SELECT login FROM user WHERE login = '$_POST[login]' AND pass = '$_POST[pass]'";

    $stmt = $pdo->query($sql);

    $user = $stmt->fetchColumn();

    if ($user) {
        $msg = "Bienvenue $user";
    }
    else {
        $msg = "Mauvais login/pass";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<h2>Login</h2>
<?php if (isset($msg)) : ?>
    <p><?=$msg?></p>
<?php endif; ?>
<form method="post">
    <p>
        Login :
        <input type="text" name="login" value="' OR TRUE LIMIT 1; --">
    </p>
    <p>
        Pass :
        <input type="password" name="pass">
    </p>
    <p>
        <button type="submit">Login</button>
    </p>
</form>
</body>
</html>