
<?php
 
 // Username is root
 $user = 'root';
 $password = '';
 $servername='localhost:3306';
 $database = 'job';
  
 
 $mysqli = new mysqli($servername, $user,
                 $password, $database);
  
 // Checking for connections
 if ($mysqli->connect_error) {
     die('Connect Error (' .
     $mysqli->connect_errno . ') '.
     $mysqli->connect_error);
 }
  
 // SQL query to select data from database
 
 
if(isset($_POST['job'])){
    $cname=$_POST['cname'];
    $position=$_POST['position'];
    $jobdescs=$_POST['jobdescs'];
    $skill=$_POST['skill'];
    $CTC=$_POST['CTC'];
  
    $sql="INSERT INTO `jobs`(`cname`, `position`, `jobdescs`, `skill`, `CTC`) VALUES ('$cname','$position','$jobdescs','$skill','$CTC') ";
    if(mysqli_query($mysqli,$sql)){
        echo "Records inserted successfully";
    }else{
        echo "ERROR: Could not able to executec $sql. " .mysqli_error($mysqli);
    }}
    $sql = " SELECT `cname`, `position`, `CTC` FROM `jobs`";
    $result = $mysqli->query($sql);
    $mysqli->close();
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<title>Document</title>
</head>
<body>
 <!-- Sidebar -->
<div class="w3-sidebar w3-grey w3-bar-block" style="width:15%">
  <a class=" active w3-bar-item" href="carrer.php">Jobs</ha>
  <a href="job.php" class=" w3-bar-item w3-button">Candidate Applied</a>
  <a href="#contact" class="w3-bar-item w3-button">Contact</a>
  <a href="#about" class="w3-bar-item w3-button">About</a>
</div> 
<div style="margin-left:15%">
<nav class="navbar navbar-expand-lg navbar-light w3-grey">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Admin Dashboard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
  </div>
</nav>
<div class="content" style="padding-left: 50px; padding-top: 50px;">
<p>
    
  <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    Post Job
  </button>
</p>
<div class="collapse" id="collapseExample">
  
<div class="card card-body">
    <form action="" method="POST">
  <div class="mb-3">
    <label for="Company Name" class="form-label">Company Name</label>
    <input type="text" class="form-control" id="" name="cname">
 </div>
  <div class="mb-3">
    <label for="exampleInputPosition" class="form-label">Position</label>
    <input type="text" class="form-control" id="exampleInputPosition" name="position">
  </div>
  <div class="mb-3">
    <label for="JobDesc" class="form-label">Job Description</label>
    <textarea name="jobdescs" cols="30" rows="10" class="form-control"></textarea>
  </div>
  <div class="mb-3">
    <label for="Skills" class="form-label">Skills</label>
    <input type="text" class="form-control" id="Skills" name="skill">
  </div>
  <div class="mb-3">
    <label for="CTC" class="form-label">CTC</label>
    <input type="text" class="form-control" id="CTC" name="CTC">
  </div>
  <button type="submit" class="btn btn-primary" name="job">Submit</button>
</form>
 </div>
 </div>

<table class="table">
  <thead>
    <tr>
      
      <th scope="col">Company Name</th>
      <th scope="col">Position</th>
      <th scope="col">CTC</th>
    </tr>
  </thead>
  
  
  
  <?php
                // LOOP TILL END OF DATA

                while($rows=$result->fetch_assoc())
                {
            ?>
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                    
                <td><?php echo $rows['cname'];?></td>
                <td><?php echo $rows['position'];?></td>
                <td><?php echo $rows['CTC'];?></td>
                
            </tr><?php
                }?>
            
    
    

    </tbody>  
  
</table>
</div>
</div> 


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>