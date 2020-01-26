<?php
include 'config.php';
include 'Database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    
    <br><br>
    
    <a class="btn btn-primary btn-md pull-right" href="addUserView.php"><h4>Add new user</h4> </a>
    <a class="btn btn-primary btn-md pull-right" href="news.php"><h4>Newspaper</h4> </a>
    
  <h2>See All User List..</h2>
  
  <?php
  $db = new Database();
  $query = "Select *from user_list ";
  $read = $db->select($query);
  
  
  
  ?>
              
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
        <?php if($read){
     while ($row = $read->fetch_assoc()){
         ?>
      <tr>
        <td><?php echo $row['id'];  ?></td>
        <td><?php echo $row['name'];  ?></td>
        <td><?php echo $row['email'];  ?></td>
        <td><a href="update.php?id=<?php echo urlencode($row['id']); ?>">Edit</a></td>
        <td><a href="delete.php?id=<?php echo urlencode($row['id']); ?>">Delete</a></td>
      </tr>
    </tbody>
        <?php } }
        else{
            ?>
    <p>Data is not available...</p>
        <?php }
        ?>
  </table>
</div>

</body>
</html>
