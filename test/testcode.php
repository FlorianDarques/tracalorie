<?php
const ERROR_REQUIRED = "champ obligatoire";
const ERROR_LENGTH = "6-20 caracteres";
const ERROR_EMAIL = "email invalide";
$errors = ['prenom' => "", 'email' => ""];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST = filter_input_array(INPUT_POST, [
        'prenom' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'email' => FILTER_SANITIZE_EMAIL,
    ]);
    $firstname = $_POST['prenom'] ?? '';
    $email = $_POST['email'] ?? '';

    if (!$firstname) {
        $errors['prenom'] = ERROR_REQUIRED;
    } elseif (mb_strlen($firstname) < 6 || mb_strlen($firstname) > 20) {
        $errors['prenom'] = ERROR_LENGTH;
    }
    if (!$email) {
        $errors['email'] = ERROR_REQUIRED;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = ERROR_EMAIL;
    }
}

// ==========================================================================================

