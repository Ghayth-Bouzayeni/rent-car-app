<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    date_default_timezone_set("America/New_York");
    echo date("L d/m/Y H:i:s a");
    echo "<br>";
    echo "today is ".date("Y/m/d");
    echo "<br>";
    echo "today is ".date("Y.m.d");
    echo "<br>";
    echo "today is ".date("l");
    echo "<hr>";
    echo "&copy; copyright 2018-".date("Y");
    echo "<br>";
    echo time();
    echo "<br>";
    echo date("d-m-Y H:i:s a",1176107529);

    //afficher le jour de ta naissance
    echo date("l",mktime(0,0,0,11,25,1980));

    
    $now=time();
$birthday=mktime(0,0,0,01,14,date("Y"));
   
if($birthday>=$now){
    $year=date("Y");
}else{
    $year=date("Y")+1;
} 

$birthday=mktime(0,0,0,01,14,$year);

$diff=$birthday-$now;
    $nb_jour=$diff/(60*60*24);
    echo ceil($nb_jour)." jours restant à votre anniversaire";
        ?>
</body>
</html>