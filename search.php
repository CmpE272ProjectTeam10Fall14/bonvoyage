<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="./css/style.css" type="text/css" rel="stylesheet" />
<script src="js/jquery-1.6.js" type="text/javascript" language="javascript"></script>
<script src="js/jquery.masonry.min.js.js" type="text/javascript" language="javascript"></script>

<script type="text/javascript" src="js/jquery.shadow.js"></script>
<script type="text/javascript" src="js/jquery.ifixpng.js"></script>

<script type="text/javascript" src="js/jquery.fancyzoom.js"></script>

    <link href="./css/style.css" type="text/css" rel="stylesheet" />
    <link href="./css/profile.css" type="text/css" rel="stylesheet" />
    <script src="js/jquery-1.6.js" type="text/javascript" language="javascript"></script>
    <script src="js/jquery.masonry.min.js.js" type="text/javascript" language="javascript"></script>

    <script type="text/javascript" src="js/jquery.shadow.js"></script>
    <script type="text/javascript" src="js/jquery.ifixpng.js"></script>

    <script type="text/javascript" src="js/jquery.fancyzoom.js"></script>
    <link href="js/js-image-slider.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="./css/craftyslide.css" />
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/style.css" type="text/css" rel="stylesheet" />
    <link href="./css/profile.css" type="text/css" rel="stylesheet" />

    <script src="js/jquery-1.6.js" type="text/javascript" language="javascript"></script>
    <script src="js/jquery.min.js" type="text/javascript" language="javascript"></script>
    <script src="js/jquery.masonry.min.js" type="text/javascript" language="javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript" language="javascript"></script>
    <script type="text/javascript" src="js/jquery.shadow.js"></script>
    <script type="text/javascript" src="js/jquery.ifixpng.js"></script>
    <script type="text/javascript" src="js/jquery.fancyzoom.js"></script>
    <script src="js/js-image-slider.js" type="text/javascript"></script>
    <script src="js/respond.js"></script>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Search</title>
</head>

<body>

<script type="text/javascript" language="javascript">
function add_like(get_pin_id) {
	
	var xmlhttp;
	if (window.XMLHttpRequest) {
		xmlhttp=new XMLHttpRequest();
	}
	else {
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.open("GET","add_like.php?like_id="+get_pin_id,false);
	xmlhttp.send();
	
	location.href="index.php";
}

function delete_like(get_pin_id) {
	
	var xmlhttp;
	if (window.XMLHttpRequest) {
		xmlhttp=new XMLHttpRequest();
	}
	else {
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.open("GET","delete_like.php?delete_id="+get_pin_id,false);
	xmlhttp.send();
	location.href="index.php";
}

function delete_pin(get_pin_id) {
	var xmlhttp;
	if (window.XMLHttpRequest) {
		xmlhttp=new XMLHttpRequest();
	}
	else {
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.open("GET","delete_pin.php?delete_id="+get_pin_id,false);
	xmlhttp.send();
	location.href="index.php";
}

function button_appear(pin_id) {
	var like_button = "like_pin_" + pin_id;
	var unlike_button = "unlike_pin_" + pin_id;
	var delete_button = "delete_pin_" + pin_id;
	if(document.getElementById(like_button) == null) {
		document.getElementById(unlike_button).style.display = 'block';
	}
	else {
		document.getElementById(like_button).style.display = 'block';
	}
	document.getElementById(delete_button).style.display = 'block';
}

function button_disappear(pin_id) {
	var like_button = "like_pin_" + pin_id;
	var unlike_button = "unlike_pin_" + pin_id;
	var delete_button = "delete_pin_" + pin_id;
	if(document.getElementById(like_button) == null) {
		document.getElementById(unlike_button).style.display = 'none';
	}
	else {
		document.getElementById(like_button).style.display = 'none';
	}
	document.getElementById(delete_button).style.display = 'none';
}
</script>

	<div id="wrapper">
        <?php
        error_reporting(0);
        ?>


        <div id="header">
        	<?php include('header.php'); ?>
            
        </div><!--end #header-->
        
        <?php
			
			if(isset($_POST['comment_submit'])&&$_POST['comment_submit']){
				$comment_pin_id = $_POST['comment_pin_id'];
				$comment_text = $_POST['comment_text'];
				
				$current_user_id =  $_SESSION['user'][0];
				
				$sql="insert into comment (comment_id, pin_id, user_id, content, comment_time) values (null,'".$comment_pin_id."','".$current_user_id."','".$comment_text."',now())";
				mysql_query($sql) or die("Comment error!");
				Header("Location:index.php");
			}
		?>

        <div id="main">
        	
            
            <div id="content">
                 
                <div id="pin_dinplay" class="pin">
                    <ul>
                        <!--<li id="recent">
                        	<h3>Recent Activity</h3>
                        </li>-->
                        <?php
                            $current_user_id = $_SESSION['user'][0];
                            $PIN_SQL="SELECT * FROM `pin` where ";

                            if(isset($_GET['description']))
                            {
								$description = $_GET['description'];
                                $PIN_SQL = $PIN_SQL . " description like '%$description%'";
                            }

                            if(isset($_GET['category'])) {
                                $category = $_GET['category'];
                                if(isset($_GET['description']))
                                {
                                    $PIN_SQL = $PIN_SQL . " and category like '%$category%'";
                                }
                                else
                                {
                                    $PIN_SQL = $PIN_SQL . " category like '%$category%'";
                                }
                            }

                            if(isset($_GET['country'])) {
                                $country = $_GET['country'];
                                if(isset($_GET['description']) || isset($_GET['category']) )
                                {
                                    $PIN_SQL = $PIN_SQL . " and place like '%$country%'";
                                }
                                else
                                {
                                    $PIN_SQL = $PIN_SQL . " place like '%$country%'";
                                }
                            }

                            if(isset($_GET['cost'])) {
                                $cost= $_GET['cost'];
                                if(isset($_GET['description']) || isset($_GET['category']) || isset($_GET['country']))
                                {
                                    $PIN_SQL = $PIN_SQL . " and cost <= $cost";
                                }
                                else
                                {
                                    $PIN_SQL = $PIN_SQL . " cost <= $cost";
                                }
                            }

                            $PIN_SQL= $PIN_SQL . " order by pin_id desc";
                            echo $PIN_SQL;
  							$pin_query=mysql_query($PIN_SQL);
  							while($pin_row=mysql_fetch_array($pin_query)){
								$pin_id = $pin_row['pin_id'];
								$board_id = $pin_row['board_id'];
								$pin_user_id = $pin_row['user_id'];
								$delete_button = "delete_pin_".$pin_id;
								
								$BOARD_SQL="SELECT * FROM `board` where board_id = '$board_id'";
								$board_query=mysql_query($BOARD_SQL);
								while($board_row=mysql_fetch_array($board_query)){
									$cur_board_name = $board_row['board_name'];
									$cur_board_id = $board_row['board_id'];
								}
								
	  					?>
						
                        
                        <li id="pin_<?php echo $pin_id; ?>" class="small_pin" onmouseover="button_appear('<?php echo $pin_row['pin_id']; ?>')" onmouseout="button_disappear('<?php echo $pin_row['pin_id']; ?>')">
                        
                        <?php
							if(isset($_SESSION['user'][0])){
								$login_user_id = $_SESSION['user'][0];
								
								$if_like = false;
								$LIKE_SQL="SELECT * FROM `like_pin` where pin_id = '$pin_id' and user_id = '$login_user_id'";
								$like_query=mysql_query($LIKE_SQL);
								$like_query=mysql_query($LIKE_SQL);
								$like_row = mysql_fetch_array($like_query);
								
								$unlike_button = "unlike_pin_".$pin_id;
								$like_button = "like_pin_".$pin_id;
								if(empty($like_row)) {
									$if_like = true;
								}
								
								if($if_like) {
						?>
                        
									<a id="<?php echo $like_button; ?>" class="like_button" href="javascript:void(0);" onclick="add_like(<?php echo $pin_row['pin_id']; ?>)"><span class="glyphicon glyphicon-thumbs-up"></span></a>
                       
                        <?php
								}
								else {    
                        ?>
                        
                            <a id="<?php echo $unlike_button; ?>" class="unlike_button" href="javascript:void(0);" onclick="delete_like(<?php echo $pin_row['pin_id']; ?>)"><span class="glyphicon glyphicon-thumbs-down"></span></a>
                        <?php
								}
								if($_SESSION['user'][0] == $pin_user_id) {
						?>
                            <a id="<?php echo $delete_button; ?>" class="delete_button" href="javascript:void(0);" onclick="delete_pin(<?php echo $pin_row['pin_id']; ?>)"><span class="glyphicon glyphicon-remove"></span></a>
						<?php 	} 
							}
						?>
                            <a href="./pins/<?php echo $pin_row['image_name']; ?>"><img src="./pins/<?php echo $pin_row['image_name'];?>"/></a>

                            <p class="pin_text"><?php echo $pin_row['description']; ?></p></a>

                        <?php
								
								$USER_SQL="SELECT * FROM `user` where user_id = '$pin_user_id'";
								$user_query=mysql_query($USER_SQL);
								while($user_row=mysql_fetch_array($user_query)){
									
						?>
                        
                            <div class="pin_info">
                            	<div class="pin_user_info">
                                    <a href="pins.php?user_id=<?php echo $user_row['user_id']; ?>"><img class="user_head" src="./head_pics/<?php echo $user_row['head_pic'];?>" /></a>
                                    <p class="comment_text"> <b><a class="user_name_link" href="pins.php?user_id=<?php echo $user_row['user_id']; ?>"><?php echo $user_row['user_name'];?></a> </b>pin onto <b><a class="user_name_link" href="board_display.php?user_id=<?php echo $pin_user_id; ?>&board_id=<?php echo $cur_board_id;?>"><?php echo $cur_board_name;?></a></b> board</p>
                                </div>

                            <?php
                                    //	}
									}
                            ?>
                            
                            </div>
                            
                        </li>
                        
                        <?php 
								}
						?>
                        
                    </ul>
                 </div>  

            </div><!--end #content-->
            
        </div><!--end #main-->
    
    </div><!--end #wrapper-->

<script type="text/javascript">

$(function() {
	$.fn.fancyzoom.defaultsOptions.imgDir='./pins/';

	$('#gallery a').fancyzoom(); 

	$('a.tozoom').fancyzoom({Speed:1000});
	$('a').fancyzoom({overlay:0.8});
	$('img.fancyzoom').fancyzoom();
});


$(document).ready(function(){
	$('#about_menu ul li').mouseover(function() {
		$('#about_menu').css('background','#DDDDDD');
	});
	$('#about_menu ul li').mouseout(function() {
		$('#about_menu').css('background','none');
	});
	
	$('#profile_menu ul li').mouseover(function() {
		$('#profile_menu').css('background','#DDDDDD');
	});
	$('#profile_menu ul li').mouseout(function() {
		$('#profile_menu').css('background','none');
	});

});

var $main= $('#pin_dinplay ul');
$main.imagesLoaded(function(){
  $main.masonry({
    itemSelector : '.small_pin',
    columnWidth : 240
  });
});

</script>

</body>
</html>