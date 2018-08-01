<?php
  error_reporting(0); 

  $connection=mysqli_connect("localhost","root","","csv_db");
  if(!$connection)
  {
      die("Connection not established");
  }


function delete()
{

if(isset($_POST["submit"]))
{
    
    global $connection;
    $ID=$_POST["ID"];
    $query="DELETE FROM `tbl_name`  WHERE `ID`=$ID;";
    $result=mysqli_query($connection,$query);
  

if(!$result)
{
  die("Query failed". mysqli_error($connection));
}
else
{
  echo "<br>";
  echo "Record Deleted";
}
}
}

delete();


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simple Sidebar - Start Bootstrap Template</title> 
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <style type="text/css">
    .form 
{
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin:100px auto 100px;
  padding: 55px;
  text-align: left;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
</style>

</head>
<body style="background-color: #343a40;">
    <nav class="navbar navbar-expand-sm navbar-light mb-3 bg-light sticky-top">
        <div class="container">
          <a class="navbar-brand" href="#" ><img src="htdocs.png" width="70px"></a>
              <ul class="navbar-nav">
                  <li class="nav-item">
                      <a class="nav-link" href="read.php?page=1"><button class="btn btn-default">Home</button></a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="insert.php"><button class="btn btn-default">Create</button></a>
                  </li>
                       <li class="nav-item">
                      <a class="nav-link" href="logout.php"><button class="btn btn-danger">Logout</button></a>
                  </li>



              </ul>
          </div>
    </nav>

<div class="container">
<div class="col-sm-6" style="margin: auto;">
  <div class="form">
    <p class="text-center display-4">DELETE</p>
<form action="delete.php" method="post" enctype="multipart/form-data">

<div class="form-group">
    <select name="ID">
        <?php

        $query="SELECT * FROM tbl_name";
global $connection;
$result=mysqli_query($connection,$query);
if(!$result)
{
    die("Query failed". mysqli_error($connection));
}
$DEL=$_GET['DEL'];
while($row=mysqli_fetch_assoc($result))
        {
            $ID=$row["ID"];
            if($DEL!=$ID)
            {
                echo "<option value='$ID'>$ID</option>";
            }
            
            if($DEL==$ID)
            {   
                $Name=$row["Name"];
                $DOB=$row["DOB"];
                $Email=$row["Email"];
                $Phone=$row["Phone"];
            echo "<option value='$ID' selected>$ID</option>";
            }
                        //echo "<a href=edit2.php?ID=",$ID,">$ID</a>";
            //echo "<br>";
            ////$ID = $_GET['ID'];
            echo $ID;

        }

        ?>  
    </select>
  </div>
    <div class="form-group">
<label>Enter Name</label><input type="text" name="Name" class="form-control" value ="<?php echo $Name; ?>" required> 
</div>
<!-- DOB -->
<div class="form-group">
<label>Enter Date (MM-DD-YYYY)</label><input type="date" name="DOB" class="form-control" value ="<?php  $DOO=substr($DOB, 0,5);
    $D=substr($DOB,6);
    $DD =$D."-";
    $DDD=$DD.$DOO;
    echo $DDD;
    ?>" required> 
</div>
<div class="form-group">
<label>Enter Email</label><input type="text" name="Email" class="form-control" value ="<?php echo $Email; ?>" required> 
</div>
<div class="form-group">
<label>Enter Phone</label><input type="text" name="Phone" class="form-control" value ="<?php echo $Phone; ?>" required> 
</div>
    <div class="form-group">
            <input type="submit" name="submit" value="DELETE" class="btn btn-danger">
            

</div>

</form> 

    <br>
  </div>
</div>  
</div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
    
</body>
</html>

<?php 
$username="admin";
$password="admin";
session_start();
echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>";
if(isset($_SESSION['username']))
{
echo "";
}
else
{
  if(($_POST['username']==$username)&&($_POST['password']==$password))
  {
    $_SESSION['username']=$username;
    echo "<script>location.href='read.php'</script>";
  }
  else
  {
    echo "<script>alert('Login Failed !')</script>";
    echo "<script>location.href='loginnice.php'</script>";
  }
}
?>


