<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body>
<div class="container">
<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
    $name=htmlentities($_POST['fname']);
if(empty($name))
{
    echo "<div class='alert alert-danger'>Le champ nom est obligatoire!</div>";
}else{
    echo "<div class='alert alert-success'>notre nom est $name</script></div>";

}
}
?>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<label for="name" class="form-label">Prenom :</label>
<input class="form-control" type="text" name="prenom" id="name" required>
<input type="submit" name="submit" value="valider" class="btn btn-primary mt-3">
</form>

</div>
</body>
</html>