<?php
$login = false;
$showError = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "university";
    $conn = Mysqli_connect($servername,$username,$password,$database);
    if(!$conn){
        die("ERROR ".Mysqli_connect_error());
    }
  $email = $_POST['email'];
  $password = $_POST['password'];
  $exists = false;  //this is used to confirom tha same username ke koi 2 id na ho.

  $sql = "SELECT * FROM `details` WHERE email = '$email' AND password = '$password'";
  $result = mysqli_query($conn, $sql);   
  $num = mysqli_num_rows($result);  //This 'mysqli_num_rows' will tell us that how many results are inserted in database 
    if ($num == 1){
        $login = true;   //this is used for alerting
         session_start();
         $_SESSION['loggedin'] = true;
        header("location: welcomet.php"); //This header is used to redirct whaich means login ke baad aap welcome page par chale jaayengai
    }
  else{
    $showError = "Invalid credentials";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login to xyz</title>
  <link rel="stylesheet" href="stylelogin.css">
</head>

<body>
  <?php
if($login){
    echo ' <div class="alert">Congratulations! You are successfully logged in. </div> ';
  }
  ?>   
  <?php
  if($showError){
    echo ' <div class="alert-danger">Error! '.$showError.'</div> ';
  }
  ?> 
  <!-- Login Form -->
  <div class="container">
    <form action="/projects/university signup/logint.php" method="POST">
      <h2>Login:</h2>
      <input type="email" name="email" placeholder="Email Address:">
      <input type="password" name="password" placeholder="password:">
      <br>
      <input type="submit" value="Login" name="Login">
    </form>
  </div>
</body>

</html>