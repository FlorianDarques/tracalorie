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
        $height = htmlentities($_POST['height']);
        $weight = htmlentities($_POST['weight']);
        $email = $_SESSION['user']['email'];
        // echo $email;
        if (!empty($_POST['height'])) {
            $sql = "UPDATE `membre` SET `height` = '$height' WHERE `email`= '$email' ";
            $query = $db->prepare($sql);
            $query->execute();
            $_SESSION['user']['height'] = $height;
        } 
        if (!empty($_POST['weight'])) {
            $sql = "UPDATE `membre` SET `weight` = '$weight' WHERE `email`= '$email' ";
            $query = $db->prepare($sql);
            $query->execute();
            $_SESSION['user']['weight'] = $weight;
        } 
    } catch (PDOException $e) {
        die($e->getMessage());
    }
    header('location: user.php');
}
