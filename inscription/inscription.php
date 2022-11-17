<?php
session_start();
// include('function/function.php');
if (isset($_POST['submit'])) {
    define("DBHOST", "localhost");
    define("DBUSER", "root");
    define("DBPASS", "root");
    define("DBNAME", "tracalorie");
    $dsn = "mysql:dbname=" . DBNAME . ";host=" . DBHOST;
    $db = new PDO($dsn, DBUSER, DBPASS);
    $db->exec("SET NAMES utf8");
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $email = htmlentities($_POST['email']);
    $username = htmlentities($_POST['username']);
    $pswd = htmlentities($_POST['pswd']);
    $pswd_cfrm = htmlentities($_POST['pswd_cfrm']);
    $height = htmlentities($_POST['height']);
    $weight = htmlentities($_POST['weight']);
    $gender = $_POST['gender'];
    if (!empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['pswd']) && !empty($_POST['pswd_cfrm']) && !empty($_POST['weight']) && !empty($_POST['height']) && $gender === "1" || "2") {
        if (filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)) {
            $check = $db->prepare('SELECT * FROM membre WHERE email = ?');
            $check->execute(array($email));
            $data = $check->fetch();
            $row = $check->rowCount();
            $email = strtolower($email);
            if ($row === 0 && $pswd === $pswd_cfrm) {
                $pswd = htmlentities(password_hash($_POST['pswd'], PASSWORD_DEFAULT, ['cost' => 12]));
                if (is_numeric($height) && is_numeric($weight)) {
                    $sql = "INSERT INTO `membre`(email, username, pswd, height, weight, gender) VALUES ('$email', '$username', '$pswd', '$height', '$weight', '$gender')";
                    $query = $db->prepare($sql);
                    $query->execute();
                    // $id = $db->lastInsertId();
                    $_SESSION['user'] = [
                        'username' => $username,
                        'email' => $email,
                        'height' => $height,
                        'weight' => $weight,
                        'gender' => $gender
                    ];
                    // var_dump($_SESSION);
                    header('location: ../user/user.php');
                } else {
                    echo "le poids , la taille ou le sexe n'est pas valide";
                }
            } else {
                echo "compte existant ou mot de passe pas identique";
            }
        } else {
            echo "adresse mail non valide";
        }
    } else {
        header('location: inscriptionform.php');
        echo "il y a des champs vide";
    }
}