<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">

    <link href="./css/style.css" type="text/css" rel="stylesheet" />
    <link href="./css/profile.css" type="text/css" rel="stylesheet" />
    <link href="js/js-image-slider.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="./css/craftyslide.css" />
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/style.css" type="text/css" rel="stylesheet" />

    <script src="js/jquery-1.6.js" type="text/javascript" language="javascript"></script>
    <script src="js/jquery.masonry.min.js.js" type="text/javascript" language="javascript"></script>
    <script type="text/javascript" src="js/jquery.shadow.js"></script>
    <script type="text/javascript" src="js/jquery.ifixpng.js"></script>
    <script type="text/javascript" src="js/jquery.fancyzoom.js"></script>
    <script src="js/js-image-slider.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/respond.js"></script>

	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
    <style type="text/css">
        textarea
        {
            border:1px solid #999999;
            width:100%;
            margin: 8px 0;
            padding:3px;
        }
    </style>
<script type="text/javascript">
$(document).ready(function(){
    $('[data-toggle="popover"]').popover({
        placement : 'right'
    });
});
</script>
    <title>Predict - BonVoyage</title>
    <script
        src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false">
    </script>
</head>
<body>

<div id="wrapper">

    <div id="header">
        <?php
        error_reporting(0);
        ?>

        <?php include('header.php'); ?>
    </div>

    <?php
    if(isset($_GET['pin_id'])){
        $pin_id = $_GET['pin_id'];
    }

    $PIN_SQL="SELECT * FROM `pin` where pin_id='$pin_id' ";
    $pin_query=mysql_query($PIN_SQL);
    $pin_row=mysql_fetch_array($pin_query);
    $board_id = $pin_row['board_id'];
    $cost = $pin_row['cost'];
    $user_id = $pin_row['user_id'];
    $description = $pin_row['description'];
    $imageName = $pin_row['image_name'];
    $title = $pin_row['title'];
    $lat = $pin_row['lat'];
    $lon = $pin_row['lon'];
    $category = $pin_row['category'];

    $BOARD_SQL="SELECT * FROM `board` where board_id = '$board_id'";
    $board_query=mysql_query($BOARD_SQL);
    $board_row=mysql_fetch_array($board_query);
    $cur_board_name = $board_row['board_name'];

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
                                <button class="btn btn-primary btn-xs btn-block active" type="submit" name="submit" value="Login">Add pin to the story board</button>
                            </a>
                        </li>
                    </div>

                    <div>
                        <br>
                    </div>

                    <div align="center">
                        <li>
                            <a href="add_board.php">
                                <button class="btn btn-primary btn-xs btn-block active" type="submit" name="submit" value="Login">Add story board</button>
                            </a>
                        </li>
                    </div>
                </div>

                <div class="col-lg-1">
                </div>

                <div class="col-lg-6">

                    <br>
                    <div>
                        <img src="./pins/<?php echo $pin_row['image_name'];?>"
                        class="img-rounded" height="470" width="570"/>
                    </div>

                    <br>
                </div>

                <div class="col-lg-3">
                    <br>
                    <p><b>Overview</b>
                    <div class=”form-group″>
                        <textarea class="form-control" id="description" name="description" disabled = "true"><?php echo $pin_row['description']; ?></textarea>
                    </div>
                    </p>

                    <p><b>Board to which it was pinned</b>
                    <div class=”form-group″>
                        <text class="form-control" id="cbs " name="cbs" disabled = "true"><?php echo $cur_board_name; ?></text>
                    </div>
                    </p>

                    <p><b>Cost</b>
                    <div class=”form-group″>
                        <text class="form-control" id="cost" name="cost" disabled = "true"><?php echo $pin_row['cost']; ?></text>
                    </div>
                    </p>

                    <p><b>Category</b>
                    <div class=”form-group″>
                        <text class="form-control" id="category" name="category" disabled = "true"><?php echo $category; ?></text>
                    </div>
                    </p>



                    <p><b>The picture was taken at</b>
                    <div class=”form-group″>
                        <textarea class="form-control" cols="2" rows="5" id="address" name="address" disabled = "true">

                            <?php

                                function geo2address($lat,$lon) {
                                    $url = "http://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$lon&sensor=false";
                                    $curlData=file_get_contents($url);
                                    $address = json_decode($curlData);
                                    $a=$address->results[0];
                                    return explode(",",$a->formatted_address);
                                }

                                $address=geo2address($lat,$lon);
                                $arrlength = count($address);

                                for($x = 0; $x < $arrlength; $x++) {
                                echo $address[$x].',';

                            }?>
                         </textarea>
                   </div>
                    </p>

                    <script>
                        var myCenter=new google.maps.LatLng(<?php echo $lat;?>,<?php echo $lon;?>);
                        function initialize()
                        {
                            var mapProp = {
                                center:myCenter,
                                zoom:14,
                                mapTypeId:google.maps.MapTypeId.ROADMAP
                            };

                            var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

                            var marker=new google.maps.Marker({
                                position:myCenter;
                            });

                            marker.setMap(map);
                        }

                        google.maps.event.addDomListener(window, 'load', initialize);
                    </script>

                  <!--  <div id="googleMap" style="width:270px;height:160px;"></div>-->
                </div>


            </div>

        <div class="row">
            <div id="content">
                <div class="col-lg-3">
                </div>

                <div class="col-lg-9">
                    <p><b>Places close by</b>
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
                <div id="content">
                    <div class="col-lg-3">

                    </div>

                    <div class="col-lg-9">
                       <!-- <a href="places.php?lat=<?php echo $lat;?>&lon=<?php echo $lon;?>">More Suggestions</a> -->
                        <?php include("googlePrediction.php")?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div id="content">
                <div class="col-lg-3">
                </div>

                <div class="col-lg-9">
                    <p><b>Suggested Places</b>


                        <button type="button" tabindex="0" class="btn btn-primary" role="button" data-toggle="popover" data-trigger="focus"
                                title="Suggestions" data-content="These places are within a 20 mile radius of your trip location.">How does it work?</button>

                    </p>
                </div>
            </div>
        </div>


        <div class="row">
            <div id="content">
                <div class="col-lg-3">

                </div>

                <div class="col-lg-9">
                    <?php include("predict_display.php")?>
                </div>
            </div>
        </div>

</div>
</body>
</html>

