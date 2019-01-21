<?php
$this->_t = "Mon Blog";
// Contient tout ce qui est visible a l'ecran
foreach ($articles as $article): ?>
<div class="article">
  <h2><?= $article->getTitle() ?></h2>
  <time><?= $article->getDate() ?></time>
  <img src="<?= ASSETS.$article->getImg(); ?>" />
  <article><?= $article->getContent() ?> </article>
</div>
<?php endforeach; ?>
