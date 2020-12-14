<h1>Nos articles</h1>
<div class="row">
<?php foreach ($articles as  $article) : ?>
    <?php $k = rand(1,10); $v= 'http://lorempixel.com/400/200/sports/'.$k.'/'?>
    <div class="col-md-3">
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="<?= $v ?>">
  <div class="card-body">
    <h5 class="card-title"><?= $article['title'] ?></h5>
    <small>Ecrit le <?= $article['created_at'] ?></small>
    <p class="card-text"><?= $article['introduction'] ?></p>
    <a href="index.php?controller=article&task=show&id=<?= $article['id'] ?>" class="card-link btn btn-primary">Lire la suite</a>
    <a href="index.php?controller=article&task=delete&id=<?= $article['id'] ?>"  onclick="return window.confirm(`Êtes vous sur de vouloir supprimer cet article ?!`)"  class="card-link btn btn-primary">Supprimer</a>
  </div>
</div>
</div>
<?php endforeach ?>
</div>