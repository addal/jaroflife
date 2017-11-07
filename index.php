<?php

require __DIR__.'/models/Todo.php';

$todos = readAll();

require __DIR__.'/views/todos/browse.php';

