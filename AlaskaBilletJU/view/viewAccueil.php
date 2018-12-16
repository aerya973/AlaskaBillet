<?php
$this->_t = "Mon Blog";
// Contient tout ce qui est visible a l'ecran
foreach ($articles as $article): ?>
<div class="article">
  <h2><?= $article->title() ?></h2>
  <time><?= $article->date() ?></time>
  <img src="<?= 'assets/'.$article->img(); ?>" />
  <article><?= $article->content() ?> </article>
</div>
<?php endforeach; ?>
