<?php

session_start();

require_once('../config/database.php');

if ($_SERVER['HTTP_REFERER'] == 'http://localhost:8888/DWWM13/spectacle/admin/form.php') { // vérifie qu'on vient bien du formulaire

// nettoyage des données    
$nom_salle = htmlentities($_POST['nom_salle']);
$nombre_place = (int)($_POST['nombre_place']);
$description = htmlentities($_POST['content']);
$nom_spectacle = htmlentities($_POST['nom_spectacle']);
$prix = (float)($_POST['price']);
// var_dump($prix);
// die();
$date_spectacle = htmlentities($_POST['date_spectacle']);
$artiste = htmlentities($_POST['artiste']);
$lien = htmlentities($_POST['lien']);

$errorMessage = '<p>Merci de vérifier les points suivants :</p>';
$valid = true;

if(empty($nom_salle) || strlen($nom_salle) > 75){
    $errorMessage .= '<p>- le champ "nom_salle" est obligatoire et doit comporter moins de 75 caractères.</p>';
    $valid = false;//verification du nom de la salle
}
if($nombre_place < 10 ||  $nombre_place > 99999){
    $errorMessage .= '<p>- le champ "nombre_place" est obligatoire et doit comporter un nombre en 10 et 99999.</p>';
    $valid = false;//verification du nombre de place
}
if(empty($description) > 65535){
    $errorMessage .= '<p>- le champ "description" est obligatoire et doit comporter moins de 65535 caractères.</p>';
    $valid = false;//verification de la description
}
if($prix < 0 || $prix > 999.99){
    $errorMessage .= '<p>- le champ "prix" doit comprendre une valeur entre 1 et 999.99.</p>';
    $valid = false;//verification du prix
}
if(strlen($date_spectacle) > 16){
    $errorMessage .= '<p>- le champ "date" doit comporter  16 caractères.</p>';
    $valid = false;//verification de la description
}
if(empty($nom_spectacle) || strlen($nom_spectacle) > 100){
    $errorMessage .= '<p>- le champ "nom_spectacle" est obligatoire et doit comporter moins de 100 caractères.</p>';
    $valid = false;//verification du nom du spectacle
}

if(empty($artiste) || strlen($artiste) > 50){
    $errorMessage .= '<p>- le champ "nom_spectacle" est obligatoire et doit comporter moins de 100 caractères.</p>';
    $valid = false;//verification de l'artiste
}
if(empty($lien) || strlen($lien) > 255){
    $errorMessage .= '<p>- le champ "nom_spectacle" est obligatoire et doit comporter moins de 255 caractères.</p>';
    $valid = false;//verification du lien
}
// vérification de l'image
$authorizedFormats = [
    'image/png',
    'image/jpg',
    'image/jpeg',
    'image/jp2',
    'image/webp'
];

if (empty($_FILES['photo']['name']) || $_FILES['photo']['size'] > 2000000 || !in_array($_FILES['photo']['type'], $authorizedFormats)) {
    $errorMessage .= '<p>- l\'image est obligatoire, ne doit pas dépasser 2 Mo et doit être au format PNG, JPG, JPEG, JP2 ou WEBP.</p>';
    $valid = false;
} else {
    $timestamp = time(); // récupère le nombre de secondes écoulées depuis le 1er janvier 1970
    $format = strchr($_FILES['photo']['name'], '.'); // récupère tout ce qui se trouve après le point (png, jpg, ...)
    $imgName = $timestamp . $format; // crée le nouveau nom d'image
}

if ($valid === true) {
    $req = $db->prepare('INSERT INTO spectacle (nom_salle, nombre_place, description, date_spectacle, nom_spectacle, prix, artiste, lien, photo) VALUES (:nom_salle, :nombre_place, :description, :date_spectacle, :nom_spectacle, :prix, :artiste, :lien, :photo)');
    $req->bindParam(':nom_salle', $nom_salle, PDO::PARAM_STR);
    $req->bindParam(':nombre_place', $nombre_place, PDO::PARAM_STR);
    $req->bindParam(':description', $description, PDO::PARAM_STR);
    $req->bindParam(':date_spectacle', $date_spectacle, PDO::PARAM_STR);
    $req->bindParam(':nom_spectacle', $nom_spectacle, PDO::PARAM_INT);
    $req->bindParam(':prix', $prix, PDO::PARAM_STR);
    $req->bindParam(':artiste', $artiste, PDO::PARAM_STR);
    $req->bindParam(':lien', $lien, PDO::PARAM_STR);
    $req->bindParam(':photo', $imgName, PDO::PARAM_STR);
    $req->execute(); // éxécute la requête
    if (!file_exists('../assets/img/')) { // vérifie si le dossier "photos" existe
        mkdir('photos/'); // crée le dossier "photos"
    }
    move_uploaded_file($_FILES['photo']['tmp_name'], '../assets/img' . $imgName);
    $_SESSION['notification'] = 'le spectacle a bien été ajouté';
    header('Location: index.php'); // redirection
} else {
    $_SESSION['notification'] = $errorMessage;
    $_SESSION['form'] = [
        'nom_salle' => $nom_salle,
        'nombre_place' => $nombre_place,
        'description'=> $description,
        'date_spectacle' => $date_spectacle,
        'prix' => $prix,
        'artiste' => $artiste,
        'lien' => $lien,
    ];
    header('Location: form.php');// redirection
}
} elseif (isset($_GET['delete']) && !empty($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $req = $db->query('SELECT photo FROM spectacle WHERE id=' . $id); // récupère le nom de l'image
    $oldImg = $req->fetch();
    if (file_exists('../assets/images/' . $oldImg['img'])) { // vérifie que le fichier existe
        unlink('../assets/images/' . $oldImg['img']); // supprime l'image du dossier local
    }
    $reqDelete = $db->query('DELETE FROM spectacle WHERE id=' . $id); // supprime les données en bdd
    $_SESSION['notification'] = 'le spectacle a été bien supprimé';
    header('Location: index.php'); // redirection
}

?>