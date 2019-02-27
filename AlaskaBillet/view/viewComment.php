<div style="overflow-x:auto;">
  <table class="tableComment">
    <thead>
      <tr>
        <th>Auteur</th>
        <th>Contenu</th>
        <th>Date</th>
        <th>Signalement</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach ($listeComm as $comment): ?>
        <tr>
          <td class="title"><?= $comment->getAuthor(); ?></td>
          <td><?= $comment->getContent(); ?></td>
          <td><?= $comment->getDate(); ?></td>
          <td>
            <div class="boxSignal">
              <p class="NbSignal"><?= $comment->getSignalement(); ?></p>
              <button class="deleteBtn" data-id="<?= $comment->getId(); ?>" >Supprimer</button>
            <div>
          </td>
        </tr>
        <?php endforeach; ?>

        <div id="myModal" class="modal">=
          <div class="modal-content">
            <span class="close" id="close">&times;</span>
            <form action="<?= HtmlHelper::getAction('deleteComment', 'Comment'); ?>" method="post">
              <input type="hidden" name="id" id="id"/>
              <p class="deleteMsg">Voulez-vous supprimer ce commentaire ? </p>
              <button name="deleteComm" class="deleteBouton">Supprimer</button>
            </form>
          </div>
        </div>
    </tbody>
  </table>
</div>
