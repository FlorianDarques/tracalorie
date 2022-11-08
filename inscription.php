<?php
    if(isset($_POST['submit'])) {
        define("DBHOST", "localhost");
        define("DBUSER", "root");
        define("DBPASS", "root");
        define("DBNAME", "tracalorie");
        try {
            $dsn = "mysql:dbname=".DBNAME.";host=".DBHOST;
            $db = new PDO($dsn, DBUSER, DBPASS);
            $db->exec("SET NAMES utf8");
            $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $email = htmlentities($_POST['email']);
            $username = htmlentities($_POST['username']);
            $pswd = htmlentities(password_hash($_POST['pswd'], PASSWORD_DEFAULT, ['cost' => 12]));
            if(!empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['pswd'])) {
                $sql = "INSERT INTO `membre`(email, username, pswd) VALUES ('$email', '$username', '$pswd')";
                $query = $db->prepare($sql);
                $query->execute();
            };
        }
        catch(PDOException $e) {
            die($e->getMessage());
        }
    }
    header('location: inscriptionform.php');
?>

