<div class="containerForm">
  <h4>Ajouter un Article</h4>
  <form action="<?= HtmlHelper::getAction('AddArticle', 'Admin') ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="date"/>
    <div>
      <label for="title">Titre:</label><br />
      <input type="text" name="title"/>
    </div>
    <div>
      <label for="content">Contenu:</label><br />
      <input type="text" name="content"/>
    </div>
    <div>
      <label for="img">Image:</label><br />
      <input type="file" name="img" id="img" />
    </div>
      <input type="submit" name="addSubmit" value="Ajouter" />
  </form>
</div>
