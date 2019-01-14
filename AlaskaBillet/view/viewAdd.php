<div class="containerForm">
  <h4>Ajouter un Article</h4>
  <form action="<?= HtmlHelper::getAction('AddArticle', 'Admin') ?>" method="post">
    <input type="hidden" name="date"/>
    <div>
      <label for="title">Titre:</label><br />
      <input type="text" name="title"/>
    </div>
    <div>
      <label for="title">Contenu:</label><br />
      <input type="text" name="content"/>
    </div>
    <div>
      <label for="title">Image:</label><br />
      <input type="image" name="img"/>
      <input type="file" name="img" accept="image/*">
    </div>
      <input type="submit" name="addSubmit" value="Ajouter" />
  </form>
</div>
