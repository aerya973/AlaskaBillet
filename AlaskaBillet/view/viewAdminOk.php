<!-- <?php foreach ($listeArticle as $article): ?>
<div>
  <div>
    <label>Titre <?= $article->getTitle(); ?></label>
  </div>
  <div class="contentArticle">
    <label>Contenu</label>
      <?= $article->getContent(); ?>
  </div>
    <div class="dateArticle">
      <label>Date</label>
      <?= $article->getDate(); ?>
    </div>
    <div class="imgArticle">
      <label>Image:</label>
      <articl><img src="<?= $imgPath.$article->getImg(); ?>" /> </article>
  </div>
</div>
<?php endforeach; ?> -->

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
        <tr class="descriptionAdmin">
          <td><?= $article->getTitle(); ?></td>
          <td><?= $article->getContent(); ?></td>
          <td><?= $article->getDate(); ?></td>
          <td><img src="<?= $imgPath.$article->getImg(); ?>" /></td>
          <td><a href="">Editer</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
  </table>
</div>
