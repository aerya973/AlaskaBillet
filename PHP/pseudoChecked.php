<?php
//LES CONDITIONS TERNAIRES
  $pseudo = (!empty($_GET['pseudo'])) ? $_GET['pseudo'] : 'unknown user';

//HELLO PSEUDO
  echo "Hello ".$pseudo;
?>
