<?php
include "security.php";
?>
<?php
include "config.php";
//select liste des voitures
$sql="select * from voitures";
$voitures=$cnx->query($sql)->fetchAll(PDO::FETCH_OBJ);
//ecrire le resultat dans un fichier csv
$file=fopen("modele.csv","w");
$contenu="";
foreach($voitures as $voiture){
$contenu.= $voiture->immat.";".$voiture->marque.";".$voiture->modele.";".$voiture->prix.",".$voiture->etat.";http://php7g2.test:8989/profils/".$voiture->photo."\r\n";
}
fputs($file,$contenu);

//telecharger le nouveau fichier csv
header('Content-type: text/csv');
$newname="voitures_".date("d-m-Y-His").".csv";
header("Content-Disposition: attachment; filename=".$newname);
readfile("modele.csv");
fclose($file);

