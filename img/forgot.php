
<?php
include('database/dbconfig.php');
session_start();
$error = array();

include('code/mail.php');

?>

<?php
$mode = "enter_email";
	if(isset($_GET['mode'])){
		$mode = $_GET['mode'];
	}

	//something is posted
	if(count($_POST) > 0){

		switch ($mode) {
			case 'enter_email':
				// code...
				$email = $_POST['email'];
				//validate email
				if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
					$error[] = "Please enter a valid email";
				}elseif(!valid_email($email)){
					$error[] = "That email was not found";
				}else{

					$_SESSION['forgot']['email'] = $email;
					send_email($email);
					
					header("Location: forgot.php?mode=enter_code");
					die;
				}
				break;

			case 'enter_code':
				// code...
				$code = $_POST['code'];
				$result = is_code_correct($code);
				
				if($result == "the code is correct"){

					$_SESSION['forgot']['code'] = $code;
					header("Location: forgot.php?mode=enter_password");
					die;
				}else{
					$error[] = $result;
				}
				break;

			case 'enter_password':
				// code...
				$password = $_POST['password'];
				$password2 = $_POST['password2'];

				if($password !== $password2){
					$error[] = "Passwords do not match";
				}elseif(!isset($_SESSION['forgot']['email']) || !isset($_SESSION['forgot']['code'])){
					header("Location: forgot.php");
					die;
				}else{
					
					save_password($password);
					if(isset($_SESSION['forgot'])){
						unset($_SESSION['forgot']);
					}
					$_SESSION['message'] = ' Change Password Successful!';
					$_SESSION['success'] = 'success';
					header("Location: login.php");
					die;
				}
				break;
			
			default:
				// code...
				break;
		}
	}

	function send_email($email){
		
		global $conn;

		$expire = time() + (60*60);
		$code = rand(10000,99999);
		$email = addslashes($email);

		$query = "INSERT INTO codes (email,code,expire) VALUE ('$email','$code','$expire')";
		mysqli_query($conn,$query);

		//send email here
		send_mail($email,'Password reset',"Your code is " . $code . "<br>" . " 	Reminder: Your code will expired in one hour. ");
	}
	
	function save_password($password){
		
		global $conn;

		$password = password_hash($password, PASSWORD_DEFAULT);
		$email = addslashes($_SESSION['forgot']['email']);

		$query = "UPDATE users SET password = '$password' WHERE email = '$email' LIMIT 1";
		mysqli_query($conn,$query);

	}
	
	function valid_email($email){
		global $conn;

		$email = addslashes($email);

		$query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";		
		$result = mysqli_query($conn,$query);
		if($result){
			if(mysqli_num_rows($result) > 0)
			{
				return true;
 			}
		}

		return false;

	}

	function is_code_correct($code){
		global $conn;

		$code = addslashes($code);
		$expire = time();
		$email = addslashes($_SESSION['forgot']['email']);

		$query = "SELECT * FROM codes WHERE code = '$code' && email = '$email' ORDER BY id DESC LIMIT 1";
		$result = mysqli_query($conn,$query);
		if($result){
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_assoc($result);
				if($row['expire'] > $expire){

					return "the code is correct";
				}else{
					return "the code is expired";
				}
			}else{
				return "the code is incorrect";
			}
		}

		return "the code is incorrect";
	}

	
?>

<!DOCTYPE html>
<html>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Clearance Automate - Forgot Password</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/Brgy-logo.png" />
  <script src="https://kit.fontawesome.com/89c7bdb9b2.js" crossorigin="anonymous"></script>
</head>
<body>
<style type="text/css">
/* 	
	*{
		font-family: tahoma;
		font-size: 14px;
	}

	form{
		width: 100%;
		max-width: 400px;
		margin: auto;
		border: ;
		padding: 20px;
	}

	.textbox{
		padding: 15px;
		width: 320px;
	}
	.ti-user{
		height: 25px;
		width: 18.0px;
	} */
</style>

		<?php 

			switch ($mode) {
				case 'enter_email':
					// code...
					?>
                    <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo text-center">
			  <img src="images/logo.png" alt="logo" class="img-fluid" style="max-width: 100%; height: auto; width: 23rem;">
              </div>
			  	<h3 class="font-weight-strong text-center">FORGOT PASSWORD</h3>
				<h5 class="text-primary text-center">Enter your email below</h5>
              
              <?php
                if(isset($_SESSION['status']) && $_SESSION['status'] !='')
                {
                ?>
              <div class="alert alert-danger" role="alert">
                <a class="close" data-dismiss="alert" href="#"></a>Incorrect Username or Password!
              </div>
              <?php
               unset($_SESSION['status']);
              }
              ?>
						<form  class="pt-3" method="post" action="forgot.php?mode=enter_email"> 

							<span style="font-size: 12px;color:red;">
							<?php 
								foreach ($error as $err) {
									// code...
									echo $err . "<br>";
								}
							?>
                          
					<div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary text-white"><i class="ti-user"></i></span>
                    </div>
                    <input type="email" class="form-control form-control-lg" name="email" placeholder="Email" autocomplete="off" required>
                  </div>
                </div>   
					<div class=" d-flex justify-content-around  mb-2 mr-sm-2">
					<div class="my-2 d-flex"><a data-toggle="tooltip" data-placement="bottom" title="Back to Log in" class="btn btn-primary" style="width: 135px;" href="login.php">Login</a></div>
					<span></span>
					<div class="my-2 d-flex"><button data-toggle="tooltip" data-placement="bottom" title="Click to Proceed" type="submit" class="btn btn-success" style="width: 135px; ">Next</button></div>
							</div>
						</form>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
						</div>

						
					<?php				
					break;

				case 'enter_code':
					// code...
					?>

<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo text-center">
			  <img src="images/logo.png" alt="logo" class="img-fluid" style="max-width: 100%; height: auto; width: 23rem;">
              </div>
			  				<h3 class="font-weight-strong text-center">FORGOT PASSWORD</h3>
							<h5 class="text-primary text-center">Enter code below</h5>
						<form  class="pt-3" method="post" action="forgot.php?mode=enter_code"> 
						
							<span style="font-size: 12px;color:red;">
							<?php 
								foreach ($error as $err) {
									// code...
									echo $err . "<br>";
								}
							?>
							</span>

							  <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary text-white"><i class="ti-lock"></i></span>
                    </div>
                    <input type="text" class="form-control form-control-lg" name="code" placeholder="12345" autocomplete="off" required>
                  </div>
                </div>   
							
				<div class=" d-flex justify-content-around  mb-2 mr-sm-2">
					<div class="my-2 d-flex"><a data-toggle="tooltip" data-placement="bottom" title="Go back" class="btn btn-primary" style="width: 135px;"  href="forgot.php" type="button" value="Back" >Back</a></div>
					<span></span>
					<div class="my-2 d-flex"><button data-toggle="tooltip" data-placement="bottom" title="Click to Proceed" type="submit" class="btn btn-success"  style="width: 135px;">Next</button></div>
							</div>
	
						</form>
						
					<?php
					break;

				case 'enter_password':
					// code...
					?>
					<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo text-center">
			  <img src="images/logo.png" alt="logo" class="img-fluid" style="max-width: 100%; height: auto; width: 23rem;">
              </div>

			  				<h3 class="font-weight-strong text-center">FORGOT PASSWORD</h3>
							<h5 class="text-primary text-center">Enter your new password</h5>

						<form  class="pt-3" method="post" action="forgot.php?mode=enter_password"> 
						
							<span style="font-size: 12px;color:red;">
							<?php 
								foreach ($error as $err) {
									// code...
									echo $err . "<br>";
								}
							?>
							</span>
				<div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary text-white"><i class="ti-lock"></i></span>
                    </div>
                    <input type="password" class="form-control form-control-lg" name="password" placeholder="Password" autocomplete="off" required>
                  </div>
                </div>  
							<div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary text-white"><i class="ti-lock"></i></span>
                    </div>
                    <input type="password" class="form-control form-control-lg" name="password2" placeholder="Retype Password" autocomplete="off" required>
                  </div>
                </div>

				<div class=" d-flex justify-content-around  mb-2 mr-sm-2">
					<div class="my-2 d-flex"><a data-toggle="tooltip" data-placement="bottom" title="Back to entering email" class="btn btn-primary" style="width: 135px;" href="forgot.php" type="button" value="Start Over">Start Over</a></div>
				
					<div class="my-2 d-flex"><input data-toggle="tooltip" data-placement="bottom" title="Click to Proceed" class="btn btn-success" style="width: 135px;" type="submit" value="Next"></div>
							</div>
							<div class="my-2 d-flex justify-content-center align-items-center">
               <a href="login.php" data-toggle="tooltip" data-placement="bottom" title="Back to Login" class="btn btn-secondary"  style="font-size: 18px; color: white;" type="button" value="Log In">Log in</a>
                  </div>   
						</form>
						</div>
					<?php
					break;
				
				default:
					// code...
					break;
			}

		?>

<!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <script src="js/custom.js"></script>
  <script>
  $(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
  });	
  </script>
  <!-- endinject -->
</body>
</html>