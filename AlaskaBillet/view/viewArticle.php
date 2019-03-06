<h1><a href="<?=HtmlHelper::getAction('Articles', 'Article')?>" >Billet simple pour l'Alaska</a></h1>

<?php
$this->_t = "Chapitres";?>
<div>
  <div class="leftcolumn">
<?php foreach ($articles as $article): ?>
<div class="article">
  <div class="titreArticle">
    <h2><?=$article->getTitle()?></h2>
  </div>
  <img src="<?=$imgPath . $article->getImg();?>" />
  <div class="date">
    <time><?=$article->getDate()?></time>
  </div>
  <article><?=$article->getContent()?> </article>

  <div class="comment">
    <form method="post" action="<?=HtmlHelper::getAction('addComment', 'Comment')?>">
      <input type="hidden" name="articleId" value="<?=$article->getId();?>" />
      <input type="hidden" name="date"/>
       <input type="text" name="author" placeholder="Votre nom" /><br />
       <textarea name="content" placeholder="Votre commentaire..."></textarea><br />
       <button type="submit" name="CommentSubmit" class="addComm">Ajouter</button>
    </form>
  </div>
  <div>


  <?php foreach ($comments as $comment): if ($comment->getArticleId() === $article->getId()) {?>
	  <div class="comments">
	    <div class="authorDate">
	    <div class="boxAuthor"><?=$comment->getAuthor();?></div>
	    <div class="boxDate"><?=$comment->getDate();?> </div>
	  </div>
	      <div class="signalBox">
	      <form method="post" action="<?=HtmlHelper::getAction('signalComment', 'Comment')?>">
	        <input type="hidden" name="id" value="<?=$comment->getId();?>" />
	        <input type="hidden" name="nbSignal" value="<?=$comment->getSignalement();?>"/>
	        <div class="showSignal">
	          <div class="nmSignal"><p><?=$comment->getSignalement();?></p></div>
	          <div class="imgSignal"><img src="<?=$imgPath?>warning.png" alt="signaler commentaire" class="signaler"></div>
	          <button type="submit" name="signaler" class="signalCom">Signaler</button>
	        </div>
	      </form>
	    </div>
	    <div class="boxMsg"><?=$comment->getContent();?></div>
	  </div>

	  <?php }?>
	  <?php endforeach;?>
  </div>
  </div>
  <?php endforeach;?>
  </div>

  <div class="rightcolumn">
    <div class="card">
      <h2>About Me</h2>
      <div class="fakeimg" style="height:100px;">Image</div>
      <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
    </div>
    <div class="card">
      <h3>Popular Post</h3>
      <div class="fakeimg">Image</div><br>
      <div class="fakeimg">Image</div><br>
      <div class="fakeimg">Image</div>
    </div>
    <div class="card">
      <h3>Follow Me</h3>
      <p>Some text..</p>
    </div>
  </div>