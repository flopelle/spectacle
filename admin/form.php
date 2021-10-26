<!DOCTYPE html>

<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SPECTACLE • Admin • Form</title>

</head>

    <body>

        <form> 
        <form action="treatment.php" method="post" enctype="multipart/form-data">
            <label for="photo">photo</label>
            <input type="file" name="img" accept="image/png, image/jpg, image/jpeg, image/jp2, image/webp" required>
            <br>

            <label for="nom_salle">nom de la salle</label>
            <input type="text" name="nom_salle" maxlength="75" required>
            <br>

            <label for="nombre_place">nombre de place</label>
            <input type="number" name="nombre_place" maxlength="5" required>
            <br>

            <label for="description">description</label>
            <textarea name="content" cols="30" rows="10" maxlength="65535"></textarea>
            <br>

            <label for="nom_spectacle">nom du spectacle</label>
            <input type="text" name="nom_spectacle" maxlength="100" required>
            <br>

            <label for="prix">Prix (€)</label>
            <input type="number" name="price" min="0" max="999,99" required>
            <br>

            <label for="date_spectacle">date</label>
            <input type="date" name="date_spectacle" required>
            <br>

            <label for="artiste">artiste</label>
            <input type="text" name="artiste" maxlength="50" required>
            <br>

            <label for="lien">lien</label>
            <input type="url" name="lien"><br>

            </select>
            <br>

            <input type="submit" value="Ajouter">
            


        </form>



    </body>

</html>