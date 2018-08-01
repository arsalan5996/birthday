<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simple Sidebar - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <style type="text/css">
  .form
  {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 1060px;
  margin:100px auto 100px;
  padding: 45px;
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
 <?php 

  $connection=mysqli_connect("localhost","root","","csv_db");
  if(!$connection)
  {
      die("Connection not established");
  }
  
  
  if(isset($_GET["page"]))
  {
    $page=$_GET["page"];
  if($page=="" || $page=="1")
  {
    $page1=0;
  }
  else
  {
    $page1=($page*2)-2;
  }
}
  if(isset($page1))
  {
  $query="SELECT * FROM tbl_name limit $page1,2";
  $result=mysqli_query($connection,$query);
    echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>";
  echo "<div class='form'>";
         echo  "<p class='text-center display-4'>READ, UPDATE AND DELETE</p>";
         echo "<br>";

  echo "<table class='table '>
<tr style='background-color:#343a40'>
<th style='color:white;'>ID</th>
<th style='color:white;'>NAME</th>
<th style='color:white;'>DOB</th>
<th style='color:white;'>IMAGE</th>
<th style='color:white;'>EMAIL</th>
<th style='color:white;'>PHONE</th>
<th style='color:white;'>EDIT</th>
<th style='color:white;'>DELETE</th>


</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['ID'] . "</td>";
$IDD=$row['ID'];
$DEL=$row['ID'];
echo "<td>" . $row['Name'] . "</td>";
echo "<td>" . $row['DOB'] . "</td>";

$images=$row['imagesource'];
$image=substr($row['imagesource'],18);
echo "<td>" . "<img src='$images' width='50px'>" . "</td>";
echo "<td>" . $row['Email'] . "</td>";
echo "<td>" . $row['Phone'] . "</td>";
echo "<td>" . "<a href=edit2.php?IDD=",$IDD,"><button class='btn btn-info'>Edit</button></a>". "</td>";
echo "<td>" . "<a href=delete.php?DEL=",$DEL,"><button class='btn btn-danger'>Delete</button></a>". "</td>";

echo "</tr>";
}
echo "</table>";
  }
  


  $quer="SELECT * FROM tbl_name ";

$resul=mysqli_query($connection,$quer);
$count=mysqli_num_rows($resul);
$a=$count/2;
$a=ceil($a);

for($b=1;$b<=$a;$b++)
{
?><a href="read.php?page=<?php echo $b; ?>"><?php echo $b.' '.' '; ?></a><?php
}
echo "</div>";

  ?>
</div>
</body>
</html>
<?php 
$username='admin';
$password='admin';
session_start();
echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>";
if(isset($_SESSION['username']))
{
  echo "<div class='container'>";
  echo "<div class='col-sm-6'>";
  echo "<div class='form-group'>";

  echo "</div>";
  echo "</div>";
  echo "</div>";
}
else
{
  if(($_POST['username']==$username)&&($_POST['password']==$password))
  {
    $_SESSION['username']=$username;
    echo "<script>location.href='read.php?page=1'</script>";
  }
  else
  {
    echo "<script>alert('Login Failed !')</script>";
    echo "<script>location.href='loginnice.php'</script>";
  }
}
?>