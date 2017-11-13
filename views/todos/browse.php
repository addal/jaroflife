<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Parcourir les todos</title>
  </head>
  <body>
    <nav>
      <ul>
        <li>
        <?php
          if ($connected_user) {
        ?>
          <a href="logout.php">logout</a>
        <?php
          } else {
        ?>
          <a href="login.php">login</a>
        <?php
          }
        ?>
        </li>
      </ul>
    </nav>
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
