<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="js/js-image-slider.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="./css/craftyslide.css" />
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/style.css" type="text/css" rel="stylesheet" />
    <link href="./css/profile.css" type="text/css" rel="stylesheet" />
    <script src="js/jquery-1.6.js" type="text/javascript" language="javascript"></script>
    <script src="js/jquery.masonry.min.js.js" type="text/javascript" language="javascript"></script>
    <script type="text/javascript" src="js/jquery.shadow.js"></script>
    <script type="text/javascript" src="js/jquery.ifixpng.js"></script>
    <script type="text/javascript" src="js/jquery.fancyzoom.js"></script>
    <script src="js/js-image-slider.js" type="text/javascript"></script>
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/respond.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <title>Add Board</title>
</head>
<body>

<script type="text/javascript" language="javascript">
function checkPost(){
	if(add_form.board_name.value==""){
		alert("Board cannot be empty!");
		return false;
	}
}
</script>
	
    <div id="wrapper">
    	
        <div id="header">
        	<?php include('header.php'); ?>
        </div>
        
        
<?php 
	if(isset($_POST['submit'])&&$_POST['submit']){
		$board_name = $_POST['board_name'];
		$cat = $_POST['cat'];
		$user_id = $_SESSION['user'][0];
		$sql="insert into board (board_id,user_id,board_name,board_cat,create_time) values (NULL,'".$user_id."','".$board_name."','".$cat."',now())";
		mysql_query($sql) or die("Add Board Error!!");
		Header("Location:add.php");
	}
?>


        <div id="main">
            <div id="content">
                <div class="col-lg-2">
                    <div  id = "profile_header">
                        <?php include('profile_header.php'); ?>
                    </div>

                    <div align="center">
                        <li>
                            <a href="add.php">
                                <button class="btn btn-primary btn-xs btn-block active" type="submit" name="submit" value="Login">Add Pin</button>
                            </a>
                        </li>
                    </div>
                    <div>
                        <br>
                    </div>
                    <div align="center">
                        <li>
                            <a href="add_board.php">
                                <button class="btn btn-primary btn-xs btn-block active" type="submit" name="submit" value="Login">Add Board</button>
                            </a>
                        </li>
                    </div>

                    <div>
                        <br>
                    </div>

                </div>

                <div class="col-lg-1">
                </div>

                <div class="col-lg-4">

                    <h3>Add a new board</h3>
                    <form action="add_board.php" method="post" onsubmit="return checkPost()" name="add_form">

                        <p><b>Board Name</b><input class="form-control input-xs" placeholder="Board Name" name="board_name" type="text" /></p>
                        <p><b>Board Category</b>
                           <select class="form-control input-xs"  name="cat" type="text" >
                               <option value="">--Select--</option>
                               <option value="adventure">Adventure</option>
                                <option value="backpacking">Back Packing</option>
                                <option value="beachHoliday">Beach Holiday</option>
                                <option value="city">City</option>
                                <option value="culture">Culture</option>
                                <option value="historical">Historical</option>
                                <option value="religious">Religious</option>
                            </select>
                        </p>
                        <p>
                            <button class="btn btn-primary btn-lg btn-block active" type="submit" name="submit" value="Submit">Add</button>
                        </p>
                    </form>
            	</div>
        	</div>
        </div>
    
    </div>
	
</body>
</html>