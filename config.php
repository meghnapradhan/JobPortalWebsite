<?php
error_reporting(0);
$server='localhost';
$username='root';
$password='';
$database='jobs';

$conn= mysqli_connect($server,$username,$password,$database);

if($conn->connect_error){
    die("Connection failed:".$conn->connect_error);

}
echo"";
session_start();
if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];

    $query="SELECT * FROM users WHERE `email`='$email' AND `password`='$password'";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    
    if(mysqli_num_rows($result)==1){
        header("location: index.php");

    }
    else{
        $error="email id or password is wrong";
    }


}
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
if(isset($_POST['job'])){
    $cname=$_POST['cname']; 
    $position=$_POST['position'];
    $jobdescs=$_POST['jobdescs'];
    $skill=$_POST['skill'];
    $CTC=$_POST['CTC'];
  
    $sql="INSERT INTO `jobs`(`cname`, `position`, `jobdescs`, `skill`, `CTC`) VALUES ('$cname','$position','$jobdescs','$skill','$CTC') ";
    if(mysqli_query($conn,$sql)){
        echo "Records inserted successfully";
    }else{
        echo "ERROR: Could not able to executec $sql. " .mysqli_error($conn);
    }
}


?>