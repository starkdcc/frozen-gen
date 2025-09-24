<?php
ob_start();
if(file_exists("install.php") == "1"){
header('Location: install.php');
exit();
}
include 'inc/database-env.php';
include 'inc/captcha.php';

// Initialize default values
$website = 'Frozen Gen';
$favicon = '';

$result = mysqli_query($con, "SELECT * FROM `settings` LIMIT 1") or die(mysqli_error($con));
if ($result && mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)){
        $website = isset($row['website']) ? $row['website'] : 'Digi Tools';
        $favicon = isset($row['favicon']) ? $row['favicon'] : '';
    }
}
if (!isset($_SESSION)) { 
session_start(); 
}
if (isset($_SESSION['username'])) {
header('Location: index.php');
exit();
}
// Test Input Function
function testInput($data){
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
if(isset($_POST['first_last_name']) && isset($_POST['username']) &&  isset($_POST['password']) && isset($_POST['confirmpassword']) && isset($_POST['email'])){
// Name Verification
$first_last_name = isset($_POST['first_last_name']) ? testInput($_POST['first_last_name']) : '';
if (!preg_match("/^[a-zA-Z ]*$/",$first_last_name)) {
die("In first name field Only letters and white space allowed"); 
}
// Username Verification
$username = isset($_POST['username']) ? testInput($_POST['username']) : '';
if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
$username = mysqli_real_escape_string($con, $username);
die("In username field Only letters allowed"); 
}
$contains = "script";
if(isset($_POST['username']) && preg_match("/\b($contains)\b/", $username && $email))
{
die("We Dont Accept XSS Around Here");
}
$password = isset($_POST['password']) ? mysqli_real_escape_string($con, $_POST['password']) : '';
$confirmpassword = isset($_POST['confirmpassword']) ? mysqli_real_escape_string($con, $_POST['confirmpassword']) : '';
$email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
if($password != $confirmpassword){
die("The confirmation password was not equal to the password.");
}
if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
die("The email entered was not correct.");
}
$result = mysqli_query($con, "SELECT * FROM `users` WHERE `first_last_name` = '$first_last_name'") or die(mysqli_error($con));
if(mysqli_num_rows($result) > 0){
die("This name is already in out database please enter your name");
}
$result = mysqli_query($con, "SELECT * FROM `users` WHERE `username` = '$username'") or die(mysqli_error($con));
if(mysqli_num_rows($result) > 0){
die("This username already exists.");
}
$result = mysqli_query($con, "SELECT * FROM `users` WHERE `email` = '$email'") or die(mysqli_error($con));
if(mysqli_num_rows($result) > 0){
die("This email already exists.");
}
// Return Success - Valid Email

$hash = ( rand(0,100000) ); // Generate random 32 character hash and assign it to a local variable.
// Example output: f4552671f8909587cf485ea990207f3b

									// Email verification disabled for local development
									// In a production environment, you would need to configure a mail server
									// For now, we'll auto-activate accounts



$pass_encrypted = password_hash($password, PASSWORD_BCRYPT);
$ip = mysqli_real_escape_string($con, $_SERVER['REMOTE_ADDR']);
$date = date('Y-m-d');
mysqli_query($con, "INSERT INTO `users` (`first_last_name`, `username`, `password`, `email`, `date`, `ip`, `hash`, `active`,`profile_img`) VALUES ('$first_last_name', '$username', '$pass_encrypted', '$email', '$date', '$ip','$hash' ,'1' ,'https://nsmbhd.net/file/QxeiiK3ZDB06O6M2/501px-Artwork_-_Mario_Circle.svg.png')") or die(mysqli_error($con));
header("Location: thankyou.php");
exit();
}
?>
<!DOCTYPE html>
<html class="no-js">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>
      <?php echo $website ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="<?php echo $website ?>, Account, Premium, Cheap, Netflix, free, Spotify, Hulu, account gen, account generator, Best, Minecraft, Account Gen, Amazon, account, topaccgen, best account generator, cheap account generator, topaccgen generator">
    <meta name="description" content="<?php echo $website ?> is the best account generator on the market! Generate thousands of premium accounts for a small one time cost. Generate Netflix, Hulu, Minecraft, and much more Free to Sign Up!">
    <meta name="author" content="Best Account Generator">
    <link rel="shortcut icon" href="<?php echo $favicon ?>">
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="ll_files/bootstrap.css">
    <link rel="stylesheet" href="ll_files/icons.css">
    <link rel="stylesheet" type="text/css" href="ll_files/style.css">
    <link rel="stylesheet" type="text/css" href="ll_files/responsive.css">
    <link rel="stylesheet" type="text/css" href="ll_files/color.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
  </head>
  <body>
    <div class="pageloader" style="display: none;">
      <div class="loader">
        <div class="cssload-thecube"> 
          <div class="cssload-cube cssload-c1">
          </div> 
          <div class="cssload-cube cssload-c2">
          </div> 
          <div class="cssload-cube cssload-c4">
          </div> 
          <div class="cssload-cube cssload-c3">
          </div>
        </div>                                    
      </div>
    </div>
    <!-- Page Loader -->
    <style>
      button{
        margin:auto;
        display:block;
      }
    </style>
    <div class="login-page" style="height: 700px;">
      <div class="login-box">
        <center> 
          <h3 style="font-weight:bold;color:#6991f7;text-shadow: 0px 0px 7px #6991f7">
            <?php echo $website ?> - Register
          </h3>
        </center>
        <form class="form-signin" action="register.php" method="POST">
          <div class="row">
            <div class="form-group col-lg-6">
              <label>Username
              </label>
              <input type="text" id="username" name="username" class="form-control" placeholder="Username: Ex. MrModder" required autofocus>
            </div>
            <div class="form-group col-lg-6">
              <label>Full Name
              </label>
              <input type="text" id="first_last_name" name="first_last_name" class="form-control" placeholder="Full Name: Ex. Jon Doe" required>
            </div>
            <div class="form-group col-lg-6">
              <label>Email
              </label>
              <input type="text" id="email" name="email" class="form-control" placeholder="Email: Ex. admin@gmail.com" required>
            </div>
            <div class="form-group col-lg-6">
              <label>Password
              </label>
              <input type="password" id="password" name="password" class="form-control" placeholder="Password: Ex. {12;we#';rt]" required>
            </div>
            <div class="form-group col-lg-6">
              <label>Confirm Password
              </label>
              <input type="password" id="confirmpassword" name="confirmpassword" class="form-control" placeholder="Confirm Password: Ex. {12;we#';rt]" required>
            </div>
            <div class="form-group col-lg-6">
              <label>Captcha
              </label>
              <input type="text" class="form-control" name="captcha" placeholder="<?php getNumbers(); ?>" value="" maxlength="5" required>
            </div>
          </div>
          <div>
            <div class="checkbox checkbox-success">
              <input id="checkbox3" type="checkbox" required>
              <label for="checkbox3">
                I have read & accept the 
                <a href="tos.php"> T.O.S
                </a>
              </label>
            </div>
            <center>
              <button class="btn btn-primary">Register
              </button>
              <a class="btn btn-default" href="login.php">Login
              </a>
            </center>
          </div>
        </form>
      </div>
    </div>
    </div>
  </section>
<!-- End main content-->
</div>
<!-- Vendor scripts -->
<script src="vendor/pacejs/pace.min.js">
</script>
<script src="vendor/jquery/dist/jquery.min.js">
</script>
<script src="vendor/bootstrap/js/bootstrap.min.js">
</script>
<!-- App scripts -->
<script src="scripts/luna.js">
</script>
</body>
</html>		      
