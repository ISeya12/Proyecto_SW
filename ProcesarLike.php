<?php 

require_once 'Config.php';

$id = $_POST['postId'];
$user = $_SESSION['username'];
//  Check credentials
$isValid = true;

//  Log user or ask again for his account
if($isValid){
    //añadir like BD
    Post::modificarLike($id,$user);
  
}

header('Location: Foro.php');
exit();


