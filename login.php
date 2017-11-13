<?php

require __DIR__.'/models/User.php';

$login = '';
$password = '';
$message = 'Veuillez remplir les champs suivants.';

if (isset($_POST['login'], $_POST['password'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $matches = User::readAll([
        'login' => $login,
        'password' => $password
    ]);

    if (empty($matches)) {
        $message = 'login/mot de passe invalide.';
    } else {
        session_start();

        $_SESSION['user_id'] = $matches[0]['id'];

        header('Location:index.php');
        exit;
    }
}

require __DIR__.'/views/users/login.php';

