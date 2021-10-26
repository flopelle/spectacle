<?php
require_once('database.php');
$photo= htmlentities($_POST['photo']);
$nom_salle= htmlentities($_POST['nom_salle']);
$nombre_place= (int)($_POST['nombre_place']);
$description= htmlentities($_POST['description']);
$nom_spectacle= htmlentities($_POST['nom_spectacle']);
$prix= (float)($_POST['prix']);
// var_dump($prix);
// die();
$date_spectacle=htmlentities($_POST['date_spectacle']);
$artiste= htmlentities($_POST['artiste']);
$lien= htmlentities($_POST['lien']);

$valide = true;

if(empty($nom_salle) || strlen($nom_salle) > 75){
    $valide = false;//verification du nom de la salle
}
if($nombre_place < 10 ||  $nombre_place > 99999){
    $valide = false;//verification du nombre de place
}
if(empty($description) > 65535){
    $valide = false;//verification de la description
}
if(strlen($date_spectacle) > 16){
    $valide = false;//verification de la description
}
if(empty($nom_spectacle) || strlen($nom_spectacle) > 100){
    $valide = false;//verification du nom du spectacle
}
if($prix < 0 || $prix > 999.99){
    $valide = false;//verification du prix
}
if(empty($artiste) || strlen($artiste) > 50){//
    $valide = false;//verification de l'artiste
}
if(empty($lien) || strlen($lien) > 255){//
    $valide = false;//verification du lien
}
if (isset($_FILES['photo']) && !empty($_FILES['photo']['name'])){
    $mimeType = [
        'images/png',
        'images/jpg',
        'images/jpeg'
    ];
    if(in_array($_FILES['photo']['type'], $mimeType) && $_FILES['photo']['size'] <= 200000){
        
    }
}
if ($valide === true) {
    $req = $db->prepare('INSERT INTO spectacle (nom_salle, nombre_place, description, date_spectacle, nom_spectacle, prix, artiste, lien, photo) VALUES (:nom_salle, :nombre_place, :description, :date_spectacle, :nom_spectacle, ;prix, :artiste, :lien, :photo,)');
    $req->bindParam(':spectacle', $spectacle, PDO::PARAM_STR);
    $req->bindParam(':nom_salle', $nom_salle, PDO::PARAM_STR);
    $req->bindParam(':nombre_place', $nombre_place, PDO::PARAM_STR);
    $req->bindParam(':description', $description, PDO::PARAM_STR);
    $req->bindParam(':date_spectacle', $date_spectacle, PDO::PARAM_STR);
    $req->bindParam(':nom_spectacle', $nom_spectacle, PDO::PARAM_INT);
    $req->bindParam(':prix', $prix, PDO::PARAM_STR);
    $req->bindParam(':artiste', $artiste, PDO::PARAM_STR);
    $req->bindParam(':lien', $lien, PDO::PARAM_STR);
    $req->bindParam(':photo', $photo, PDO::PARAM_STR);
    $req->execute();
}

?>