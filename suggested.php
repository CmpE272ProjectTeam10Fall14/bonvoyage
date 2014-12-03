<?php
error_reporting(0);
?>

<div id="pin_dinplay" class="pin">
    <ul>
        <?php
        $current_user_id = $_SESSION['user'][0];

        $PIN_SQL="SELECT avg(cost) as avgcost FROM `pin` where user_id = '$current_user_id' ";
        $pin_query=mysql_query($PIN_SQL);
        $pin_row=mysql_fetch_array($pin_query);
        $cost = $pin_row['avgcost'];

        $PIN_SQL="SELECT * FROM `pin` where user_id != '$current_user_id' and cost <'$cost'";
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

                        <a id="<?php echo $like_button; ?>" class="like_button" href="javascript:void(0);" onclick="add_like(<?php echo $pin_row['pin_id']; ?>)"><span class="glyphicon glyphicon-thumbs-up"></a>

                    <?php
                    }
                    else {
                        ?>

                        <a id="<?php echo $unlike_button; ?>" class="unlike_button" href="javascript:void(0);" onclick="delete_like(<?php echo $pin_row['pin_id']; ?>)"><span class="glyphicon glyphicon-thumbs-down"></a>
                    <?php
                    }
                    if($_SESSION['user'][0] == $pin_user_id) {
                        ?>
                        <a id="<?php echo $delete_button; ?>" class="delete_button" href="javascript:void(0);" onclick="delete_pin(<?php echo $pin_row['pin_id']; ?>)"><span class="glyphicon glyphicon-remove"></a>
                    <?php 	}
                }
                ?>
                <!--<a href="./pins/<?php echo $pin_row['image_name']; ?>"><img src="./pins/<?php echo $pin_row['image_name'];?>"/></a>-->
                <?php $pin=$pin_row['pin_id'];?>
                <a href="predict.php?pin_id=<?php echo $pin;?>"><img src="./pins/<?php echo $pin_row['image_name'];?>"</a>
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
                    //}
                    }
                    ?>
                </div>
            </li>

        <?php
        }
        ?>
    </ul>
</div>