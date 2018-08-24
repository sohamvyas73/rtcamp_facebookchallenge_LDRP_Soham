
<!DOCTYPE html>
<html lang="en">
<head>
     <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="pop.css">
    <link rel="stylesheet" type="text/css" href="pop.css">
    <link rel="stylesheet" type="text/css" href="google.css">
    <link rel="shortcut icon" type="image/x-icon" href="https://rtcamp.com/wp-content/uploads/2018/04/rtcamp-favicon.png" />
    <script
  src="https://code.jquery.com/jquery-3.3.1.js"
   ></script>
    <style>
    
@import url('https://fonts.googleapis.com/css?family=Mukta');
body{
  font-family: 'Mukta', sans-serif;
	height:100vh;
	min-height:550px;
	background-image:url(5.jpg);
	background-repeat: no-repeat;
	background-size:cover;
	background-position:center;
	position:relative;
    overflow-y: hidden;
}

a{
  text-decoration:none;
  color:#444444;
}
.login-reg-panel{
    position: relative;
    top: 50%;
    transform: translateY(-50%);
	text-align:center;
    width:60%;
	right:0;left:0;
    margin:auto;
    height:350px;
    background-color: rgba(59, 89, 152,0.8);
}
.white-panel{
    background-color: rgba(255,255, 255, 1);
    height:470px;
    position:absolute;
    top:-60px;
    width:50%;
    right:calc(50% - 50px);
    transition:.3s ease-in-out;
    z-index:0;
}
.login-reg-panel input[type="radio"]{
    position:relative;
    display:none;
}
.login-reg-panel{
    color:#fff;
}
.login-reg-panel #label-login, 
.login-reg-panel #label-register{
    border:1px solid #9E9E9E;
    padding:0 5px;
    width:150px;
    display:block;
    text-align:center;
    border-radius:3px;
    cursor:pointer;
}
.login-info-box{
    width:30%;
    padding:0 50px;
    top:20%;
    left:0;
    position:absolute;
    text-align:left;
}
.register-info-box{
    width:30%;
    padding:0 50px;
    top:20%;
    right:0;
    position:absolute;
    text-align:left;
    
}
.right-log{right:50px !important;}

.login-show, 
.register-show{
    z-index: 1;
    display:none;
    opacity:0;
    transition:0.3s ease-in-out;
    color:#242424;
    text-align:left;
    padding:50px;
}
.show-log-panel{
    display:block;
    opacity:0.9;
}
.login-show input[type="text"], .login-show input[type="password"]{
    width: 90%;
    display: block;
    margin:20px 0;
    padding: 12px;
    border: 1px solid #b5b5b5;
    outline: none;
}
.login-show input[type="submit"] {
    max-width: 150px;
    width: 100%;
    background: rgba(59, 89, 152);
    color: #f9f9f9;
    border: none;
    padding: 10px;
    text-transform: uppercase;
    border-radius: 2px;
    
    cursor:pointer;
}
.login-show input[type="button"] {
    max-width: 150px;
    width: 100%;
    background: rgba(59, 89, 152);
    color: #f9f9f9;
    border: none;
    padding: 10px;
    text-transform: uppercase;
    border-radius: 2px;
    
    cursor:pointer;
}
.login-show a{
    display:inline-block;
    padding:10px 0;
}

.register-show input[type="text"], .register-show input[type="tel"], .register-show input[type="password"]{
    width: 90%;
    display: block;
    margin:20px 0;
    padding: 12px;
    border: 1px solid #b5b5b5;
    outline: none;
}
.register-show input[type="submit"] {
    max-width: 150px;
    width: 100%;
    background: rgba(59, 89, 152);
    color: #f9f9f9;
    border: none;
    padding: 10px;
    text-transform: uppercase;
    border-radius: 2px;
    cursor:pointer;
}
.credit {
    position:absolute;
    bottom:10px;
    left:10px;
    color: #3B3B25;
    margin: 0;
    padding: 0;
    font-family: Arial,sans-serif;
    text-transform: uppercase;
    font-size: 12px;
    font-weight: bold;
    letter-spacing: 1px;
    z-index: 99;
}
a{
  text-decoration:none;
  color:black;
}
    
    
    
    </style>
</head>
<body>
    
  	<div class="login-reg-panel">
        <div class="box"></div>
		<div class="login-info-box">
			<h2>Have an account?</h2>
			<p>Lorem ipsum dolor sit amet</p>
			<br><br><br>
            <label id="label-register" for="log-reg-show">Login</label>
			<input type="radio" name="active-log-panel" id="log-reg-show"  checked="checked">
		</div>
							
		<div class="register-info-box">
			<h2>Don't have an account?</h2>
			<p>Sign Up to get in touch with your friends and for entertainment also.</p><br><br>
			<label id="label-login" for="log-login-show">Sign Up</label>
			<input type="radio" name="active-log-panel" id="log-login-show">
		</div>
		<form action="index.php" method="POST">					
		<div class="white-panel">
			<div class="login-show">
				<h2>LOGIN</h2>
				<input type="text" placeholder="Email" name="login_email">
				<input type="password" placeholder="Password" name="login_password">
                <!--<a href="login.php">Login</a>-->
                <br>
				<center><input type="submit" value="Login" name="Login">
                <br>
    <div class="box">
    <a class="button" href="#popup1">Forgot password?</a>


                </center>
			</div>
			<div class="register-show">
				<h2>SIGN UP</h2>
				<input type="text" placeholder="Email" name="signup_email">
                <input type="tel" placeholder="Phone Number" name="signup_telephone">
				<input type="password" placeholder="Password" name="signup_password">
				<input type="password" placeholder="Confirm Password" name="signup_confirm_password">
                <br>
				<center><input type="submit" value="Signup" name="Signup"></center>
			</div>
            </form>
		</div>
	</div>
  <script>
    //$('#popup1').show();
    //document.getElementById('close_popup').style.opacity=0;
    $(document).ready(function(){
    $('.login-info-box').fadeOut();
    $('.login-show').addClass('show-log-panel');
});


$('.login-reg-panel input[type="radio"]').on('change', function() {
    if($('#log-login-show').is(':checked')) {
        $('.register-info-box').fadeOut(); 
        $('.login-info-box').fadeIn();
        
        $('.white-panel').addClass('right-log');
        $('.register-show').addClass('show-log-panel');
        $('.login-show').removeClass('show-log-panel');
        
    }
    else if($('#log-reg-show').is(':checked')) {
        $('.register-info-box').fadeIn();
        $('.login-info-box').fadeOut();
        
        $('.white-panel').removeClass('right-log');
        
        $('.login-show').addClass('show-log-panel');
        $('.register-show').removeClass('show-log-panel');
    }
});
function close_popup() {
    // body...

document.getElementById('popup1').style.opacity=0;
window.location="http://localhost/RTcamp/";
}
</script>


</div>
</body>
</html>

<?php 
$connect = mysql_connect("localhost","root","") or die("not connected");
mysql_select_db("rangilu gujarat") or die("no database found");

if (isset($_POST['Signup'])) {
    $signup_email = $_POST['signup_email'];
    $signup_password = $_POST['signup_password'];
    $signup_confirm_password = $_POST['signup_confirm_password'];
    $signup_telephone = $_POST['signup_telephone'];
    $flag_user=1;
    $flag_password=0;
    if ($signup_confirm_password == $signup_password) {
        $flag_password=1;
    }

    if ($signup_confirm_password != $signup_password){
        echo "<script type='text/javascript'>alert('Password and Confirm Password does not match!!!')</script>";
    }

    if ($flag_password == 1) {
        $query_signup = 'select * from user where Email="'. $signup_email .'"LIMIT 1';
        $result_signup = mysql_query($query_signup);
        $check_signup_user = mysql_num_rows($result_signup);
        if($check_signup_user > 0){
            $flag_user = 0;
            echo "<script type='text/javascript'>alert('Username already exist')</script>";
        }
        if ($flag_user == 1) {
            $query_signup_insert="insert into user(Email,Password,Phone_number)values('$signup_email','$signup_password','$signup_telephone')";
            mysql_query($query_signup_insert);
        }
    }

    else{
        echo "<script type='text/javascript'>alert('Password and Confirm Password does not match!!!')</script>";
    }
}
if (isset($_POST['Login'])) {
    $login_email = $_POST['login_email'];
    $login_password = $_POST['login_password'];
    $query_login = 'select * from user where Email="'. $login_email .'" and Password="'. $login_password .'"LIMIT 1';
    $result_login = mysql_query($query_login);
    $validate_login_user = mysql_num_rows($result_login);
    $flag_user_validate = 1;
    $flag_login_success = 0;
    if ($validate_login_user == 0) {
        $flag_user_validate = 0;
        echo "<script type='text/javascript'>alert('Authentication details does not match!!!')</script>";
    }
    if ($flag_user_validate == 1) {
        //echo "<script type='text/javascript'>alert('Authentication details match!!!')</script>";
        $flag_login_success = 1;
        //echo "<script type='text/javascript'>window.location('http://localhost/RTcamp/user_login.php')</script>";
    }
    if ($flag_login_success == 1) {
    
        echo "<div class='pop'>
<div id='popup1' class='overlay'>
    <div class='popup'>
        <div class='row'>
        
        <center>Please Login to your Facebook Account.
        <a class='close' href='javascript:close_popup()' id='close_popup'>&times;</a>
        <div class='content'>
            
      <a href='login.php'><button class='loginBtn loginBtn--facebook'>
  Login with Facebook
</button></a></div></center>
        
      
        </div></div>
    </div>
</div>
";
echo "<script type='text/javascript'>document.getElementById('popup1').style.opacity=1</script>";

    //echo "<script type='text/javascript'>alert('Authentication details match!!!')</script>";
    //echo "<script type='text/javascript'>document.getElementById('popup1').style.display='block'</script>";  
   //echo "<script type='text/javascript'>window.open(#popup1)</script>";
   // echo "<script type='text/javascript'>window.location='http://localhost/RTcamp/user_login.php?Name=".$login_email."'</script>";
    //header("http://localhost/RTcamp/user_login.php");
}
}

?>