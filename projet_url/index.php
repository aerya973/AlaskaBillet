
<?php
  //IS RECEIVED shortcut
  if(isset($_GET['q'])){
    //VARIABLE
    $shortcut = htmlspecialchars($_GET['q']);

    //IS A SHORTCUT ?
    $bdd = new PDO('mysql:host=localhost;dbname=bitly;charset=utf8', 'root', 'Coucou les Amis Dev!695.');
    $req = $bdd->prepare('SELECT COUNT(*) AS x FROM links WHERE shortcut = ?');
    $req->execute(array($shortcut));

    while ($result = $req->fetch()){
      if($result['x'] != 1){
        header('location: ./?error=true&message=Adresse url non connue');
        exit();
      }
    }
    $req = $bdd->prepare('SELECT * FROM links WHERE shortcut = ?');
  	$req->execute(array($shortcut));

  	while($result = $req->fetch()){

  		header('location: '.$result['url']);
  		exit();
  	}
  }


  //IS SENDING
  if(isset($_POST['url'])){
    //VARIABLE
    $url = $_POST['url'];

    // VERIFICATION
  	if(!filter_var($url, FILTER_VALIDATE_URL)) {
  		// PAS UN LIEN
  		header('location: ./?error=true&message=Adresse url non valide');
  		exit();
  	}
    //SHORTCUT
    $shortcut = crypt($url, rand());

    // HAS BEEN ALREADY SEND ?
    $bdd = new PDO('mysql:host=localhost;dbname=bitly;charset=utf8', 'root', 'Coucou les Amis Dev!695.');
    $req = $bdd->prepare('SELECT COUNT(*) AS x FROM links WHERE url = ?');
    $req->execute(array($url));

    while ($result = $req->fetch()){
      if($result['x'] != 0){
        header('location: ./?error=true&message=Adresse deja envoyee');
        exit();
      }
    }

    // SENDING ?
    $req = $bdd->prepare('INSERT INTO links(url, shortcut) VALUES(?, ?)');
    $req->execute(array($url, $shortcut));
    header('location: ./?short='.$shortcut);
    exit();
  }
?>

<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="design/default.css"/>
    <link rel="icon" type="image/png" href="pictures/favico.png">
    <title>Racourcisseur d'url</title>
  </head>

  <body>

    <!--PRESENTATION-->
    <section id="hello">
      <div class="container">
        <header>
          <img src="pictures/logo.png" alt="logo" id="logo"/>
        </header>
        <h1> Une url longue ? Raccourcissez la! </h1>
        <h2>Largement meilleur et plus court que les autres </h2>
        <form method="post" action="">
          <input type="url" name="url" placeholder="Placez le lien a raccourcir"/>
          <input type="submit" name="Raccourcir"/>
        </form>

        <?php if(isset($_GET['error']) && isset($_GET['message'])) { ?>
          <div class="center">
            <div id="result">
              <b><?php echo htmlspecialchars($_GET['message']); ?></b>
            </div>
          </div>
        <?php } else if(isset($_GET['short'])) {?>
          <div class="center">
            <div id="result">
              <b>URL RACCOURCIE : </b>
              http://localhost/?q=<?php echo htmlspecialchars($_GET['short']); ?>
            </div>
          </div>
        <?php } ?>
      </div>
    </section>

    <section id="brands">
      <div class="container">
        <h3>Ces marques nous font confiance</h3>
        <img src="pictures/1.png" alt="logo entrepreneur magazine" id="picture"/>
        <img src="pictures/2.png" alt="logo kaiser permanente" id="picture"/>
        <img src="pictures/3.png" alt="logo pbs" id="picture"/>
        <img src="pictures/4.png" alt="logo montage" id="picture"/>
      </div>
    </section>

    <!--BRANDS -->
    <footer>
      <img src="pictures/logo2.png" alt="logo bitly" id="logo2"/><br>
      2018 © Bitly<br>
      <a href="#">Contact</a> - <a href="#">À-propos</a>
    </footer>
  </body>

</html>
