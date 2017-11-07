<?php

require __DIR__.'/models/Todo.php';

$todo = null;

if (isset($_GET['id'])) {
    $todo = read($_GET['id']);
}

require __DIR__.'/views/todos/read.php';

