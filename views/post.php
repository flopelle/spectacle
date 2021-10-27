<?php
    $id = (int)$_GET['article'];
    $req = $db->query('SELECT  * FROM spectacle WHERE id=' . $id);
    $post = $req->fetch();
?>

<div class="container my-3">
    <div class="row">
        <div class="col-12">

            <h1><?= $post['nom_spectacle'] ?></h1>
            <p> <?= 'Avec' . $post['artiste'] . ', le' . $post['date_spectacle'] . ', à la salle : ' .  $post['nom_salle'] ?> </p>
        </div>
        <div class="col-sm-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3 my-3">
        <img src="../assets/img/<?= $post['photo']?>" class="w-100">
        </div>
        <div class="col-12">
            <p><?= $post['description'] ?></p>


        </div>

    </div>
</div>