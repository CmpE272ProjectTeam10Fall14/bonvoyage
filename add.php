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

<script type="text/javascript" language="javascript">
    function checkPost(){
        if(upload_form.upfile.value==""){
            alert("File cannot be empty!");
            return false;
        }
        if(upload_form.board.value=="-1"){
            alert("Please choose a board!");
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

<form enctype="multipart/form-data" method="post" onsubmit="return checkPost()" name="upload_form">

<table class = "table">
</table>

<table class="table table-hover" >
    Add your story in the form of pins.
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
                    <input class="upfile_text" name="upfile" type="file">
                    <!--<?php include('upload.php'); ?>-->
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
                    <p><b>Tell us about this pin in brief:</b>
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
                    <p><b>Expenditure</b></p>
                    <div class="input-group">
                        <span class="input-group-addon">$</span>
                        <input type="text" class="form-control input-xs" name="cost" id="cost">
                        <span class="input-group-addon">.00</span>
                    </div>

                    <br>

                    <p><b>Choose a board for you pin</b></p>
                        <select class="form-control input-xs"  name="board" type="text" >
                            <option value="-1">Choose a Board</option>
                            <?php
                            $user_id = $_SESSION['user'][0];
                            $board_sql = "select * from `board` where user_id = '$user_id'";
                            $board_query =  mysql_query($board_sql);
                            while($row=mysql_fetch_array($board_query)){
                                ?>
                                <option value="<?php echo $row['board_id'];?>"><?php echo $row['board_name'];?></option>
                            <?php
                            }
                            ?>
                        </select>
                    <span class="pull-right"><a class="add_board_link" href="add_board.php">Add a Board</a></span>
                </div>
            </div>
        </div>
    </div>

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

        <button class="btn btn-warning btn-lg btn-block active" type="submit" name="submit" value="Submit">Submit</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (!is_uploaded_file($_FILES["upfile"]['tmp_name']))
    {
        echo "<font color='red'>File Not Exists！</font>";
        exit;
    }
    $file = $_FILES['upfile'];
    if($max_file_size < $file['size'])
    {
        echo "<font color='red'>File So Big！</font>";
        exit;
    }
    if(!in_array($file['type'], $uptypes))
    {
        echo "<font color='red'>Only upload Picture！</font>";
        exit;
    }
    if(!file_exists($destination_folder)) {
        mkdir($destination_folder);
    }
    $filename=$file['tmp_name'];
    $image_size = getimagesize($filename);
    $pinfo=pathinfo($file['name']);
    $ftype=$pinfo['extension'];
    $destination = $destination_folder.time().".".$ftype;
    if (file_exists($destination) && $overwrite != true)
    {
        echo "<font color='red'>The Same Niame！</a>";
        exit;
    }

    if(!move_uploaded_file ($filename, $destination))
    {
        echo "<font color='red'>Transfer Fail！</a>";
        exit;
    }

    $pinfo=pathinfo($destination);
    $fname=$pinfo['basename'];
    $user_id = $_SESSION['user'][0];
    $description=$_POST['description'];
    $board=$_POST['board'];
    $cost=$_POST['cost'];
    $title=$_POST['title'];
    $place="";
    $sql="insert into pin (pin_id,user_id,board_id,image_name,description,title,cost,place,pin_time) values (NULL,'".$user_id."','".$board."','".$fname."','".$description."','".$title."','".$cost."','".$place."',now())";
    mysql_query($sql) or die("Insert error!!");

    /*if($imgpreview==1)
    {
        echo "<br>Picture Preview:<br>";
        echo "<a href=\"".$destination."\" target='_blank'><img src=\"".$destination."\" width=".($image_size[0]*$imgpreviewsize)." height=".($image_size[1]*$imgpreviewsize);
        echo " alt=\"Preview:\rFile name:".$destination."\rUpload time:\" border='0'></a>";
    }*/
    ?>
    <script type="text/javascript" language="javascript">
        location.href="index.php";
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