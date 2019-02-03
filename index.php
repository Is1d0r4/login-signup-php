<?php
session_start();
include_once("server.php");
if(isset($_SESSION['email'])!="") {
	header("Location: dashboard.php");
}
if (isset($_POST['login_user'])) {
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$result = mysqli_query($conn, "SELECT * FROM user WHERE email = '" . $email. "' and password = '" . md5($password). "'");
	if (mysqli_num_rows($result) == 1) {
		$_SESSION['email'] = $email;
        $_SESSION['timeout'] = time();
		header("Location: dashboard.php");
	} else {
		$error_message = "Incorrect Email or Password!";
	}  
}
?>

<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <link rel="stylesheet" type="text/css" href="public/styles.css">
    <link href="https://uploads-ssl.webflow.com/5bb62897dda2ebc49ac7f989/5bbb7a717d36223ac8e28e87_favicon-32x32.png" rel="shortcut icon" type="image/x-icon">

    <title>Sqoals | LogIn</title>
  </head>
  <body>
  
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 side-image d-none d-lg-block">
            </div>
            <div class="col-lg-7 my-auto text-center">
                <div class="content">
                    <img class="logo" src="images/Sqoals%20Full%20Logo%20Blue.png" alt="Company logo">
                    <h2 class="main-title main-title-login">Log in to Sqoals</h2>
                    <h4 class="subtitle subtitle-login">Welcome back. We're glad to see you again!</h4>
                    <span class="text-danger"><?php if (isset($error_message)) { echo $error_message; } ?></span>
                    <form class="mx-auto login-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <input class="form-control" type="email" name="email" placeholder="Email Adress" required>
                        <a href="#" class="forgot-pass">Forgot password?</a>
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                        <button class="btn btn-login" type="submit" name="login_user">Sign in</button>
                        <a href="register.php">Dont't have an account?</a>
                    </form>
                </div>           
            </div>
        </div>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>