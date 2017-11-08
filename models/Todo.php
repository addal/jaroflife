<?php

function create($values) {
    $sql =
        'INSERT INTO todos (title, description, user_id)' .
        'VALUES (:title, :description, :user_id)';

    $ok = false;

    require __DIR__.'/../create-pdo.php';

    if (
        $pdo_statement &&
        $pdo_statement->bindParam(
            ':title', htmlspecialchars($values['title'])
        ) &&
        $pdo_statement->bindParam(
            ':description', htmlspecialchars($values['description'])
        ) &&
        $pdo_statement->bindParam(
            ':user_id', htmlspecialchars($values['user_id'])
        ) &&
        $pdo_statement->execute()
    ) {
        $ok = true;
    }

    return $ok;
}

function readAll() {
    $sql =
        'SELECT * FROM todos WHERE deleted_at IS NULL';

    $todos = [];

    require __DIR__.'/../create-pdo.php';

    if ($pdo_statement && $pdo_statement->execute()) {
        $todos = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);
    }

    return $todos;
}

function read($id) {
    $sql =
        'SELECT * FROM todos WHERE id=:id AND deleted_at IS NULL';

    $todo = null;

    require __DIR__.'/../create-pdo.php';

    if (
        $pdo_statement &&
        $pdo_statement->bindParam(':id', $id, PDO::PARAM_INT) &&
        $pdo_statement->execute()
    ) {
        $todo = $pdo_statement->fetch(PDO::FETCH_ASSOC);
    }

    return $todo;
}

function update($id, $values) {
    $sql =
        'UPDATE todos ' .
        'SET title=:title, description=:description ' .
        'WHERE id=:id';

    $ok = false;

    require __DIR__.'/../create-pdo.php';

    if (
        $pdo_statement &&
        $pdo_statement->bindParam(
            ':id', $id, PDO::PARAM_INT
        ) &&
        $pdo_statement->bindParam(
            ':title', htmlspecialchars($values['title'])
        ) &&
        $pdo_statement->bindParam(
            ':description', htmlspecialchars($values['description'])
        ) &&
        $pdo_statement->execute()
    ) {
        $ok = true;
    }

    return $ok;
}

function delete($id) {
    $sql =
        'UPDATE todos ' .
        'SET deleted_at=CURRENT_TIMESTAMP() ' .
        'WHERE id=:id';

    $ok = false;

    require __DIR__.'/../create-pdo.php';

    if (
        $pdo_statement &&
        $pdo_statement->bindParam(':id', $id, PDO::PARAM_INT) &&
        $pdo_statement->execute()
    ) {
        $ok = true;
    }

    return $ok;
}

