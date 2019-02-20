<div class="containerForm">
  <h4>Ajouter un Article</h4>
  <form action="<?= HtmlHelper::getAction('AddArticle', 'Admin') ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="date"/>
    <div>
      <label for="title">Titre:</label><br />
      <input type="text" name="title" id="title"/>
    </div>
    <div>
      <label for="content">Contenu:</label><br />
      <input type="text" name="content" id="content"/>
    </div>
    <div>
      <label for="img">Image:</label><br />
      <input type="file" name="img" id="img"/>
    </div>
      <button class="addButton2" type="submit" name="addSubmit">Ajouter</button>
  </form>
</div>
