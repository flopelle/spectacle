<?php
require_once('database.php');
//nettoyage des données
$photo= htmlentities($_POST['photo']);
$nom_salle= htmlentities($_POST['nom_salle']);
$nombre_place= (int)($_POST['nombre_place']);
$description= htmlentities($_POST['description']);
$nom_spectacle= htmlentities($_POST['nom_spectacle']);
$prix= ()($_POST['prix']);
$date_spectacle= (int)($_POST['date_spectacle']);
$artiste= htmlentities($_POST['artiste']);
$lien= htmlentities($_POST['lien']);

$valid = true;

if(empty($nom_salle) || strlen($nom_salle) > 75){
    $valide = false;//verification du nom de la salle
}
if(empty($artiste) || strlen($artiste) > 50){//
    $valide = false;//verification de l'artiste
}
if(empty($lien) || strlen($lien) > 255){//
    $valide = false;//verification du lien
}
if(empty($description) > 65535){
    $valide = false;//verification de la description
}
if(empty($nom_spectacle) || strlen($nom_spectacle) > 100){
    $valide = false;//verification du nom du spectacle
}

if($nombre_place < 10 ||  $nombre_place > 99999){
    $valide = false;//verification du nombre de place
}
if($prix < 0 ||  $prix > 999.99){
    $valide = false;//verification du prix
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

$req = $db->prepare('INSERT INTO  Logement(titre,adresse,ville,cp,surface,prix,photo,type,description,)VALUES (:titre,:adresse,:ville,:cp,:surface,;prix
:photo,:type,:description)');
$req->bindParam(':titre',$titre,PDO::PARAM_STR);
$req->bindParam(':adresse',$adresse,PDO::PARAM_STR);
$req->bindParam(':ville',$ville,PDO::PARAM_STR);
$req->bindParam(':cp',$cp,PDO::PARAM_STR);
$req->bindParam(':surface',$surface,PDO::PARAM_INT);
$req->bindParam(':prix',$prix,PDO::PARAM_STR);
$req->bindParam(':photo',$photo,PDO::PARAM_STR);
$req->bindParam(':type',$type,PDO::PARAM_STR);
$req->bindParam(':description',$description,PDO::PARAM_STR);
$req->execute();

?>