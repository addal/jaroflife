<?php

class User
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

    public static function readAll($p)
    {
        $sql =
            'SELECT * FROM users';

        $users = [];

        $pdo_statement = self::createStatement($sql);

        if ($pdo_statement && $pdo_statement->execute()) {
            $users = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);
        }

        return $users;
    }

    public static function read($id)
    {
        $sql =
            'SELECT * FROM users WHERE id=:id AND deleted_at IS NULL';

        $user = null;

        $pdo_statement = self::createStatement($sql);

        if (
            $pdo_statement &&
            $pdo_statement->bindParam(':id', $id, PDO::PARAM_INT) &&
            $pdo_statement->execute()
        ) {
            $user = $pdo_statement->fetch(PDO::FETCH_ASSOC);
        }

        return $user;
    }
}

