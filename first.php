<?php
/* $siteroot points to the development folder.
   Reset it to an empty string when deploying the live site. */
$siteroot = '/bonVoyage';
// date_default_timezone_set('America/Los_Angeles');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="./css/style.css" type="text/css" rel="stylesheet" />
    <script src="js/jquery-1.6.js" type="text/javascript" language="javascript"></script>
    <script src="js/jquery.masonry.min.js.js" type="text/javascript" language="javascript"></script>
    <link href= "./css/handp.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/jquery.shadow.js"></script>
    <script type="text/javascript" src="js/jquery.ifixpng.js"></script>

    <script type="text/javascript" src="js/jquery.fancyzoom.js"></script>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>bonVoyage</title>

    <link href="js/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="js/js-image-slider.js" type="text/javascript"></script>

    <link rel="stylesheet" href="css/craftyslide.css" />

</head>

<body>

    <div id="wrapper">
        <div id="header">
            <?php include('header.php'); ?>
        </div><!--end #header-->


    <div id="nav_main" role="navigation" class="reset menu pull_out">
        <ul>
            <li> <a href="<?php echo $siteroot; ?>/arrangements.php" class="parent"><span>Arrangements</span></a>
                <div>
                    <ul>
                        <li> <a href="#">Our Most Popular Flowers</a>
                            <ul>
                                <li><a href="#">Daisies</a></li>
                                <li><a href="#">Tulips</a></li>
                                <li><a href="#">Roses</a></li>
                                <li><a href="#">Lilies</a></li>
                                <li><a href="#">Irises</a></li>
                                <li><a href="#">Mums</a></li>
                                <li><a href="#">Carnations</a></li>
                            </ul>
                        </li>
                        <li> <a href="#">Tropicals</a>
                            <ul>
                                <li><a href="#">Gingers</a></li>
                                <li><a href="#">Heliconias</a></li>
                                <li><a href="#">Tuberose</a></li>
                                <li><a href="#">Ferns</a></li>
                            </ul>
                        </li>
                        <li> <a href="#">Orchids</a>
                            <ul>
                                <li><a href="#">Phalaenopsis</a></li>
                                <li><a href="#">Dendrobium</a></li>
                                <li><a href="#">Oncidium</a></li>
                                <li><a href="#">Cattleya</a></li>
                                <li><a href="#">Cymbidium</a></li>
                            </ul>
                        </li>
                        <li> <a href="<?php echo $siteroot; ?>/mixed/mixed.php">Mixed Arrangements</a>
                            <ul>
                                <li><a href="#">Spring Pastels</a></li>
                                <li><a href="#">Autumn Warmth</a></li>
                                <li><a href="#">Red, White, &amp; Blue</a></li>
                                <li><a href="#">All White</a></li>
                                <li><a href="<?php echo $siteroot; ?>/mixed/roses.php">Mixed Roses</a></li>
                                <li><a href="#">Mixed Irises</a></li>
                                <li><a href="#">Daisies &amp; More Daisies</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </li>
            <li><a href="#"><span>Live Plants</span></a></li>
            <li><a href="<?php echo $siteroot; ?>/bouquet.php"><span>Build-a-Bouquet</span></a></li>
            <li><a href="#"><span>Special Events</span></a></li>
            <li> <a href="#" class="parent"><span>Care Tips</span></a>
                <div class="single_column">
                    <ul>
                        <li><a href="#">Caring for Mixed Bouquets</a></li>
                        <li><a href="#">Caring for Roses</a></li>
                        <li><a href="#">Caring for Tropical Flowers</a></li>
                        <li><a href="#">Caring for House Plants</a></li>
                        <li><a href="<?php echo $siteroot; ?>/care/orchids.php">Caring for Orchids</a></li>
                    </ul>
                </div>
            </li>
            <li><a href="#"><span>Eco-Conscious</span></a></li>
            <li><a href="<?php echo $siteroot; ?>/designers.php"><span>Our Designers</span></a></li>
        </ul>
    </div>
