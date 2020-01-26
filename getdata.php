<?php
include 'config.php';
include 'Database.php';
$db = new Database();
$query = "Select *from user_list ";
$read = $db->select($query);
echo json_encode($read);
?>

