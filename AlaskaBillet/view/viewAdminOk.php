<div class="addArticle">
<button class="addButton1"><a href="<?= HtmlHelper::getAction('ShowAdd', 'Admin') ?>">Ajouter un article</a></button>
<button class="commButton"><a href="<?= HtmlHelper::getAction('ShowComments', 'Comment') ?>">Commentaires</a></button>
</div>
<div style="overflow-x:auto;">
  <table>
    <thead>
      <tr class="titleAdmin">
        <th>Titre</th>
        <th>Contenu</th>
        <th>Date</th>
        <th>Image</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach ($listeArticle as $article): ?>
        <tr class="manageArticle">
          <td class="title"><?= $article->getTitle(); ?></td>
          <td><?= $article->getContent(); ?></td>
          <td><?= $article->getDate(); ?></td>
          <td><img src="<?= $imgPath.$article->getImg(); ?>" /></td>
          <td>

          <button class="editBtn"><a href=" <?= HtmlHelper::getActionId('ShowArticle', 'Admin', $article->getId()) ?>">Editer</a></button>
          <button class="deleteBtn" data-id="<?= $article->getId(); ?>">Supprimer</button>
          <p><?= $article->getId(); ?></p>
          </td>
        </tr>
        <?php endforeach; ?>

        <div id="myModal" class="modal">
          <div class="modal-content">
            <span class="close">&times;</span>
            <form action="<?= HtmlHelper::getActionId('deleteArticle', 'Admin', $article->getId()) ?>" method="post">
              <input type="hidden" name="id"></input>
              <p><?= $article->getId();?></p>
              <p>Voulez-vous supprimer cet article ? </p>
              <button name="deletePost" class="deleteBouton">supprimer</button>
            </form>
          </div>
        </div>

    </tbody>
  </table>
</div>
