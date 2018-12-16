<?php
if(!empty($_POST) && isset($_POST['btnContact'])){
  if(isset($_POST['email']) && isset($_POST['firstname']) && isset($_POST['message'])){
    if(!empty($_POST['email']) && !empty($_POST['firstname']) && !empty($_POST['message'])){
      $email = str_secur($_POST['email']);
      $firstname = str_secur($_POST['firstname']);
      $message = str_secur($_POST['message']);
      $message .= ' - email envoye par: ' . $firstname . ' : ' . $email;
      debug($message);

      //SEND EMAIL
      mail('maboitemail@monsite.fr', 'On me contacte sur mon site', $message);
    }else{
      $error = "Vous devez remplir tous les champs";
    }
  } else {
  $error = "Une erreurs s'est produite";
  }
}
