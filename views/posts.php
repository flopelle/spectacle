<div class="container my-3">

<h1>Spectacles</h1>

<div class="row">
    <div class="col-12">
        <?php
            $req = $db->query('SELECT * FROM spectacle ORDER BY id DESC');
            $posts = $req->fetchALL();

        ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Photo</th>
                    <th>Date</th>
                    <th>Artiste</th>
                    <th>Lien</th>
                </tr>
            </thead>
            <tbody>
                <?php
                     $i = 1;
                    foreach ($posts as $post) {?>
                       <tr>
                           <td><?= $i ?></td>
                           <td><?= $post['nom_spectacle'] ?></td>
                           <td><?= substr($post['description'], 0, 200) ?></td>
                           <td><img src="../assets/img/ <?= $post['photo'] ?>"></td>
                           <td><?= $post['date_spectacle'] ?></td>
                           <td><?= $post['artiste'] ?></td>
                           <td><a href="index.php?page=post&article=<?= $post['id'] ?>"><i class="bi bi-eye-fill"></i></a></td>


                       </tr>

                    <?php 
                      $i++;
                    
                }
                ?>
            </tbody>

        </table>

    </div>

</div>
</div>