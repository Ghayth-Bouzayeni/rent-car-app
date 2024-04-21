
<?php
include "config.php";
$id_voiture=$_POST['id_voiture'];
$sql="select * from voitures where id_voiture=$id_voiture";
$voiture=$cnx->query($sql)->fetch(PDO::FETCH_OBJ);
//supprimer photo de profil
if(!empty($voitue->photo))
unlink("profils/".$voiture->photo);

$sql="delete from voitures where id_voiture=$id_voiture";
//retourne le nombre de lignes affecté
if($cnx->exec($sql)>0)
header("location:list_voiture.php?message=la suppression est effectuée avec success!");
?>
