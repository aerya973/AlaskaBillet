<?php
$this->_t = "Espace Administrateur";
?>
<h1>Espace Administrateur</h1>
<div class="addArticle">
<!-- ADD POSTS -->
<button class="addButton1"><a href="<?=HtmlHelper::getAction('ShowAdd', 'Admin')?>">Ajouter un article</a></button>
<!-- COMMENT MANAGER -->
<button class="commButton"><a href="<?=HtmlHelper::getAction('ShowComments', 'Comment')?>">Commentaires</a></button>
</div>



<div class="Table">

  <div class="Table-row Table-header">
    <div class="Table-row-item">Titre</div>
    <div class="Table-row-item">Contenu</div>
    <div class="Table-row-item">Date</div>
    <div class="Table-row-item hiddenPic">Image</div>
    <div class="Table-row-item">Action</div>
  </div>

  <?php foreach ($listeArticle as $article): ?>



  <div class="Table-row columns">
    <div class="Table-row-item"><?=$article->getTitle();?></div>
    <div class="Table-row-item"><?=$article->getContent();?></div>
    <div class="Table-row-item"><?=$article->getDate();?></div>
    <div class="Table-row-item hiddenPic"><img src="<?=$imgPath . $article->getImg();?>"/></div>
    <div class="Table-row-item" >

      <div><button class="editBtn"><a href="<?=HtmlHelper::getActionId('ShowArticle', 'Admin', $article->getId());?>">Editer</a></button></div>
          <!-- DELETE BUTTON OPENING MODAL -->
      <div><button class="deleteBtn" data-id="<?=$article->getId();?>">Supprimer</button></div>
    </div>
    </div>
  <?php endforeach;?>


</div>

  <div id="myModal" class="modal">
          <div class="modal-content">
            <span class="close">&times;</span>
            <!-- DELETE COMMENT -->
            <form action="<?=HtmlHelper::getAction('deleteArticle', 'Admin');?>" method="post">
              <input type="hidden" name="id" id="id">
              <p class="deleteMsg">Voulez-vous supprimer cet article ? </p>
              <button name="deletePost" class="deleteBouton">supprimer</button>
            </form>
          </div>
        </div>