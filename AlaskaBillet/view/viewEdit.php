<?php
$this->_t = "Editer Article";
?>

<div class="containerForm">
  <h4>Modifier un article</h4>
  <form action="<?=HtmlHelper::getAction('ShowEdit', 'Admin')?>" method="post" enctype="multipart/form-data" >
    <input type="hidden" name="id" value="<?=$oneArticle->getId()?>" />
    <div>
      <label for="title">Titre</label><br />
      <input type="text" name="title" value="<?=htmlspecialchars($oneArticle->getTitle());?>"/>
    </div>
    <div>
      <label for="title">Contenu</label><br />
      <textarea id="mytextarea" name="content"> <?=htmlspecialchars($oneArticle->getContent());?></textarea>
    </div>
    <div class="editImg">
      <label for="title">Image</label><br />
      <input type="image" name="image" value="<?=$oneArticle->getImg();?>"/>
      <input type="file" name="img" id="img" />
    </div>
    <button class="modifyBtn" type="submit" name="editSubmit">Modifier</button>
  </form>
</div>
