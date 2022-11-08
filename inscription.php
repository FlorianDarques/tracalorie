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
            $email = $_POST['email'];
            $username = $_POST['username'];
            $pswd = $_POST['pswd'];
            if(!empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['pswd'])) {
                $sql = "INSERT INTO `membre`(email, username, pswd) VALUES (:email, :username, :pswd)";
                $query = $db->prepare($sql);
                $query->bindValue(":email", $email, PDO::PARAM_STR);
                $query->bindValue(":username", $username, PDO::PARAM_STR);
                $query->bindValue(":pswd", $pswd, PDO::PARAM_STR);
                $query->execute();
                $userinfo = $query->fetchAll();
        };
    }
    catch(PDOException $e) {
    die($e->getMessage());
    }
}
header('location: index.php')
?>