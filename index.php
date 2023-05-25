<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "university";
$conn = Mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    die("ERROR ".Mysqli_connect_error());
}

$name = $email = $password = $confirm_password = "";
$name_err = $email_err = $password_err = $confirm_password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

if(empty(trim($_POST["name"]))){
    $name_err = '<span class="alert">*Name cannot be blank* <br></span>';
}else{
    $sql = "SELECT sno FROM details WHERE `name` = ?";
    $stmt = mysqli_prepare($conn, $sql);
    if($stmt)
    {
        mysqli_stmt_bind_param($stmt, "s", $param_name);

        $param_name = trim($_POST['name']);

        if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt) == 1)
            {
                $name_err = '<span class="alert">*This name is already taken*<br></span>'; 
            }
            else{
                $name = trim($_POST['name']);
            }
        }
        else{
            echo '<span class="alert">*Something went wrong*</span>';
        }
    }
}



    if(empty(trim($_POST["email"]))){
        $email_err = '<span class="alert">*Email cannot be blank* <br></span>';
    }
    else{
        $sql = "SELECT sno FROM details WHERE email = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            $param_email = trim($_POST['email']);

            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $email_err = '<span class="alert">*This Email is already taken*<br></span>'; 
                }
                else{
                    $email = trim($_POST['email']);
                }
            }
            else{
                echo '<span class="alert">*Something went wrong*</span>';
            }
        }
    }

if(empty(trim($_POST['password']))){
    $password_err = '<span class="alert">*Password cannot be blank* <br></span>';
}
elseif(strlen(trim($_POST['password'])) < 2){
    $password_err = '<span class="alert">*Password cannot be less than 2 characters* <br></span>';
}
else{
    $password = trim($_POST['password']);
}

if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
    $confirm_password_err = '<span class="alert">*Passwords should match* <br></span>';
}

if (empty($name_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err))
{
    $sql = "INSERT INTO `details` (`name`, `email`, `password`) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_email, $param_password);

              $param_name = $name;
        $param_email = $email;
        $param_password = password_hash($password, PASSWORD_DEFAULT);

        if (mysqli_stmt_execute($stmt))
        {
            session_start();
             $_SESSION["name"] = $name;
             $_SESSION["loggedin"] = true;

             header("location: welcomet.php");
            exit();
        }
        else {
            echo "Error: " . mysqli_error($conn); 
        }
    }
    mysqli_stmt_close($stmt);
}
 mysqli_close($conn);
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
            <p><b>1.</b>To access <b><u>XYZ University</u></b> exclusive features Join our community today by signing up
                or
                logging in on our homepage! <br> <b>2.</b>Unlock exclusive content and features by creating an account
                or
                logging in. Join now. <br> <b>3.</b>Ready to explore our website to the fullest? Sign up or log in to
                gain
                access to all our amazing features. <br> <b>4.</b>Become a member and enjoy a personalized experience on
                our
                website. Sign up or log in now. <br> <b>5.</b>Don't miss out on all the perks of being a member! Sign up
                or log
                in to our homepage and start exploring.
            </p>
        </div>

        <div class="sign">
          <form action="index.php" method="post">
          <h2>sign in:</h2>
            <input type="text" name="name" id="inputname4" placeholder="Username">
            <?php echo $name_err ?> 

            <input type="email" name="email" id="inputemail4" placeholder="email">
            <?php echo $email_err ?> 

            <input type="password" name="password" id="inputPassword4" placeholder="Password"> 
            <?php echo $password_err ?> 

            <input type="password" name="confirm_password" id="inputPassword"
                placeholder="Confirm Password"> 
            <?php echo $confirm_password_err ?> 

            <input type="submit" value="sign up" name="submit">
            <p class="link">Already Having Account <a href="logint.php" class="linka">Log in</a></p>
        </form>
    </div>
    </div>
</body>
</html>