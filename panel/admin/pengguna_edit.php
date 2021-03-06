<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}
include("check_access.php");
require( "../../process/config.php" );

$connection = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  $successMessage = "<script>alert('User succesfully updated');window.location = './pengguna.php';</script>";
  $failedMessage = "<script>alert('User update failed');</script>";
  $passwordNotMatchMessage = "<script>alert('Password not match');</script>";
  $fillFormMessage = "<script>alert('Please fill all the required fields');</script>";

  $id = $_GET['id'];
  $View_query = "SELECT * FROM `t142_akaun` where `f142idakaun`= '$id'";
  // echo $View_query;
  $ViewRS = $connection->query($View_query);
  $row = mysqli_fetch_assoc($ViewRS);
  



if (isset($_POST['submit'])) {
        $noid = $_POST['noid'];
        $level = $_POST['level'];
        $password = $_POST['pass'];
        $cpassword = $_POST['cpass'];
        

        if($noid == "" || $password == "" || $cpassword == ""){
          echo $fillFormMessage;
        }
        if($password == $cpassword){
          $md5Password=md5($password);
        }else{
          echo $passwordNotMatchMessage;
        }

      $Update__query="UPDATE `slkpkh2`.`t142_akaun` 
      SET `f142noID` = '$noid', `f142idlevel` = '$level', `f142password` = '$md5Password'
      WHERE `t142_akaun`.`f142idakaun` = $id";

      $UpdateRS = $connection->query($Update__query);

      if($UpdateRS){
        echo $successMessage;

        header('Location: '."./pengguna.php");
      }else{
        echo $failedMessage;
      }

}

?>



<!DOCTYPE html>
<html>
<head>
  <title>Administrator</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="../../css/vendor/bootstrap.min.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="../../css/flat-ui.min.css" rel="stylesheet">
    <link href="../../css/custom.css" rel="stylesheet">
</head>
<body>
<?php include('navbar-admin.php'); ?>
      <div class="container">
        <div class="row">
        <h3>Kemaskini Pengguna</h3>
        </div>
        <div class="row">
          <form method="post">
            <div class="col-xs-12 col-md-6">
             
          <div class="form-group">
            <label for="noid">Nombor Staff / tentera:</label>
            <input type="text" name="noid" value="<?php  echo $row['f142noID']; ?>" placeholder="Nombor tentera" class="form-control" />
            <label for="level">Peranan:</label>
            <select name="level" class="form-control" >
                  <option value="1">Administrator</option>
                  <option value="2">Pensyarah</option>
                  <option value="3">Ketua Batalion</option>
                  <option value="4">Dekan</option>
          </select>
            <label for="pass">Katalaluan:</label>
            <input type="password" name="pass" value="" placeholder="Katalaluan" class="form-control" />
            <label for="cpass">Sahkan katalaluan:</label>
            <input type="password" name="cpass" value="" placeholder="Sahkan katalaluan" class="form-control" />
            <hr>
            <input type="submit" name="submit" value="Kemaskini" class="btn btn-primary">


          </div>
        </div>
          </form>
        </div>
      </div>
 <!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
    <script src="../../js/vendor/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../js/vendor/video.js"></script>
    <script src="../../js/flat-ui.min.js"></script>
</body>
</html>