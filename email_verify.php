<?php session_start();
include "config.php";
if(isset($_POST['verify'])){
$email=$_POST['email'];
//vérifier si cette personne est autorisé ou pas
$sql="select * from users where email='$email'";
$user=$cnx->query($sql)->fetch(PDO::FETCH_OBJ);
if(!empty($user)){
//generer un token
$token=password_hash(time(),PASSWORD_BCRYPT);
$_SESSION["token"]=$token;
$_SESSION["email"]=$email;

//send email to user
$to = $email;
$subject = 'reset password';
$message = 'Bonjour !<br>cliquez sur ce lien pour changer votre mot de passe : <a href="http://localhost:8989/php7g2/reset_password.php?token='.$token.'">changer mot de passe</a>';
$headers = 'From: webmaster@isims.com' . "\r\n" .
'Reply-To: webmaster@isims.com' . "\r\n" .
'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);
    header("location:forgotpassword.php?message=email envoyé. veuillez vérifié votre boite email!&type=success");
}else
header("location:index.php?message=Vérifier vos parametres de connexion!");
}else{
    header("location:index.php");
}
?>