<div class="container my-3">

    <h1>Articles</h1>

    <div class="row">
        <div class="col-12">
            <?php
                $req = $db->query('SELECT * FROM spectacle ORDER BY id DESC');
                $posts = $req->fetchAll();
            ?>
            <table class="table table-bordered table-dark">
                <thead>
                    <tr>
                    <th>id</th>
                    <th>photo</th>
                    <th>nom_salle</th>
                    <th>nombre_place</th>
                    <th>description</th>
                    <th>nom_spectacle</th>
                    <th>prix</th>
                    <th>date_spectacle</th>
                    <th>artiste</th>
                    <th>lien</th>
                   
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                        foreach ($sposts  as $post){ ?>
                            <tr>
                                <td>
                                    <?= $i   ?> 
                                </td>
                                <td>
                                     <img src="assets/img/posts/<?= $post['photo'] ?>" class="card-img-top"> 
                                </td>
                                 <td>
                                    <?= $post['nom_de_la_salle'] ?>
                                </td>
                                <td>
                                    <?= $post['nombre_de_place'] ?>
                                </td>
                                <td>
                                    <?= substr($post['description'],0,150).'...' ?>
                                </td>
                                <td>
                                    <?= $post['nom_spectacle'] ?>
                                </td>
                                <td>
                                    <?= $post['prix']. '€' ?>
                                </td>
                                <td>
                                     <?= $post['date_spectacle'] ?> 
                                </td>  
                                <td>
                                    <?= $post['artiste'] ?> 
                                </td>
                                <td>
                                    <?= $post['lien'] ?> 
                                </td>                  
                               
                                                     
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
</div>