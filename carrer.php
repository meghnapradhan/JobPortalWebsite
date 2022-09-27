
<?php

$server='localhost:3306';
$username='root';
$password='';
$database='job';

$conn= mysqli_connect($server,$username,$password,$database);

if($conn->connect_error){
    die("Connection failed:".$conn->connect_error);

}
echo"";

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
}}
if(isset($_POST['applying'])){
  $nam=$_POST['nam'];
  $apply=$_POST['apply'];
  $qual=$_POST['qual'];
  $year=$_POST['year'];
  $sql="INSERT INTO `candidates`(`nam`, `apply`, `qual`, `year`) VALUES ('$nam','$apply','$qual','$year')";
  if(mysqli_query($conn,$sql)){
    echo "Records inserted successfully";
}else{
    echo "ERROR: Could not able to executec $sql. " .mysqli_error($conn);
}}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
      .jobs{
        border: 1px solid;
  padding: 10px;
  box-shadow: 5px 10px #888888;
      }
    </style>
    <title>Carrer</title>
</head>
<body>
    <div class="container-fluid" >

<div class="row">
  <div class="col-12">
    
  <div class="jumbotron jumbotron-fluid"style="background-image: url('img2.jpg'); background-size: cover ; height: 30vh" >
  <div class="container">
    <h1 class="display-4">Job Portal</h1>
    <p class="lead">Best Jobs available matching your skils</p>
  </div>
  </div>
  </div>  
</div>

<div class="row"><?php
$sql="SELECT cname,position,jobdescs,CTC,skill from jobs";
$result=mysqli_query($conn,$sql);
if($result->num_rows>0){
        while($rows=$result->fetch_assoc()){
          echo'
        <div class="col-md-4">
            <div class="jobs">
                
               
                    <h3 style="text-align: center;">'.$rows['position'].'</h3>
			 <h4 style="text-align: center;">'.$rows['cname'].'</h4>
                    <p style="color:black; text-align:justify;">'.$rows['jobdescs'].'</p>
                    <p style="color:black;"><b>Skills Required: </b>'.$rows['skill'].'</p>
				 <p style="color:black;"><b>CTC: </b>'.$rows['CTC'].'</p>
               <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" aria-expanded="false" aria-controls="collapseExample">
    			Apply Now
  		   </button>
        
		            
            </div>
            
        </div>';}}?>
        
    </div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apply for jobs</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Name</label>
            <input type="text" class="form-control" name="nam">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Apply for </label>
            <input type="text" class="form-control" name="apply">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Qualification </label>
            <input type="text" class="form-control" name="qual">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Year Passout</label>
            <input type="text" class="form-control" name="year">
          </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
        <button type="submit" class="btn btn-primary" name="applying">Apply</button>
      


        </form>
      </div>
      
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16./umd/popper.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>