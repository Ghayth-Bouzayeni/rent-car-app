 <?php

try {
    $cnx = new PDO('mysql:host=localhost;dbname=prjt', "root", "");
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}


function verif($file_name,$folder){
    $photo_name=time().$file_name;
if(file_exists($folder."/".$photo_name)){
    verif($file_name,$folder);
}else{
    return $photo_name;
}

}


function upload($file,$folders,$max_size,$accept_type){
    //recupérer le nom du fichier
    $photo_name=$file['name'];
    //renomer le nom du fichier
    $photo_name=verif($photo_name,$folders);
    $error="";
    //verifier le type du fichier (accepter que des images de type png, gif, jpeg, jpg)
    if (!in_array($file["type"],$accept_type))
    {
        $error.="vérifier le type de votre fichier!<br>";
    }
    
    //vérifier la taille du fichier ne doit pas dépasser 2Mo
    if($file['size']/1024>$max_size){
        $error.="vérifier la taille de votre fichier!<br>";
    }
    
    //copier la copie temporaire dans le dossier /uploads/
    //jusqu'a php 7.x (deprecated)
    //move_uploaded_file($_FILES['photo']['name'],"uploads/$photo_name");
    //à partir de php8.x
    if(empty($error)){
    copy($file['tmp_name'],"$folders/$photo_name");
    echo "success d'upload!";
    }
    else
    echo $error."<a href='upload.html'><button>Réessayer</button></a>";
    
    return $photo_name;
    }
?>