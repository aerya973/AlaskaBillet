
<div class="containerForm">
  <h4>Modifier un article</h4>
  <form action="<?= HtmlHelper::getAction('ShowEdit', 'Admin') ?>" method="post">
    <input type="hidden" name="id" value="<?= $oneArticle->getId() ?>" />
    <div>
      <label for="title">Title:</label><br />
      <input type="text" name="title" value="<?= htmlspecialchars($oneArticle->getTitle()); ?>"/>
    </div>
    <div>
      <label for="title">Contenu:</label><br />
      <input type="text" name="content" value="<?= $oneArticle->getContent(); ?>"/>
    </div>
    <div>
      <label for="title">Image:</label><br />
      <input type="image" name="img" value="<?= $oneArticle->getImg(); ?>"/>
      <input type="file" name="img" accept="image/*">
    </div>
    <button type="submit" name="editSubmit">Modifier</button>
  </form>
</div>
