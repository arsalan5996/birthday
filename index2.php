<?php
  $connection=mysqli_connect("localhost","root","","csv_db");
  if(!$connection)
  {
      die("Connection not established");
  }
    


$query="SELECT * FROM tbl_name";

$result=mysqli_query($connection,$query);

if(!$result)
{
  die("Query failed". mysqli_error($connection));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <title>Bootstrap Sandbox</title>
  <style>
 
    .card
    {
      margin: 0 auto;
    }
    .center
    {
      margin: 0 auto;
    }
  </style>

</head>
<body>
      <?php 
    echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>";
    while(($row=mysqli_fetch_array($result)))
    {
      $string=$row['DOB'];
      $string2=$row['DOB'];

      $string=substr("$string",0,6);
      $string2=substr("$string2",6,10);
      


      if(($string==date("m-d-"))&&(date("Y")>=$string2))
        {
          $Name=$row['Name'];
                    $imagesource=$row['imagesource'];
          $image=substr($imagesource,23,30);

                 echo " <div class='card' style='width:20rem'>
            <img class='card-img-top' src='$imagesource' alt='Card image cap'>
            <div class='card-body'>
                <h4 class='card-title text-center'>Happy Birthday</h4>

                <p class='card-text text-center'>May God Bless you and fulfill all your wishes</p>

                     <button class='btn btn-primary btn-block' data-toggle='modal' data-target='#myModal'>Read More</button>

    <!-- MODAL -->
    <div class='modal' id='myModal'>
      <div class='modal-dialog'>
        <div class='modal-content'>
          <div class='modal-header'>
            <h5 class='modal-title'>Happy Birthday $Name</h5>
            <button class='close' data-dismiss='modal'>&times;</button>
          </div>
          <div class='modal-body'>
            Birthdays are a new start, a fresh beginning and a time to pursue new endeavors with new goals. Move forward with confidence and courage. You are a very special person. May today and all of your days be amazing
          </div>
          <div class='modal-footer'>
            <button class='btn btn-secondary' data-dismiss='modal'>Close</button>
          </div>
        </div>
      </div>
    </div>

            </div>
        </div>";

         
        }
}
?>



  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>
