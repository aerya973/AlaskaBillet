<div id="container">
  <h2>Liste des devinettes</h2>

  <?php foreach($devinette as $devinette): ?>
  <div class="question">
    <h3><?= $devinette->getName(); ?></h3>
    <?= $devinette->getQuestion(); ?>
    <hr/>
    <button>Voir la réponse</button>
    <button style="">
      <a href="edit.php?id=<?= $devinette->getId() ;?>">
      modifier
      </a>
    </button>
    <button class="deleteButton">
      <a href="delete.php?id=<?= $devinette->getId() ;?>">
      effacer
      </a>
    </button>
    <button class="showAnswer">
      Voir la reponse
    </button>
    <div class="divAnswer">
      <?php echo $devinette->getAnswer(); ?>
    </div>
  </div>
  <?php endforeach;?>
</div>
