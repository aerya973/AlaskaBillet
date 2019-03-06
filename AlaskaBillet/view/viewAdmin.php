<?php
$this->_t = "Admin"; 
?>

<h1>Espace Administrateur</h1>

<div class="formLogin">
  <form action="<?=HtmlHelper::getAction('Authentification', 'Admin')?>" method="post">
   <div class="inputUser">
      <input type="username" id="user_name" name="user_name" placeholder="username">
    </div>
    <div class="inputPass">
      <input type="password" id="user_pass" name="user_pass" placeholder="*****">
    </div>
    <button type="submit" value="submit" class="loginBtn"> Se connecter </button>
  </form>
</div>
