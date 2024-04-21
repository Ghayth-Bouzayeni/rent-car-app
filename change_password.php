<?php session_start();
include "config.php";
if(isset($_POST['change'])){
$email=$_SESSION['email'];
$password=password_hash($_POST['password'],PASSWORD_BCRYPT);
//vérifier si cette personne est autorisé ou pas
$sql="update users set password='$password' where email='$email'";

$cnx->exec($sql);
unset($_SESSION['token']);
unset($_SESSION['email']);
header("location:index.php?message=Votre mot de passe modifié avec succes!&type=success");
}else{
    header("location:index.php");
}
?>