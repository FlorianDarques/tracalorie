<?php
session_start();
if (isset($_POST['submit'])) {
    define("DBHOST", "localhost");
    define("DBUSER", "root");
    define("DBPASS", "root");
    define("DBNAME", "tracalorie");
    try {
        $dsn = "mysql:dbname=" . DBNAME . ";host=" . DBHOST;
        $db = new PDO($dsn, DBUSER, DBPASS);
        $db->exec("SET NAMES utf8");
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $email = htmlentities($_POST['email']);
        $pswd = htmlentities($_POST['pswd']);
        if (!empty($_POST['email']) && !empty($_POST['pswd'])) {
            if (filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)) {
                $sql = "SELECT `pswd` FROM `membre` WHERE `email`=?";
                $query = $db->prepare($sql);
                $query->execute(array($email));
                $userinfo = $query->rowCount();
                $verifmdp = "";
                if ($userinfo === 1) {
                    $user = $query->fetch();
                    $verifmdp = $user['pswd'];
                } else {
                    echo 'mdp ou identifiant inccorrect';
                }
                if (password_verify($pswd, $verifmdp) === TRUE) {
                    $sql = "SELECT * FROM `membre` WHERE `email`=?";
                    $query = $db->prepare($sql);
                    $query->execute(array($email));
                    $userinfo = $query->rowCount();
                    $user = $query->fetchAll();
                    $_SESSION['user'] = [
                        'username' => $user[0]["username"],
                        'email' => $user[0]["email"],
                        'height' => $user[0]["height"],
                        'weight' => $user[0]["weight"],
                        'gender' => $user[0]["gender"]
                    ];


                    // ========= test récup donnée calorie
                    $email = $_SESSION['user']['email'];
                    $sql = "SELECT * FROM `calorie` WHERE `emailuser` = '$email'";
                    $query = $db->prepare($sql);
                    $query->execute();
                    $result = $query->fetchAll();
                    $_SESSION['calorie'] = [
                        'calorie' => $result[0]["calorie"],
                        'date' => $result[0]["date"]
                    ];
                    header('location: ../user/user.php');
                } else {
                    header('location: connexion.php');
                }
            }
        }
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}
