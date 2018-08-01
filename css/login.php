
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
<body  style="background-color: #9BC86A;">
    
<div class="container">
<div class="col-sm-6" style="margin: auto;">
<div class="form">
<p class="text-center display-4">LOGIN</p>
<form action="read.php" method="post" enctype="multipart/form-data">

<div class="form-group">
<label>Enter Name</label><input type="text" name="username" class="form-control"> 
</div>
<div class="form-group">
<label>Enter Password</label><input type="password" name="password" class="form-control"> 
</div>

        
        <div class="form-group">
        <input type="submit" name="submit" value="LOGIN" class="btn btn-success">
    	</div>

</div>
</form> 

    <br>
  
</div>  
</div>
</body>
</html>




