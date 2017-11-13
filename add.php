<?php

require __DIR__.'/models/Todo.php';

$title = '';
$description = '';
$message = 'Veuillez remplir les champs suivants.';

if (isset($_POST['title'], $_POST['description'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $user_id = 1;

    if (
        Todo::create(
            array(
                'title' => $title,
                'description' => $description,
                'user_id' => $user_id
            )
        )
    ) {
        header('Location:index.php');
        exit;
    } else {
        $message = 'Une erreur est survenue pendant la création.';
    }
}

require __DIR__.'/views/todos/add.php';

