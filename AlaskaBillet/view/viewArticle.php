<?php
$this->_t = "Mon Blog";
// Contient tout ce qui est visible a l'ecran
foreach ($articles as $article): ?>
<div class="article">
  <div class="bordure"></div>
  <h2><?= $article->getTitle() ?></h2>
  <time><?= $article->getDate() ?></time>
  <img src="<?= $imgPath.$article->getImg(); ?>" />
  <article><?= $article->getContent() ?> </article>

  <div class="comment">
    <form method="post" action="<?= HtmlHelper::getAction('addComment', 'Comment') ?>">
      <input type="hidden" name="articleId" value="<?= $article->getId(); ?>" />
      <input type="hidden" name="date"/>
       <input type="text" name="author" placeholder="Votre nom" /><br />
       <textarea name="content" placeholder="Votre commentaire..."></textarea><br />
       <button type="submit" name="CommentSubmit" >Ajouter</button>
    </form>
  </div>
  <div>

    Commentaires


    <?php foreach ($comments as $comment):
    if($comment->getArticleId() === $article->getId()){ ?>
      <div class="comments">
        <div class="boxAuthor"><?= $comment->getAuthor(); ?></div>
        <div class="boxDate"><?= $comment->getDate(); ?> </div>
        <div class="boxMsg"><?= $comment->getContent(); ?></div>

      </div>
    <?php } ?>
  <?php endforeach; ?>
  </div>
</div>
<?php endforeach; ?>
