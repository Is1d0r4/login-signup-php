<?php
include_once("server.php");
session_start();
if(isset($_SESSION['email'])) {
	header("Location: dashboard.php");
}
$error = false;
if (isset($_POST['reg_user'])) {
	$fname = mysqli_real_escape_string($conn, $_POST['first-name']);
    $lname = mysqli_real_escape_string($conn, $_POST['last-name']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);	
	if (!preg_match("/^[a-zA-Z ]+$/",$fname)) {
		$error = true;
		$fname_error = "First name must contain only alphabets and space";
	}
    if (!preg_match("/^[a-zA-Z ]+$/",$lname)) {
		$error = true;
		$lname_error = "Last name must contain only alphabets and space";
	}
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$error = true;
		$email_error = "Please Enter Valid Email ID";
	}
    
    $user_check_query = "SELECT * FROM user WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);
  
    if ($user) {
        if ($user['email'] === $email) {
            $error = true;
            $email_error = "There is already a user registered with this email!";
        }
    }
    
	if(strlen($password) < 6) {
		$error = true;
		$password_error = "Password must be minimum of 6 characters";
	}
	if (!$error) {
		mysqli_query($conn, "INSERT INTO user(first_name, last_name, email, password) VALUES('" . $fname . "','" . $lname . "', '" . $email . "', '" . md5($password) . "')");
        $_SESSION['email'] = $email;
        $_SESSION['timeout'] = time();
        header("Location: dashboard.php");
	}
}
?>

<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <link href="https://uploads-ssl.webflow.com/5bb62897dda2ebc49ac7f989/5bbb7a717d36223ac8e28e87_favicon-32x32.png" rel="shortcut icon" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="public/styles.css">
    

    <title>Sqoals | SignUp</title>
  </head>
  <body>
  
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 side-image d-none d-lg-block">
            </div>
            <div class="col-lg-7 my-auto mt-lg-auto text-center">
                <div class="content">
                    <img class="logo" src="images/Sqoals%20Full%20Logo%20Blue.png" alt="Company logo">
                    <h2 class=" main-title main-title-register">Geting started with Sqoals</h2>
                    <h4 class="subtitle subtitle-register">Create an account and start reaching your financial goals</h4>
                    <form class="mx-auto register-form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <input class="form-control" type="text" value="<?php if($error) echo $fname; ?>" name="first-name" placeholder="First Name" required>
                        <span class="text-danger"><?php if (isset($fname_error)) echo $fname_error; ?></span>
                        <input class="form-control" type="text" value="<?php if($error) echo $lname; ?>" name="last-name" placeholder="Last Name" required>
                        <span class="text-danger"><?php if (isset($lname_error)) echo $lname_error; ?></span>
                        <input class="form-control register-email-input" type="email" value="<?php if($error) echo $email; ?>" name="email" placeholder="Your email adress" required>
                        <span class="email-error-message text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
                        <input class="form-control" type="password" name="password" placeholder="Create a password" required>
                        <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
                        <button class="btn btn-register" type="submit" name="reg_user">Get Started</button>
                        <a href="#" class="police">By continuing you agree to our Terms of Use and Privacy Police</a>
                        <div class="link-login">
                            <h4 class="subtitle d-inline">Already sign up?</h4><a href="index.php">Log In</a>
                        </div>
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