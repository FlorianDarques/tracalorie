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
        $calorie = htmlentities($_POST['calorie']);
        $email = $_SESSION['user']['email'];
        $date = ($_POST['date']);
        $sql = "SELECT * FROM `calorie` WHERE `emailuser` = '$email' AND `date` = '$date'";
        $query = $db->prepare($sql);
        $query->execute();
        $result = $query->fetchAll();
        if (!empty($date) && !empty(is_numeric($calorie))) {
            if (!empty($result)) {
                $currentcalorie = $result[0]['calorie'];
                $currentcalorie = $currentcalorie + $calorie;
                $sql = "UPDATE `calorie` SET `calorie`= '$currentcalorie' WHERE `emailuser` = '$email' AND `date` = '$date'";
                $query = $db->prepare($sql);
                $query->execute();
                $_SESSION['calorie'] = [
                    'calorie' => $currentcalorie,
                    'date' => $date
                ];
                // var_dump($_SESSION['calorie']);
            } else {
                $sql = "INSERT INTO `calorie` (emailuser, date, calorie) VALUES ('$email','$date','$calorie')";
                $query = $db->prepare($sql);
                $query->execute();
                $_SESSION['calorie'] = [
                    'calorie' => $calorie,
                    'date' => $date
                ];
                // var_dump($_SESSION['calorie']);
            }
        }
    } catch (PDOException $e) {
        die($e->getMessage());
    }
    header('location: user.php');
}
