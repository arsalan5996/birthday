
<?php
  error_reporting(0); 
  //checking whether connection is established or not
  $connection=mysqli_connect("localhost","root","","csv_db");
  if(!$connection)
  {
      die("Connection not established");
  }
    // We get the current Directory - htdocs
    $currentDir = dirname(getcwd());
    // We get the subdirectory inside the current directory
    $uploadDirectory = "/taskagain/images/";
    $errors = []; // Store all foreseen and unforseen errors here
    $fileExtensions = ['jpeg','jpg','png']; // Get all the file extensions
    $fileName = $_FILES['file']['name'];
    $fileSize = $_FILES['file']['size'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileType = $_FILES['file']['type'];
    $fileExtension = strtolower(end(explode('.',$fileName)));
    // We get the current file in the directory
    $uploadPath = $currentDir . $uploadDirectory . basename($fileName); 
    //We check if it's a jpeg or a jpg or png file
        if (! in_array($fileExtension,$fileExtensions))
        {
            $errors[] = "";
        }
    //We check if the file size is greater than 2MB
        if ($fileSize > 2000000) {
            $errors[] = "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
        }
    //We upload the file
        if (empty($errors)) {
            $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
    //We check if the file is uploaded or not
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

function update()
{
//We check if the submit button is set or not
    $IDD=$_GET['IDD'];
    
if(isset($_POST["submit"]))
{
    //It is the relative path without the filename of which is uploaded
    $uploadDirectory = "/taskagain/images/";
    $errors = []; // Store all foreseen and unforseen errors here
    $fileExtensions = ['jpeg','jpg','png']; // Get all the file extensions
    $fileName = $_FILES['file']['name'];
    $fileSize = $_FILES['file']['size'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileType = $_FILES['file']['type'];
    $fileExtension = strtolower(end(explode('.',$fileName)));
    //It is the relative path without the filename of which is uploaded
    $uploadPath = $uploadDirectory . basename($fileName); 
    global $connection;
    //uploaded ID we are giving to ID
    $ID=$_POST["ID"];
    $IDD=$_GET['IDD'];
    //uploaded Name we are giving to Name
    $Name=$_POST["Name"];
    //uploaded DOB we are giving to DDD with altercations in between because it is stored in yyyy/dd/mm but i want in mm/dd/yyyy
    $DOB=$_POST["DOB"];
    
    $DO=$_POST["DOB"]; 
    $DOO=substr($DO, 0,4);
    $D=substr($DO,5);
    $DD =$D."-";
    $DDD=$DD.$DOO;
    $Email=$_POST["Email"];

    $Phone=$_POST["Phone"];
    //We are inserting the values we are uploaded into the database
    $query="UPDATE `tbl_name` SET `Name`='$Name',`DOB`='$DDD',`imagesource`='$uploadPath',`Email`='$Email',`Phone`='$Phone'WHERE `ID`=$ID;";
    //We are executing the query
    $result=mysqli_query($connection,$query);
    
 
//We check if query is executed or not
if(!$result)
{
  die("Query failed". mysqli_error($connection));
}
else
{
  echo "<br>";
  echo "Record Updated";
}
}

}
$IDD=$_GET['IDD'];
 
update();


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
    .form {
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
    <!-- the width during which it becomes responsive -->
<div class="col-sm-6" style="margin: auto;">
<div class="form">
        <p class="text-center display-4">UPDATE</p>

<form action="edit2.php" method="post" enctype="multipart/form-data">
<!-- The ID's from the database are retreived and displayed in the form of options -->
<div class="form-group">
    <select name="ID">
        <?php
        // The query for retreiving the data
        $IDD=$_GET['IDD'];
echo $IDD;

        $query="SELECT * FROM tbl_name";
global $connection;
// Executing the query
$result=mysqli_query($connection,$query);
if(!$result)
{
    die("Query failed". mysqli_error($connection));
}

while($row=mysqli_fetch_assoc($result))
        {
            $ID=$row["ID"];
            if($ID!=$IDD)
            {   
            echo "<option value='$ID'>$ID</option>";
            }
            if($ID==$IDD)
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
<!-- Input form -->
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

<!-- File uploaded -->
        Upload a File:
        <input type="file" name="file" id="fileToUpload" required>
        <br>
        <br>
        
        <div class="form-group">
<!-- submitting the form -->
        <input type="submit" name="submit" value="UPDATE" class="btn btn-success">


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



