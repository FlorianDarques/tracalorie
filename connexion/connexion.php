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
        <h1>Connexion</h1>
        <form action="connexionauth.php" method="POST" class="flex content">
            <div>
                <input type="text" placeholder="Adresse Mail" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" autocomplete="off">
            </div>
            <div>
                <input type="password" placeholder="Mot de passe" name="pswd" autocomplete="off">
            </div>
            <div><button type="submit" name="submit">valider</button>
            </div>
        </form>
    </div>
</body>

</html>