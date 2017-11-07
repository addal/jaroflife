<?php

require __DIR__.'/models/Todo.php';

$title = '';
$description = '';
$message = 'Veuillez remplir les champs suivants.';

if (isset($_POST['title'], $_POST['description'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];

    if (create($_POST)) {
        header('Location:index.php');
        exit;
    } else {
        $message = 'Une erreur est survenue pendant la création.';
    }
}

require __DIR__.'/views/todos/add.php';

