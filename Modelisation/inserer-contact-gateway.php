<?php
// controlleur
use Prepavenir\Model\Gateway\ContactGateway;

require_once 'vendor/autoload.php';

$dsn = 'mysql:host=localhost;dbname=prepavenir_addressbook;charset=UTF8';
$username = 'root';
$passwd = '';

if (isset($_POST['prenom'], $_POST['nom'], $_POST['email'],$_POST['telephone'])) {
    $pdo = new PDO($dsn, $username, $passwd);
    $gateway = new ContactGateway($pdo);

    $result = $gateway->insert($_POST);

    if ($result) {
        $message = 'Le contact a bien inséré';
    }
    else {
        $message = 'Erreur pendant l\'insertion';
    }
}

// vue (html)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <h2>Insérer un contact</h2>

    <?php if (isset($message)) : ?>

    <div class="alert alert-info">
        <?= $message ?>
    </div>

    <?php endif; ?>

    <form method="post">
        <div class="form-group">
            <label>Prénom </label>
            <input type="text" name="prenom" class="form-control" placeholder="Prénom">
        </div>
        <div class="form-group">
            <label>Nom </label>
            <input type="text" name="nom" class="form-control" placeholder="Nom">
        </div>
        <div class="form-group">
            <label>Email </label>
            <input type="email" name="email" class="form-control" placeholder="Email">
        </div>
        <div class="form-group">
            <label>Téléphone </label>
            <input type="tel" name="telephone" class="form-control" placeholder="Téléphone">
        </div>
        <button type="submit" class="btn btn-default">Insérer</button>
    </form>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>