<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>TraCalorie</title>
</head>

<body>
    <div class="content flex">
        <h1>Inscription</h1>
        <form action="../test/testinscription.php" method="POST" class="flex content">
            <div>
                <input type="text" placeholder="Adresse Mail" name="email" required " autocomplete="off">
            </div>
            <div>
                <input type="text" placeholder="Nom d'utilisateur" name="username" autocomplete="off">
            </div>
            <div>
                <input type="password" placeholder="Mot de passe" name="pswd" autocomplete="off">
            </div>
            <div>
                <input type="password" placeholder="Confirmation Mot de passe" name="pswd_cfrm" autocomplete="off">
            </div>
            <div>
                <input type="radio" value="0" name="gender" checked>Homme</input>
                <input type="radio" Value="1" name="gender" >Femme</input>
            </div>
            <div>
                <input type="text" name="height" name="height" placeholder="taille en centimètre"></input>
            </div>
            <div>
                <input type="text" name="weight" name="weight" placeholder="poids arrondie au supérieur"></input>
            </div>
            <div>
                <button type="submit" name="submit">valider</button>
            </div>
        </form>
    </div>
</body>

</html>

<?php
?>pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$