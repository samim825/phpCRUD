<?php
include 'config.php';
include 'Database.php';


 $id = $_GET['id'];
 $db = new Database();
 $query = "Select *from user_list where id = $id";
 $getData = $db->select($query)->fetch_assoc();
 
 
 
    if(isset($_POST['submit'])){
    $name  = mysqli_real_escape_string($db->link, $_POST['name']);
    $email = mysqli_real_escape_string($db->link, $_POST['email']);
     
     
     
    if($name == '' || $email == ''){
    $error = "Field must not be Empty !!";
    }else{
    
           $query = "UPDATE user_list
                            SET
                            name  = '$name',
                            email = '$email'
                            where id = $id ";
           $update = $db->update($query);
    }
    
    
    echo 'Data successfully Updated. Please visit <a href="index.php"> home page </a>'; 
    }
 
 
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
  <h2>Add new User</h2>
  <form action="update.php?id=<?php echo $id; ?>" method="POST">
      <div class="form-group">
      <label for="name">Name :</label>
      <input type="text" class="form-control" id="name" value="<?php echo $getData['name'] ?>" name="name">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" value="<?php echo $getData['email'] ?>" name="email">
    </div>   
      <button type="submit" name="submit" class="btn btn-default">Submit</button>
    <button type="reset" class="btn btn-default">Reset</button>
  </form>
</div>

</body>
</html>
