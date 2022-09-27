<?php

$server='localhost';
$username='root';
$password='';
$database='job';

$conn= mysqli_connect($server,$username,$password,$database);

if($conn->connect_error){
    die("Connection failed:".$conn->connect_error);

}
echo"";
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $number=$_POST['phone'];
    $password=$_POST['password'];

    $sql="INSERT INTO `users`(`name`, `email`, `password`, `phone`) VALUES ('$name','$email','$password','$number')";
    
    if(mysqli_query($conn,$sql)){
        echo "Records inserted successfully";
    }else{
        echo "ERROR: Could not able to executec $sql. " .mysqli_error($conn);
    }


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
      body{
        background-image: url("img.jpg");
        background-size: cover;
        

      }
      form{
        background: rgba(255,255,255,0.6);
        margin-top: 3em;
        margin-left: 30em;
        margin-right: 10em;
        margin-bottom: 3em;
        padding: 30px;
        
        
      }
    </style>
    
    
    <title>Registration</title>
</head>
<body>
    <div class="container">
    <form method="POST">
    <div class="mb-3">
    <label for="exampleInputName" class="form-label">Full Name</label>
    <input type="text" class="form-control" id="exampleInputName" name="name" required> 
    </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputNumber" class="form-label">Phone Number</label>
    <input type="number" class="form-control" id="exampleInputNumber" name="phone" required>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="exampleInputPassword2" required>
  </div>
  
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  <br>
Already Registered?<a href="login.php">Login</a>
</form>

    </div>
</body>
</html>