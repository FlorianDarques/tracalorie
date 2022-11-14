<?php
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
        $username = htmlentities($_POST['username']);
        $pswd = htmlentities($_POST['pswd']);
        $pswd_cfrm = htmlentities($_POST['pswd_cfrm']);
        $height = htmlentities($_POST['height']);
        $weight = htmlentities($_POST['weight']);
        $gender = $_POST['gender'];
        if (!empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['pswd'])) {
            if (!filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)) {
                header('location: inscriptionform.php');
            } else {
                $check = $db->prepare('SELECT * FROM membre WHERE email = ?');
                $check->execute(array($email));
                $data = $check->fetch();
                $row = $check->rowCount();
                $email = strtolower($email);
                if ($row === 0 && $pswd === $pswd_cfrm) {
                    $pswd = htmlentities(password_hash($_POST['pswd'], PASSWORD_DEFAULT, ['cost' => 12]));
                    $sql = "INSERT INTO `membre`(email, username, pswd) VALUES ('$email', '$username', '$pswd')";
                    $query = $db->prepare($sql);
                    $query->execute();
                }
                if (is_numeric($height) && is_numeric($weight) && is_bool($gender)) {
                    // $sql = "INSERT INTO `membre`(gender, height, weight) VALUES ('$gender','$height','$weight')";
                    // $query = $db->prepare($sql);
                    // $query->execute();
                }
            }
        };
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}
