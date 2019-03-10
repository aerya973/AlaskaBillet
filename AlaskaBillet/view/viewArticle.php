<h1><a href="<?=HtmlHelper::getAction('Articles', 'Article')?>" >Billet simple pour l'Alaska</a></h1>
  <div id="flexbox-wrapper">
  <?php $this->_t = "Chapitres";?>
  <!-- left column -->
  <div class="leftcolumn">
    <!-- articles -->
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
      <!-- Comments -->
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
                <button type="submit" name="signaler" class="signalCom">Signaler</button>
              </div>
            </form>
          </div>
          <div class="boxMsg"><?=$comment->getContent();?></div>
        </div>
        <?php } endforeach;?>
      </div>
      <!-- end comments -->
    </div>
    <?php endforeach;?>
    <!-- end articles -->
  </div>
  <!-- end leftcolumn -->

  <div class="rightcolumn">
    <div class="card">
      <div class="fakeimg"><img src="<?=$imgPath?>photoJeanForteroche.jpg" id="profilePic"/><br>
      </div>
      <p class="JF">Jean Forteroche <br> Ecrivain</p>
      <p class="JFtext">Aujourd’hui l’Alaska fait face à une crise climatique conséquente. Nous sommes conscients du problème, nous en entendons parler tous les jours. J’ai longtemps été curieux de voir cette évolution autrement qu’au travers d’un écran de télévision. Dix-sept heures de vol plus tard, j’aperçois de mes propres yeux cet étendue de glace. 
      A travers ce blog, je vous ferais pars de mes expériences et des témoignages des habitants.
      Je vous invite à vous rendre sur les différents réseaux sociaux pour suivre mes aventures et constater par vous-même la nouvelle réalité de l’Alaska.
      </p>
    </div>
    <div class="social">
      <div class="facebook"><img src="<?=$imgPath?>facebook.png"/><br></div>
      <div class="instagram"><img src="<?=$imgPath?>instagram.png"/><br></div>
      <div class="youtube"><img src="<?=$imgPath?>youtube.png"/><br></div>
    </div>
  </div>
</div>