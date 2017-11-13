<?php

require __DIR__.'/check-connection.php';

require __DIR__.'/models/Todo.php';

$todos = Todo::readAll();

require __DIR__.'/views/todos/browse.php';

