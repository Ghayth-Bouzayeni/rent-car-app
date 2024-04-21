<?php
include "config.php";

$id_voiture=$_POST['id_voiture'];

$immat=$_POST['immat'];
$marque=$_POST['marque'];
$modele=$_POST['modele'];
$prix=$_POST['prix'];
$etat=$_POST['etat'];
$old_photo=$_POST['old_photo'];


$accept_type=["image/jpeg","image/jpg","image/png","image/gif","image/webp"];
$file_name=upload($_FILES['photo'],"profils",2048,$accept_type);



if(!empty($old_photo))
unlink("profils/".$old_photo);


$sql="update voitures set immat='$immat',marque='$marque',modele='$modele',prix='$prix',photo='$file_name',etat='$etat' where id_voiture='$id_voiture'";
if($cnx->exec($sql)>=0){

header("location:list_voiture.php?message=la modification est effectuée avec success!");
}else{
    echo "erreur de modification";
}
?>