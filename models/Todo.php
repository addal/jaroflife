<?php

class Todo
{
    private static function createStatement($sql)
    {
        try {
            require __DIR__.'/../config.php';

            $pdo = new PDO(
                "mysql:dbname=$dbname;host=$host;charset=utf8", $user, $password
              );

            $pdo_statement = $pdo->prepare($sql);
        } catch (PDOException $e) {
            echo 'erreur : ' . $e->getMessage();

            $pdo_statement = null;
        }

        return $pdo_statement;
    }

    public static function create($values)
    {
        $sql =
            'INSERT INTO todos (title, description, user_id)' .
            'VALUES (:title, :description, :user_id)';

        $ok = false;

        $pdo_statement = self::createStatement($sql);

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

    public static function readAll()
    {
        $sql =
            'SELECT * FROM todos WHERE deleted_at IS NULL';

        $todos = [];

        $pdo_statement = self::createStatement($sql);

        if ($pdo_statement && $pdo_statement->execute()) {
            $todos = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);
        }

        return $todos;
    }

    public static function read($id)
    {
        $sql =
            'SELECT * FROM todos WHERE id=:id AND deleted_at IS NULL';

        $todo = null;

        $pdo_statement = self::createStatement($sql);

        if (
            $pdo_statement &&
            $pdo_statement->bindParam(':id', $id, PDO::PARAM_INT) &&
            $pdo_statement->execute()
        ) {
            $todo = $pdo_statement->fetch(PDO::FETCH_ASSOC);
        }

        return $todo;
    }

    public static function update($id, $values)
    {
        $sql =
            'UPDATE todos ' .
            'SET title=:title, description=:description ' .
            'WHERE id=:id';

        $ok = false;

        $pdo_statement = self::createStatement($sql);

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

    public static function delete($id)
    {
        $sql =
            'UPDATE todos ' .
            'SET deleted_at=CURRENT_TIMESTAMP() ' .
            'WHERE id=:id';

        $ok = false;

        $pdo_statement = self::createStatement($sql);

        if (
            $pdo_statement &&
            $pdo_statement->bindParam(':id', $id, PDO::PARAM_INT) &&
            $pdo_statement->execute()
        ) {
            $ok = true;
        }

        return $ok;
    }
}

