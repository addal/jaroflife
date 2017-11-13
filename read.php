<?php

require __DIR__.'/models/Todo.php';

$todo = null;

if (isset($_GET['id'])) {
    $todo = Todo::read($_GET['id']);
}

require __DIR__.'/views/todos/read.php';

