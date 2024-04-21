<?php
$immat=$_POST['immat'];
$marque=$_POST['marque'];
$modele=$_POST['modele'];
$prix=$_POST['prix'];



//
//PDO
//chane de connexion 

//exec() // insert, update, delete
//query() //select

include "config.php";

//upload photo de profil
$accept_type=["image/jpeg","image/jpg","image/png","image/gif","image/webp"];
$file_name=upload($_FILES['photo'],"profils",2048,$accept_type);


$sql="insert into voitures(immat,marque,modele,prix,photo) values('$immat','$marque','$modele','$prix','$file_name')";
$cnx->exec($sql);
//executer une redirection automatique avec php
header("location:forminscrit.php?message=1");
?>
