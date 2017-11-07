<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ajouter - <?php echo $title; ?></title>
  </head>
  <body>
    <p><?php echo $message; ?></p>
    <form action="" method="post">
      <div>
        <label>
          titre :
          <input type="text" name="title" value="<?php echo $title; ?>">
        </label>
      </div>
      <div>
        <label>
          description :
          <textarea name="description"><?php echo $description; ?></textarea>
        </label>
      </div>
      <div>
        <input type="submit" value="envoyer">
      </div>
    </form>
    <ul>
      <li><a href="index.php">retour à l'index</a></li>
    </ul>
  </body>
</html>
