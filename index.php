<?php
$showAlert = false;
$showError1 = false;
$showError2 = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "university";
  $conn = Mysqli_connect($servername,$username,$password,$database);
  if(!$conn){
      die("ERROR ".Mysqli_connect_error());
  }
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
  //This is used to confirom tha same email ke koi 2 id na ho.
  //Check wheather same email exists:-
  $existSql = "SELECT * FROM `details` WHERE email = '$email'"; 
  $result = mysqli_query($conn, $existSql);
  $numExistRows = mysqli_num_rows($result);
  if($numExistRows > 0){
      $showError1 = "Email already Exists";
  }
  else { //check for password match
      if(($password == $cpassword)){
       $sql = "INSERT INTO `details` (`name`, `email`, `password`) VALUES ('$name', '$email', '$password');";
       $result = mysqli_query($conn, $sql);   
         if ($result){
          $showAlert = true;   //this is used for alerting
        }
      }
   else{
     $showError2 = "Your password does not match";
    }
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <title> sign in XYZ University</title>
  <link rel="stylesheet" href="styleindex.css">
</head>

<body>

  <h1>Welcome! To XYZ University</h1>
  <div class="container">
    <div class="msg">
      <p><b>1.</b>To access <b><u>XYZ University</u></b> exclusive features Join our community today by signing up or
        logging in on our homepage! <br> <b>2.</b>Unlock exclusive content and features by creating an account or
        logging in. Join now. <br> <b>3.</b>Ready to explore our website to the fullest? Sign up or log in to gain
        access to all our amazing features. <br> <b>4.</b>Become a member and enjoy a personalized experience on our
        website. Sign up or log in now. <br> <b>5.</b>Don't miss out on all the perks of being a member! Sign up or log
        in to our homepage and start exploring.</p>
    </div>

    <div class="sign">
    <?php
      if($showAlert){
      echo ' <div class="alert">Success! Your account have been created.Now you can login.</div> ';
     }
    ?>

      <form action="index.php" method="POST">
        <h2>sign in:</h2>
          <input type="text"  name="name" placeholder="Name:">
          <input type="email" name="email" placeholder="Email:">
          <?php
            if($showError1){
             echo ' <div class="alert-danger">Error! '.$showError1.' </div> ';
            }
          ?>
          <input type="password" name="password" placeholder="Password:">
          <input type="password" name="cpassword" placeholder="Confirm Password:">
          <?php
            if($showError2){
             echo ' <div class="alert-danger">Error! '.$showError2.' </div> ';
            }
          ?>
          <input type="submit" value="sign up" name="submit">
          <p class="link">Already Having Account <a href="logint.php" class="linka">Log in</a></p>
      </form>
    </div>
  </div>
</body>

</html>