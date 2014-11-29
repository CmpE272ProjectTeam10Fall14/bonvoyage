<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />

    <link href="./css/logreg.css" type="text/css" rel="stylesheet" />

	<link href="./css/style.css" type="text/css" rel="stylesheet" />
	<link href="js/js-image-slider.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/craftyslide.css" />
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
    <link href="./css/logreg.css" type="text/css" rel="stylesheet" />
    
    <!-- <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" /> -->
    <!--<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>-->
    <!--<script type="text/javascript" src="js/bootstrap.min.js"></script> -->

    <script src="js/jquery-1.6.js" type="text/javascript" language="javascript"></script>
	<script src="js/jquery.masonry.min.js.js" type="text/javascript" language="javascript"></script>
	<script type="text/javascript" src="js/jquery.shadow.js" language="javascript"></script>
	<script type="text/javascript" src="js/jquery.ifixpng.js" language="javascript"></script>
	<script type="text/javascript" src="js/jquery.fancyzoom.js"></script>
	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
   	<script src="js/js-image-slider.js" type="text/javascript"></script>
   	<script type="text/javascript" src="oauth-js/dist/oauth.js"></script>
   	<script type="text/javascript" src="auth.js"></script> 

	<title>Login</title>
</head>
<style>
    .glyphicon-home{font-size:3em;}
    .glyphicon-log-out{font-size:3em;}
    .glyphicon-log-in{font-size:3em;}
    .glyphicon-font{font-size:3em;}

</style>

<body>

<?php include("conn.php"); ?>

<?php 
	if(isset($_GET['action'])&&$_GET['action']=="logout"){
		unset($_SESSION['user']);
		Header("Location:login.php");
	}
?>


<?php
	if(isset($_POST['submit'])&&$_POST['submit']){
		$get_name="SELECT * FROM `user` where email='$_POST[email]'";
		$query=mysql_query($get_name) or die("Search error!");
		if(!is_array(mysql_fetch_row($query))){
?>

<script type="text/javascript" language="javascript">
	alert("This user name does not exists!");	
</script>

<?php        
		}
		
		else{
			$password=mysql_result($query, 0, "password");
			if($password==md5($_POST['password'])){
				$user_array = array(mysql_result($query, 0, "user_id"), 
									mysql_result($query, 0, "user_name"),
									mysql_result($query, 0, "about"),
									mysql_result($query, 0, "head_pic"),
									mysql_result($query, 0, "password"),
									mysql_result($query, 0, "email"),
									mysql_result($query, 0, "first_name"),
									mysql_result($query, 0, "last_name"),
									mysql_result($query, 0, "gender")
									);
				$_SESSION['user'] = $user_array;
?>

				<script type="text/javascript" language="javascript">
                    location.href="main.php";
                </script>

<?php				
			}
			else{
?>

				<script type="text/javascript" language="javascript">
                    alert("Password error!");
                    register_form.account.focus();
                </script>

<?php
			}
		}
	}
?>

<script type="text/javascript" language="javascript">
function checkPost(){
	if(register_form.email_address.value==""){
		alert("Email address can not be empty!");
		login_form.email_address.focus();
		return false;
	}
	if(register_form.password.value==""){
		alert("Password can not be empty!");
		login_form.password.focus();
		return false;
	}
}
</script>

    <div id="wrapper">
    	 <div id="header">
			<div id="header_field">

			    <div id="menu">
		        <ul>
		        	<li class="sec_menu" id="about_menu">
		            	<a href="about.php"><span class="glyphicon glyphicon-font"></a>
					</li>
		            <li class="sec_menu" id="profile_menu">
		                <a href="login.php"><span class="glyphicon glyphicon-log-in"></span></a>
		            </li>
		        </ul>
		    	</div>

		    	<div id="logo">
		        	<a href="index.php"><img src="image/brown.jpg" /></a>
		    	</div>
			</div>
        </div><!--end #header-->

        <div id="content">
            <h2 align="center">Sign in to your account</h2>
            <form action="login.php" id="login_form" method="post" onsubmit="return checkPost()" name="login_form">
                <div class="row text-center">
                    <div class="col-lg-4">
                        <button type="button" class="btn btn-primary btn-block">Facebook</button>
                    </div>
                    <div class="col-lg-4">
                    	<button type="button" onclick="auth()" class="btn btn-info btn-block">Twitter
                   </div>
                    <div class="col-lg-4">
                        <button type="button" class="btn btn-danger btn-block">Google+</button>
                    </div>
                </div>
                <br>

                <div>
                <p><input class="form-control input-xs" placeholder="Email" name="email" type="text" /></p>
                <p><input class="form-control input-xs" placeholder="Password" name="password" type="password" /></p>
            	<p><button class="btn btn-primary btn-lg btn-block active" type="submit" name="submit" value="Login">Sign In</button>
            		<span class="pull-right"><a href="register.php">Create new account</a></span>
            	</p>
                <div>
            </form>
        </div>    
    </div><!--end # wrapper-->


</body>
</html>