<?php
session_start();

if (empty($_SESSION["user"]) || !isset($_SESSION["user"])) {
    header('Location: ../connexion/connexion.php');
}

$height = $_SESSION['user']['height'] * 0.01;
$weight = $_SESSION['user']['weight'];
$imc = number_format($weight / ($height * $height), 1, ',');
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
    <a href="../deconnexion.php">Deconnexion</a>

    <form action="userupdate.php" method="post">
        <div>
            <p>votre taille actuelle est de <?= $_SESSION['user']['height'] ?> cm</p>
            <input type="text" placeholder="Taille en cm" name="height" pattern="[0-9]{3}" autocomplete="off">
        </div>
        <div>
            <p>votre poids actuel est de <?= $_SESSION['user']['weight'] ?> kg</p>
            <input type="text" placeholder="Poids en kg" name="weight" pattern="[0-9]{2-3}" autocomplete="off">
        </div>
        <button type="submit" name="submit">Valider</button>
    </form>

</body>

</html>