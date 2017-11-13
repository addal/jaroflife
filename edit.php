<?php

require __DIR__.'/models/Todo.php';

$todo = null;

if (isset($_GET['id'])) {
    if (isset($_POST['title'], $_POST['description'])) {
        if (Todo::update($_GET['id'], $_POST)) {
            header('Location:read.php?id=' . $_GET['id']);
            exit;
        }
    } else {
        $todo = Todo::read($_GET['id']);
    }
}

require __DIR__.'/views/todos/edit.php';

