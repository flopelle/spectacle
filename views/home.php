<div class="container my-3">

    <h1>Accueil</h1>

    <div class="row">
        <p>Découvrez les prochains spectacles à venir ! 
            Entrez dans l’univers hypnotique de Messmer, admirez la magie des spectacles et laissez-vous bluffer par des numéros de mentalisme ou d’illusionnisme. 
            Vous aimez les paillettes, le sensationnel et les feux des projecteurs ? 
            Découvrez les grands spectacles qui vont marquer la saison ! 
            Retrouvez les spectacles les plus époustouflants du moment et vivez des soirées inoubliables. 
            Les paillettes et le glamour du Lido et du Crazy Horse, la fantaisie du Cabaret Michou ou encore les coulisses du Moulin Rouge sont à découvrir sans plus attendre ! 
            Grâce à cette sélection spectaculaire, entrez dans un univers de poésie, de rêves et de magie où les artistes se surpassent pour vous éblouir ! </p>
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
                <img src="assets/img/<?= $post['photo'] ?>" class="card-img-top">
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
