<?php include 'header.php'?>
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
 $sql = " SELECT `nam`, `apply`, `qual`, `year` FROM `candidates`";
    $result = $mysqli->query($sql);
    ?>
<div  style="margin-left:15% ">
<div class="container">
<table class="table">
  <thead>
    <tr>
      
      <th scope="col">Candidate</th>
      <th scope="col">Position</th>
      <th scope="col">Highest Qualification</th>
      <th scope="col">Passing Year</th>
    </tr>
  </thead>
  <tbody>
  <?php
                // LOOP TILL END OF DATA

                while($rows=$result->fetch_assoc())
                {
            ?>
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                    
                <td><?php echo $rows['nam'];?></td>
                <td><?php echo $rows['apply'];?></td>
                <td><?php echo $rows['qual'];?></td>
                <td><?php echo $rows['year'];?></td>
            </tr><?php
                }?>
            
    
  </tbody>
</table>
</div></div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>