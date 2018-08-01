<?php
  error_reporting(0); 

  $connection=mysqli_connect("localhost","root","","csv_db");
  if(!$connection)
  {
      die("Connection not established");
  }
    $currentDir = dirname(getcwd());
    
    $uploadDirectory = "/taskagain/images/";
    $errors = []; // Store all foreseen and unforseen errors here
    $fileExtensions = ['jpeg','jpg','png']; // Get all the file extensions
    $fileName = $_FILES['file']['name'];
    $fileSize = $_FILES['file']['size'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileType = $_FILES['file']['type'];
    $fileExtension = strtolower(end(explode('.',$fileName)));
    $uploadPath = $currentDir . $uploadDirectory . basename($fileName); 
    
        if (! in_array($fileExtension,$fileExtensions))
        {
            $errors[] = "";
        }

        if ($fileSize > 2000000) {
            $errors[] = "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
        }

        if (empty($errors)) {
            $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

            if ($didUpload) {
                echo "The file " . basename($fileName) . " has been uploaded";
            } else {
                echo "An error occurred somewhere. Try again or contact the admin";
            }
        } else {
            foreach ($errors as $error) {
                echo $error . "" . "\n";
            }
        }

function create()
{

if(isset($_POST["submit"]))
{
    
    $uploadDirectory = "/taskagain/images/";
    $errors = []; // Store all foreseen and unforseen errors here
    $fileExtensions = ['jpeg','jpg','png']; // Get all the file extensions
    $fileName = $_FILES['file']['name'];
    $fileSize = $_FILES['file']['size'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileType = $_FILES['file']['type'];
    $fileExtension = strtolower(end(explode('.',$fileName)));
    $uploadPath = $uploadDirectory . basename($fileName); 
    global $connection;
    $ID=$_POST["ID"];
    $Name=$_POST["Name"];
    $DOB=$_POST["DOB"];
    $DO=$_POST["DO"]; 
    $DOO=substr($DO, 0,4);
    $D=substr($DO,5);
    $DD =$D."-";
    $DDD=$DD.$DOO;
    $Phone=$_POST["Phone"];
    $Email=$_POST["Email"];
    $query ="INSERT INTO tbl_name(ID,Name,DOB,imagesource,Email,Phone) ";
    $query .="VALUES('$ID','$Name','$DDD','$uploadPath','$Email','$Phone')";
    $result=mysqli_query($connection,$query);
 

if(!$result)
{
  die("Query failed". mysqli_error($connection));
}
else
{
  echo "<br>";
  echo "Record Created";
}
}
}

create();


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
    <nav class="navbar navbar-expand-sm navbar-light mb-3 bg-white sticky-top">
        <div class="container">
          <a class="navbar-brand" href="#"><img src="htdocs.png" width="70px"></a>
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
    <p class="text-center display-4">CREATE</p>
<form action="insert.php" method="post" enctype="multipart/form-data">
<div class="form-group">
<label>Enter ID</label><input type="text" name="ID" class="form-control"> 
</div>
<div class="form-group">
<label>Enter Name</label><input type="text" name="Name" class="form-control"> 
</div>

<div class="form-group">
<label>Enter Date</label><input type="date" name="DO" class="form-control"> 
</div>
<div class="form-group">
<label>Enter Email</label><input type="Email" name="Email" class="form-control"> 
</div>
<div class="form-group">
<label>Enter Phone</label><input type="text" name="Phone" class="form-control"> 
</div>
        Upload a File:
        <input type="file" name="file" id="fileToUpload">
        <br>
        <br>
        <input type="submit" name="submit" value="Upload File Now" class="btn btn-primary">

        
</form> 

    <br>
</div>  
</div>  
</div>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
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