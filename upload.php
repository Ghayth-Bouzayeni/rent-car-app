<?php
include "config.php";

$accept_type=["image/jpeg","image/jpg","image/png","image/gif","image/webp"];
upload($_FILES['photo'],"uploads",2048,$accept_type);

?>