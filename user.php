<?php
session_start();

if (empty($_SESSION["user"]) || !isset($_SESSION["user"])) {
    header('Location: connexion/connexion.php');
}

$height = $_SESSION['user']['height'] * 0.01;
$weight = $_SESSION['user']['weight'];
$imc = $weight / ($height * $height);
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
        bonjour <?= $_SESSION['user']['username']; ?>
    </h1>
    <p> votre imc est de <?php echo $imc ?> </p> 
    <a href="deconnexion.php">Deconnexion</a>
    <?php
    // var_dump($_SESSION); 
    ?>
</body>

</html>