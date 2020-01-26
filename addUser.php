<?php

include 'config.php';
include 'Database.php';

$db = new Database();
    if(isset($_POST['submit'])){
    $name  = mysqli_real_escape_string($db->link, $_POST['name']);
    $email = mysqli_real_escape_string($db->link, $_POST['email']);
     
     
     
    if($name == '' || $email == ''){
    $error = "Field must not be Empty !!";
    }else{
    
           $query = "INSERT INTO user_list(id,name, email) Values('id', '$name', '$email')";
           $create = $db->insert($query);
    }
    
    
    echo 'Data successfully inserted. Please visit <a href="index.php"> home page </a>'; 
    }
    



?>