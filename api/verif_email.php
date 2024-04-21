<?php
$id_user=0;
if(isset($_POST['id_user']))
$id_user=$_POST['id_user'];

$cond="";
if($id_user>0){  
$cond=" and id_user!='$id_user'";
}

$email=$_POST['email'];
include "../config.php";
$sql="select * from users where email='$email' $cond";
$result=$cnx->query($sql)->fetch(PDO::FETCH_OBJ);
if(!empty($result))
echo true;
else
echo false;
?>