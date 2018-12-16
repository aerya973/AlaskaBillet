<!doctype html>
<html lang="fr">
  <head>

    <?php include_once'views/includes/head.php'?>
    <title>Connexion</title>

  </head>

  <body>

    <div class="container">

      <?php include_once'views/includes/header.php'?>

    </div>

    <main role="main" class="container">
      <h1>Connexion</h1>

      <form action="index.php" method="post">
      <div class="form-group">

        <input type="pseudo" name="pseudo" class="form-control" id="exampleInputPseudo" placeholder="Pseudo">

      </div>

      <div class="form-group">

        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="******">

      </div>

      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
    </main><!-- /.container -->

    <?php include_once'views/includes/footer.php'?>

  </body>
</html>
