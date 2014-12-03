<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="./css/style.css" type="text/css" rel="stylesheet" />
<link href="./css/settings.css" type="text/css" rel="stylesheet" />
<link href="./css/bootstrap.min.css" rel="stylesheet">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>User Details</title>
</head>

<body>

    <div id="wrapper">

 <?php
        error_reporting(0);

        if(isset($_POST['submit_settings'])&&$_POST['submit_settings']){
		
		$user_name=$_POST['user_name'];
		$first_name=$_POST['first_name'];
		$last_name=$_POST['last_name'];
		$gender=$_POST['gender'];
		$about=$_POST['about'];
		
		$user_id = $_SESSION['user'][0];
		
		$sql="update user set user_name = '$user_name', first_name = '$first_name', last_name = '$last_name', gender = '$gender', about = '$about' where user_id = '$user_id'";
		mysql_query($sql) or die("Update error!");
		
		$get_user="select * from user where user_id = '$user_id'";
		$query=mysql_query($get_user);
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
			location.href="index.php";
</script>

<?php
	}
?>



<script type="text/javascript" language="javascript">
function checkPost(){
	if(settings_form.user_name.value==""){
		alert("User name cannot be empty!");
		settings_form.user_name.focus();
		return false;
	}
	
	if(settings_form.first_name.value==""){
		alert("First name can not be empty!");
		settings_form.first_name.focus();
		return false;
	}
	
	if(settings_form.last_name.value==""){
		alert("Last name can not be empty!");
		settings_form.last_name.focus();
		return false;
	}
}
</script>       
		<div id="main" >
        	<div id="info">

            	<form enctype="multipart/form-data" action="settings.php" class="set_form" id="settings_form" method="post" onsubmit="return checkPost()" name="settings_form">
                	<h3>User Information</h3>
                    <table class="table table-striped" >
                        <tbody>
                        <tr>
                            <td><b>Email Address</b></td>
                            <td><?php echo $_SESSION['user'][5]; ?></td>
                        </tr>
                        <tr>
                            <td><b>User Name</b></td>
                            <td><?php echo $_SESSION['user'][1]; ?></td>
                        </tr>
                        <tr>
                            <td><b>Name</b></td>
                            <td><?php echo $_SESSION['user'][6]; ?>&nbsp;&nbsp;<?php echo $_SESSION['user'][7]; ?></td>
                        </tr>
                        <tr>
                            <td><b>Gender</b></td>
                            <td><?php echo $_SESSION['user'][8]; ?></td>
                        </tr>

                        <tr>
                            <td><b>About</b></td>
                            <td><?php echo $_SESSION['user'][2]; ?></td>
                        </tr>

                        </tbody>
                    </table>
                    </form>
        	</div>
        </div>
        
		<script type="text/javascript" language="javascript">
                var gender_name = document.getElementsByName('gender');
            </script>
            <?php
                if($_SESSION['user'][8] == "male") {
            ?>
            
            <script type="text/javascript" language="javascript">
                gender_name[0].checked = true;	
            </script>
            
            <?php
                }
                else if($_SESSION['user'][8] == "female") {
            ?>
            
            <script type="text/javascript" language="javascript">
                gender_name[1].checked = true;	
            </script>
            
            <?php
                }
                else if($_SESSION['user'][8] == "unspecified") {
            ?>
            <script type="text/javascript" language="javascript">
                gender_name[2].checked = true;	
            </script>
            <?php
                }
            ?>      
    </div>
	
</body>
</html>