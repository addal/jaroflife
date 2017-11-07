<?php

require __DIR__.'/models/Todo.php';

$location = 'index.php';

if (isset($_GET['id']) && !delete($_GET['id'])) {
    $location = 'read.php?id=' . $_GET['id'];
}

header('Location:' . $location);

