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
    <div>
        <h1>Inscription</h1>
        <div>
        <form action="inscription.php" method="POST">
            <div>
                <input type="text" placeholder="Adresse Mail" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" autocomplete="off">
            </div>
            <div>
                <input type="text" placeholder="Nom d'utilisateur" name="username"required pattern="[A-Za-z0-9]{3,255}" autocomplete="off">
            </div>
            <div>
                <input type="password" placeholder="Mot de passe" name="pswd" required pattern="{8,255}" autocomplete="off">
            </div>
            <div>
                <input type="password" placeholder="Confirmation Mot de passe" name="pswd_cfrm" required pattern="{8,255}" autocomplete="off">
            </div>
            <div>
                <input type="radio" value="1" name="gender" checked >Homme</input>
                <input type="radio" value="2" name="gender" >Femme</input>
            </div>
            <div>
                <input type="number" name="height" name="height" placeholder="taille en centimètre" pattern="[0-9]{2,3}" autocomplete="off"></input>
            </div>
            <div>
                <input type="number" name="weight" name="weight" placeholder="poids arrondie au supérieur" pattern="[0-9]{2,3}" autocomplete="off"></input>
            </div>
            <div>
                <button type="submit" name="submit">valider</button>
            </div>
        </form>
        </div>
    </div>
</body>

</html>

<?php
?>