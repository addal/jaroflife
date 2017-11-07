<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>
      Modifier
      <?php
        if ($todo) {
          echo '- ' . $todo['title'];
        }
      ?>
    </title>
  </head>
  <body>
    <?php
      if ($todo) {
    ?>
    <form action="" method="post">
      <div>
        <label>
          titre :
          <input type="text" name="title" value="<?php echo $todo['title']; ?>">
        </label>
      </div>
      <div>
        <label>
          description :
          <textarea name="description"><?php echo $todo['description']; ?></textarea>
        </label>
      </div>
      <div>
        <input type="submit" value="envoyer">
      </div>
    </form>
    <?php
      }
    ?>
    <ul>
      <?php
        if ($todo && isset($todo['id'])) {
      ?>
      <li><a href="read.php?id=<?php echo $todo['id']; ?>">annuler</a></li>
      <?php
        }
      ?>
      <li><a href="index.php">retour à l'index</a></li>
    </ul>
  </body>
</html>
