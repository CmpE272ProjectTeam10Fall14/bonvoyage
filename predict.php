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
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/respond.js"></script>

	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
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

                <div class="col-lg-6">

                    <br>
                    <div>
                        <img src="./pins/<?php echo $pin_row['image_name'];?>"
                        class="img-rounded" height="400" width="560"/>
                    </div>

                    <br>
                </div>

                <div class="col-lg-3">
                    <br>
                    <p><b>Overview</b>
                    <div class=”form-group″>
                        <text class="form-control" id="description" name="description" disabled = "true"><?php echo $pin_row['description']; ?></text>
                    </div>
                    </p>

                    <p><b>Cost</b>
                    <div class=”form-group″>
                        <text class="form-control" id="cost" name="cost" disabled = "true"><?php echo $pin_row['cost']; ?></text>
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
        $nextlat=$lat;
		$nextlon=$lon;
	
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

                    <div id="googleMap" style="width:270px;height:160px;"></div>
                </div>
            </div>

            <div id="main" class="row">

                <div id="content">

                    <div class="col-lg-3">
                    </div>

                    <div class="col-lg-9">
                    <p><b>Suggested Places</b>


                    <button type="button" tabindex="0" class="btn btn-primary" role="button" data-toggle="popover" data-trigger="focus"
                            title="Suggestions" data-content="These places are within a 5 mile radius of your trip location.">How does it work?</button>

                    <?php

                    $dir = "./gps";

                    function readGPSinfoEXIF($image_full_name)
                    {
                        $exif=exif_read_data($image_full_name, 0, true);
                        if(!$exif || $exif['GPS']['GPSLatitude'] == '') {
                            return false;
                        } else {
                            $lat_ref = $exif['GPS']['GPSLatitudeRef'];
                            $lat = $exif['GPS']['GPSLatitude'];
                            list($num, $dec) = explode('/', $lat[0]);
                            $lat_s = $num / $dec;
                            list($num, $dec) = explode('/', $lat[1]);
                            $lat_m = $num / $dec;
                            list($num, $dec) = explode('/', $lat[2]);
                            $lat_v = $num / $dec;

                            $lon_ref = $exif['GPS']['GPSLongitudeRef'];
                            $lon = $exif['GPS']['GPSLongitude'];
                            list($num, $dec) = explode('/', $lon[0]);
                            $lon_s = $num / $dec;
                            list($num, $dec) = explode('/', $lon[1]);
                            $lon_m = $num / $dec;
                            list($num, $dec) = explode('/', $lon[2]);
                            $lon_v = $num / $dec;

                            $response = array(
                                "status" => "success",
                                "reason" => "",
                                "gps" => array(
                                    "lat" => $lat,
                                    "lng" => $lon
                                ));

                            $gps_int = array($lat_s + $lat_m / 60.0 + $lat_v / 3600.0, $lon_s
                                + $lon_m / 60.0 + $lon_v / 3600.0);
                            return $gps_int;
                        }
                    }


                    function dirImages($dir)
                    {
                        $d = dir($dir);
                        while (false!== ($file = $d->read()))
                        {
                            $extension = substr($file, strrpos($file, '.'));
                            if($extension == ".jpg" || $extension == ".jpeg" || $extension == ".gif"
                                |$extension == ".png")
                                $images[$file] = $file;
                        }
                        $d->close();
                        return $images;
                    }


                    $array = dirImages('./gps');


                    foreach ($array as $key => $image)
                    {
                        echo "<br />";
                        $image_full_name = $dir."/".$key;
                        $results = readGPSinfoEXIF($image_full_name);
                        $latitude = $results[0];
                        echo "<br />";
                        $longitude = $results[1];


                        $image_name = ltrim($image_full_name,"./gps/");

                        $templat= $nextlat; //this is where the current image latitude will be put
                        $templon= $nextlon; //this is where the current image longitude will be put


                        $rangeLatPlus = $templat+2;
                        $rangeLonPlus = $templon+2;
                        $rangeLatMinus = $templat-2;
                        $rangeLonMinus = $templon-2;

                        if($latitude <= $rangeLatPlus && $latitude >= $rangeLatMinus)
                        {  // if($longitude <= $rangeLonPlus && $longitude >= $rangeLonMinus)

                            include('predict_display.php'); }
                        else
                        {echo "No Nearby Pins";}


                    }
                    ?>
                <div>
             </div>
    </div>



    </div>


</div>

</body>
</html>