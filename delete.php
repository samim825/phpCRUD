<?php
include 'config.php';
include 'Database.php';


 $id = $_GET['id'];
 $db = new Database();
?>

<?php

 
     
     $query = "Delete from user_list where id=$id";
     $deleteData = $db->delete($query);
     
     echo 'Go to  <a href="index.php">home</a>page';
     
 

?>

