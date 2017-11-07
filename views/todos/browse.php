<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Parcourir les todos</title>
  </head>
  <body>
    <h1>todo-list</h1>
    <ul>
    <?php
      foreach ($todos as $todo) {
    ?>
      <li>
        <a href="read.php?id=<?php echo $todo['id']; ?>">
          <?php echo $todo['title']; ?>
        </a>
      </li>
    <?php
      }
    ?>
      <li><a href="add.php">ajouter une tâche...</a></li>
    </ul>
  </body>
</html>
