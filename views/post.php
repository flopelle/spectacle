<?php
$id = (int)$_GET['article'];
$req = $db->query('SELECT * FROM spectacle WHERE id=' . $id);
$post = $req->fetch();
?>

<div class="container my-3">
   <div class="row">
      <div class="col-12">
         <h1><?= $post['titre'] ?> </h1>
         <h3><?= $post['adresse'] ?> </h3>
      </div>

      <div class="col-sm-12 col-md-6 offset-md-3 col-lg-4 offset-leg-3 my-3">
         <img src="assets/img/posts/<?= $post['photo'] ?>"  class="w-75">

      </div>

      <div class="col-12">
         <p>
            <?= $post['description'] ?>
         </p>
      </div>
   </div>
</div>
