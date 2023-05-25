<?php
$servername = "localhost";
  $username = "root";
  $password = "";
  $database = "university";
  $conn = Mysqli_connect($servername,$username,$password,$database);
  if(!$conn){
      die("ERROR ".Mysqli_connect_error());
  }

$name = $password = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['name'])) || empty(trim($_POST['password']))){
        $err = '<span class="alert">*Please enter name + password</span>';
    }
    else{
        $name = trim($_POST['name']);
        $password = trim($_POST['password']);
    }


    if(empty($err))
    {
        $sql = "SELECT sno, name, password FROM `details` WHERE name = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $param_name);
        $param_name = $name;
        
        // Try to execute this statement
        if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt) == 1){
                mysqli_stmt_bind_result($stmt, $id, $name, $hashed_password);
                if(mysqli_stmt_fetch($stmt)){
                    if(password_verify($password, $hashed_password)){
                        // This means the password is correct. Allow the user to log in.
                        session_start();
                        $_SESSION["name"] = $name;
                        $_SESSION["loggedin"] = true;

                        // Redirect user to welcome page
                        header("location: welcomet.php");
                        exit();
                    }
                     else{
                         $err = '<span class="alert">*incorrect password</span>';
                     }
                }
            }
             else{
                 $err = '<span class="alert">*Incorrect name</span>';
             }
        }
        else{
            $err = '<span class="alert">Something went wrong. Please try again later.</span>';
        }
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
    <!-- Login Form -->
    <div class="container">
        <form action="logint.php" method="post">
            <h2>Please Login Here:</h2>
            <?php echo $err ?> <br>
            <input type="text" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entname">

            <input type="password" name="password" id="exampleInputPassword1" placeholder="Enter Password">

            <input type="submit" value="Login" name="Login">
        </form>
    </div>
</body>

</html>