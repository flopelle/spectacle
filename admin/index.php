<?php
    require_once('../config/database.php');
    $req = $db->query('SELECT * FROM spectacle ORDER BY id DESC');
    $posts = $req->fetchAll();
?>

<!DOCTYPE html>

<html lang="fr">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>espace administrateur</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

    </head>

    <body>

        <h1>Espace administrateur</h1>

        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>photo</th>
                    <th>nom_salle</th>
                    <th>nombre_place</th>
                    <th>nom_spectacle</th>
                    <th>prix</th>
                    <th>date_spectacle</th>
                    <th>artiste</th>
                    <th>lien</th>
                    <th>actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($posts as $post) { ?>
                        <tr>
                            <td><?= $post['id'] ?></td>
                            <td><?= $post['photo'] ?></td>
                            <td><?= $post['nom_salle'] ?></td>
                            <td><?= $post['nombre_place'] ?></td>
                            <td><?= $post['nom_spectacle'] ?></td>
                            <td><?= $post['prix'] ?></td>
                            <td><?= $post['date_spectacle'] ?></td>
                            <td><?= $post['artiste'] ?></td>
                            <td><?= $post['lien'] ?></td>
                            <td>
                                <a href="#"><i class="bi bi-pencil-square"></i></a>
                                <a href="treatment.php?delete=<?= $post['id'] ?>"><i class="bi bi-trash-fill"></i></a>
                            </td>
                        </tr>    
                    <?php }
                ?>
            </tbody>
        </table>

        <a href="form.php">Ajouter un article</a>
        
    </body>

</html>