<?php 
session_start();
require ('connexion/connexionauth.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon compte</title>
</head>
<body>
    <h1>
        bonjour <?= $username ?>
    </h1>
</body>
</html>