<div class="container my-3">

    <h1>Accueil</h1>

    <div class="row">
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint ad excepturi deserunt aliquam quasi exercitationem possimus praesentium placeat, amet vero explicabo nesciunt consectetur numquam nulla veniam harum beatae. Quaerat, aperiam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum sit aliquam esse harum ullam. Animi enim, non et minima, optio iusto, sed ipsa eum culpa incidunt est id similique cumque.</p>
    </div>

    <div class="row">
        <h2>Les derniers articles</h2>
        <!-- récupérer les 3 derniers articles en base de données -->
    </div>
    <div class="row">
    <?php 
       
        $req = $db->query('SELECT * FROM spectacle ORDER BY id DESC LIMIT 3 ');
        $posts = $req->fetchALL();
        foreach ($posts as $post) { ?>
            <div class="col-sm-12 col-md-4 p-3 ">
            <div class="card" >
                <img src="../assets/img/<?= $post['photo'] ?>" class="card-img-top  w-25 ">
                <div class="card-body">
                    <h5 class="card-title"><?= $post['nom_spectacle'] ?></h5>
                    <p class="card-text"><?= substr($post['description'],0,100). '...' ?></p>
                    <a href="index.php?page=post&article=<?= $post ['id'] ?>" class="btn btn-secondary">Lire plus</a>
                </div>
            </div>
            </div>  
        <?php }    ?>
    </div>

    <div class="col-12 text-end mb-5">
        <a href="index.php?page=posts" class="btn btn-outline-dark">Tout les articles</a>
    </div>
    
   

</div>
