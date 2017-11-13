<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>login</title>
  </head>
  <body>
    <h1>login</h1>
    <form action="" method="post">
      <div>
        <label>
          login :
          <input type="text" name="login" value="<?php echo $login; ?>">
        </label>
      </div>
      <div>
        <label>
          mot de passe :
          <input type="password" name="password" value="<?php echo $password; ?>">
        </label>
      </div>
      <div>
        <input type="submit" value="envoyer">
      </div>
    </form>
  </body>
</html>
