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
    <script src="js/respond.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <title>Add Travel Story</title>
</head>

<body>
<?php
$max_file_size=5000000;
$destination_folder="./pins/";
$uptypes=array('image/bmp','image/jpg','image/png','image/jpeg','image/bmp');
$imgpreview=1;
$imgpreviewsize=1;
?>

<script language="javascript">
    function enableDisable(bEnable, textBoxID)
    {
        document.getElementById(textBoxID).disabled = !bEnable
    }
</script>

<script type="text/javascript" language="javascript">
    function checkPost(){
        if(upload_form.upfile.value==""){
            alert("File cannot be empty!");
            return false;
        }
        if(upload_form.board.value=="-1"){
            alert("Please choose a category!");
            return false;
        }
    }
</script>

<div id="wrapper">

    <div id="header">
        <?php include('header.php'); ?>
    </div>

    <div id="main">
        <div id="content">
            <div class="col-lg-2">
                <div  id = "profile_header">
                    <?php include('profile_header.php'); ?>
                </div>
            </div>

            <div class="col-lg-1">
            </div>

            <div class="col-lg-9">
                <!--<div id="add" class="add_page">-->

                <form enctype="multipart/form-data" method="post" onsubmit="return checkPost()" name="upload_form">

                    <table class = "table">
                    </table>

                    <table class="table table-hover" >
                        Publish your travel story in four easy steps and share it with your friends,
                        family and other readers on the network. All four steps are completely optional
                        and it is up to you to share as much as you want to.We recommend filling all 4 steps to provide
                        as much information to the reader as possible.
                    </table>

                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Basic Information</a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <p><b>Trip Title :</b><input class="form-control input-xs" placeholder="Trip Title" name="title" type="text" /></p>
                                    <p><b>Upload pictures : </b></p>
                                        <?php include('upload.php'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Trip Overview</a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p><b>Tell us about your trip in brief:</b>
                                    <div class=”form-group″>
                                        <textarea class="form-control" id="description" name="description"></textarea>
                                    </div>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Classify and Tag</a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p><b>Classify your trip :</b>
                                        <select class="form-control input-xs"  name="classify" type="text" />
                                        <option value="">--Select a category--</option>
                                        <option value="adventure">Adventure</option>
                                        <option value="backpacking">Backpacking</option>
                                        <option value="beachHoliday">Beach Holiday</option>
                                        <option value="city">City Travel</option>
                                        <option value="culture">Culture</option>
                                        <option value="historical">Historical</option>
                                        <option value="religious">Religious</option>
                                        </select>
                                    </p>

                                   <p><b>I spent money on:</b></p>

                                        <div class="input-group">
                                                <input type="checkbox"  name="spent_transport" value="transport" onclick="enableDisable(this.checked, 'spent_transport_text')">Transport
                                                <span class="input-group-addon">$</span>
                                                <input type="text" class="form-control input-xs" name="spent_transport_text" disabled="disabled" id="spent_transport_text">
                                                <span class="input-group-addon">.00</span>
                                        </div>

                                        <div class="input-group">
                                            <input type="checkbox"  name="spent_food" value="food" onclick="enableDisable(this.checked, 'spent_food_text')">Food
                                            <span class="input-group-addon">$</span>
                                            <input type="text" class="form-control input-xs" name="spent_food_text" id="spent_food_text" disabled="disabled">
                                            <span class="input-group-addon">.00</span>
                                        </div>

                                        <div class="input-group">
                                            <input type="checkbox"  name="spent_stay" value="stay" onclick="enableDisable(this.checked, 'spent_stay_text')">Stay
                                            <span class="input-group-addon">$</span>
                                            <input type="text" class="form-control input-xs" name="spent_stay_text" id="spent_stay_text" disabled="disabled">
                                            <span class="input-group-addon">.00</span>
                                        </div>

                                        <div class="input-group">
                                            <input type="checkbox"  name="spent_tours" value="tour" onclick="enableDisable(this.checked, 'spent_tours_text')">Tour
                                            <span class="input-group-addon">$</span>
                                            <input type="text" class="form-control input-xs" name="spent_tours_text" id="spent_tours_text" disabled="disabled">
                                            <span class="input-group-addon">.00</span>
                                        </div>
                                    <p><b>Total trip expenditure:</b>
                                    <div class="input-group">
                                        <span class="input-group-addon">$</span>
                                        <input type="text" class="form-control input-xs" name="expenditure">
                                        <span class="input-group-addon">.00</span>
                                    </div>
                                    </p>

                                    <p><b>Add hashtags :</b><input class="form-control input-xs" placeholder="" name="hashTag" type="text" /></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p><b>Keep my trip :</b>
                        <input type="radio" name="publish" value="publish" checked>Public
                        <input type="radio" name="publish" value="unpublish">Private<br>
                    </p>
                    <button class="btn btn-warning btn-lg btn-block active" type="submit" name="submit" value="Submit">Publish</button>
                </form>

                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {


                    $user_id = $_SESSION['user'][0];
                    $description = $_POST['description'];
                    $title = $_POST['title'];
                    $expenditure = $_POST['expenditure'];
                    $hashTag = $_POST['hashTag'];
                    $publish = $_POST['publish'];
                    $classify = $_POST['classify'];

                    //$sql = "insert into stories(story_id,user_id,title,cost,tags,transport,food,stay,tours,privacy,category,story_time,description)
                      //  (NULL,'" . $user_id . "','" . $title . "','" . $expenditure . "','" . $hashTag . "','" . $spent_transport_text . "','" . $spent_food_text . "','" . $spent_stay_text . "','" . $spent_tours_text . "','" . $publish . "','" . $classify . "',now(),'" . $description . "')";
                    //mysql_query($sql) or die("Insert error!!");
                    // $sql="insert into pin (pin_id,user_id,board_id,image_name,description,pin_time) values (NULL,'".$user_id."','".$board."','".$fname."','".$description."',now())";
                    //mysql_query($sql) or die("Insert error!!");

                    /*if($imgpreview==1)
                    {
                        echo "<br>Picture Preview:<br>";
                        echo "<a href=\"".$destination."\" target='_blank'><img src=\"".$destination."\" width=".($image_size[0]*$imgpreviewsize)." height=".($image_size[1]*$imgpreviewsize);
                        echo " alt=\"Preview:\rFile name:".$destination."\rUpload time:\" border='0'></a>";
                    }*/
                    ?>
                    <script type="text/javascript" language="javascript">
                        location.href = "main.php";
                    </script>

                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>