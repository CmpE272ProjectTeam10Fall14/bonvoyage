<?php
//error_reporting(0);
?>
<?php include("conn.php");
if(isset($_GET['loginhandle']))
{

    $_SESSION['user'][0] = 5;
    $current_user_id =  5;
    $twitterid=5;
}
else
{

    $twitterid=0;
}
?>
<?php
if(isset($_GET['action'])&&$_GET['action']=="logout"){
    unset($_SESSION['user']);
    Header("Location:index.php");
}
?>
<script type="text/javascript" language="javascript">
    function search_pin() {
        var search_text = document.getElementById('search_input').value;
        if(search_text == "Search") {
            return false;
        }
        window.location.href = "search.php?text=" + search_text;
    }
</script>
<style>
    .glyphicon-home{font-size:3em;}
    .glyphicon-log-out{font-size:3em;}
    .glyphicon-log-in{font-size:3em;}
    .glyphicon-font{font-size:3em;}

</style>

<div id="header_field">

    <div id="menu">
        <ul>
            <?php
            if(!isset($_SESSION['user'][0])){
                ?>
            <li id="about_menu">
               <a href="about.php"><span class="glyphicon glyphicon-font"></span></a>
            </li>

            <?php
            }
            else{
                ?>
            <li  id="home">
                <a href="main.php"><span class="glyphicon glyphicon-home"></span></a>
            </li>

        <!-- <li><a href="add.php" class="myButton">My Stories</a></li>
         <li><a href="add.php" class="myButton">Create Story + </a></li>
            <li><a href="add.php" class="myButton">Add A Pin + </a></li>
            --><?php
            }
            ?>


            <li  id="log">
                <?php
                if(!isset($_SESSION['user'][0])){
                    ?>

                    <a href="login.php"><span class="glyphicon glyphicon-log-in"></span></a>

                <?php
                }
                else{
                    ?>
                    <a href="index.php?action=logout"><span class="glyphicon glyphicon-log-out"></span></a>

                <!--    <a href="pins.php" class="myButton">
                    <span class="head_pic_menu">
                    <img class="head_pic" src="./head_pics/<?php  echo $_SESSION['user'][3]; ?>" />
                    <?php echo $_SESSION['user'][1]; ?>
                    <img class="triangle" src="./image/triangle.png" /></span></a>
               <ul>
                   <li><a href="boards.php?id=<?php echo $_SESSION['user'][0]; ?>">Boards</a></li>
                    <li><a href="pins.php?id=<?php echo $_SESSION['user'][0]; ?>">Pins</a></li>
                    <li class="divide"><a href="likes.php?id=<?php echo $_SESSION['user'][0]; ?>">Likes</a></li>
                    <li><a href="settings.php?id=<?php echo $_SESSION['user'][0]; ?>">Settings</a></li>
                    <li><a href="login.php?action=logout">Logout</a></li>
                </ul>-->
                <?php } ?>

            </li>
        </ul>

    </div>

    <div id="logo">
        <a href="index.php"><img src="image/brown.jpg" /></a>
    </div>
    <!--

    <div id="search_field">
        <div id="search_form">
            <input id="search_input" type="text" value="Search" onfocus="if(value=='Search'){value=''}" onblur="if(value==''){value='Search'}" />
            <a onclick="search_pin()" type="submit"><img src="image/search-icon.jpg" /></a>
        </div>
    </div>
    -->
</div>