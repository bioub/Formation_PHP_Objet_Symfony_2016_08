<?php

if (isset($_POST['login'], $_POST['pass'])) {

    $salt = 'rcBATr$B4C8(AHD64rq64zw25u_s19g#g-zpuQt)';


    $dsn = 'mysql:host=localhost;dbname=romain;charset=UTF8';
    $pdo = new PDO($dsn, 'root', '');

//    $login = $pdo->quote($_POST['login']);

    $sql = "SELECT login FROM user WHERE login = :login AND pass = :pass";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue('login', $_POST['login']);
    $stmt->bindValue('pass', password_hash($_POST['pass'], PASSWORD_BCRYPT, ['salt' => $_POST['login'] . $salt]));

    $stmt->execute();

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