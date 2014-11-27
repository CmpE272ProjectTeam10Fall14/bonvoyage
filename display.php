<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

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
    <script src="js/respond.js"></script>


    <title>Display - BonVoyage</title>


    <script
        src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false">
    </script>


</head>
<body>

<div id="wrapper">

    <div id="header">
        <?php include('header.php'); ?>
    </div>

    <?php
    if(isset($_GET['pin_id'])){
        $pin_id = $_GET['pin_id'];
    }
    ?>

    <div id="pin_dinplay" class="pin">
        <?php

        $PIN_SQL="SELECT * FROM `pin` where pin_id='$pin_id' ";
        $pin_query=mysql_query($PIN_SQL);
        $pin_row=mysql_fetch_array($pin_query);
        $board_id = $pin_row['board_id'];
        $cost = $pin_row['cost'];
        $description = $pin_row['description'];
        $imageName = $pin_row['image_name'];
        $title = $pin_row['title'];

        ?>

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

                    <div>
                        <img src="./pins/<?php echo $pin_row['image_name'];?>"
                        class="img-rounded" height="450" width="900"/>
                    </div>

                    <br>

                    <p><b>Overview</b>
                    <div class=”form-group″>
                        <textarea class="form-control" id="description" name="description" disabled = "true"><?php echo $pin_row['description']; ?></textarea>
                    </div>
                    </p>

                    <p><b>Cost</b>
                    <div class=”form-group″>
                        <text class="form-control" id="description" name="description" disabled = "true"><?php echo $pin_row['cost']; ?></text>
                    </div>
                    </p>

                    <p><b>Where the picture was taken exactly</b>
                    <div class=”form-group″>
                        <textarea class="form-control" id="description" name="description" disabled = "true">

        <?php
        $filename = "./pins/".$pin_row['image_name'];

        $exif = exif_read_data($filename);
        $lon = getGps($exif["GPSLongitude"], $exif['GPSLongitudeRef']);
        $lat = getGps($exif["GPSLatitude"], $exif['GPSLatitudeRef']);

        function getGps($exifCoord, $hemi) {

            $degrees = count($exifCoord) > 0 ? gps2Num($exifCoord[0]) : 0;
            $minutes = count($exifCoord) > 1 ? gps2Num($exifCoord[1]) : 0;
            $seconds = count($exifCoord) > 2 ? gps2Num($exifCoord[2]) : 0;

            $flip = ($hemi == 'W' or $hemi == 'S') ? -1 : 1;

            return $flip * ($degrees + $minutes / 60 + $seconds / 3600);

        }

        function gps2Num($coordPart) {

            $parts = explode('/', $coordPart);

            if (count($parts) <= 0)
                return 0;

            if (count($parts) == 1)
                return $parts[0];

            return floatval($parts[0]) / floatval($parts[1]);
        }
        $long = $lon;
        $address=geo2address($lat,$long);
        function geo2address($lat,$long) {
            $url = "http://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$long&sensor=false";
            $curlData=file_get_contents($url);
            $address = json_decode($curlData);
            $a=$address->results[0];
            return explode(",",$a->formatted_address);
        }
        //print_r($address);


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
                    position:myCenter,
                });

                marker.setMap(map);
            }

            google.maps.event.addDomListener(window, 'load', initialize);
        </script>

                    <div id="googleMap" style="width:850px;height:450px;"></div>

                    <br>
                    <br>
    </div>
        </div>
    </div>


</body>
</html>