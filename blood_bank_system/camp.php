<?php 
    include_once("includes/header.php"); 
    if($_REQUEST[camp_id])
    {
        $SQL="SELECT * FROM camp WHERE camp_id = $_REQUEST[camp_id]";
        $rs=mysql_query($SQL) or die(mysql_error());
        $data=mysql_fetch_assoc($rs);
    }
?> 
<script>



</script>
    <div class="crumb">
    </div>
    <div class="clear"></div>
    <div id="content_sec">
        <div class="col1">
            <div class="contact">
                <h4 class="heading colr">Campaign Registration Form</h4>
                <?php
                if($_REQUEST['msg']) { 
                ?>
                <div class="msg"><?=$_REQUEST['msg']?></div>
                <?php
                }
                ?>
                <form action="lib/camp.php" enctype="multipart/form-data" method="post" name="frm_doner" onsubmit="return validateForm(this)">
                    <ul class="forms">
                        <li class="txt">Title</li>
                        <li class="inputfield"><input name="camp_title" type="text" class="bar" required value="<?=$data[camp_title]?>"/></li>
                    </ul>
                  <ul class="forms">
                        <li class="txt">Description</li>
                        <li class="inputfield"><input name="description" type="text" class="bar" required value="<?=$dat[description]?>"/></li>
                    </ul>
                    <ul class="forms">
						<li class="txt">City</li>
						<li class="inputfield"><input name="camp_city" type="text" class="bar" required value="<?=$data[camp_city]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">State</li>
						<li class="inputfield"><input name="camp_state" type="text" class="bar" required value="<?=$data[camp_state]?>"/></li>
					</ul>
                    <!--<ul class="forms">
                        <li class="txt">City</li>
                        <li class="inputfield">
                            <select name="camp_city" class="bar" required>
                                ?php echo get_new_optionlist("city","city_id","city_name",$data[camp_city]); ?>
                            </select>
                        </li>
                    </ul>
                    <ul class="forms">
                        <li class="txt">State</li>
                        <li class="inputfield">
                            <select name="camp_state" class="bar" required>
                                ?php echo get_new_optionlist("state","state_id","state_name",$data[camp_state]); ?>
                            </select>
                        </li>
                    </ul>
                    <ul class="forms">
                        <li class="txt">Country</li>
                        <li class="inputfield">
                            <select name="camp_country" class="bar" required>
                                ?php echo get_new_optionlist("country","country_id","country_name",$data[camp_country]); ?>
                            </select>
                        </li>
                    </ul>-->
          <ul class="forms">
                        <li class="txt">Mobile</li>
                        <li class="inputfield"><input name="camp_mobile" type="text" class="bar" required value="<?=$data[camp_mobile]?>"/></li>
                    </ul>
                    <ul class="forms">
                        <li class="txt">Photo</li>
                        <li class="inputfield"><input name="camp_image" type="file" class="bar"/></li>
                    </ul>
                    <div class="clear"></div>
                    <ul class="forms">
                        <li class="txt">&nbsp;</li>
                        <li class="textfield"><input type="submit" value="Submit" class="simplebtn"></li>
                        <li class="textfield"><input type="reset" value="Reset" class="resetbtn"></li>
                    </ul>
                    <input type="hidden" name="act" value="save_camp">
                    <input type="hidden" name="avail_image" value="<?=$data[camp_image]?>">
                    <input type="hidden" name="camp_id" value="<?=$data[camp_id]?>">
                </form>
            </div>
        </div>
        <div class="col2">
            <?php if($_REQUEST[camp_id]) { ?>
            <div class="contactfinder">
                <h4 class="heading colr">Profile of <?=$data['camp_title']?></h4>
                <div><img src="<?=$SERVER_PATH.'uploads/'.$data[camp_image]?>" style="width: 250px"></div><br>
            </div> 
            <?php } ?>
        </div>
        <div class="col2">
            <?php include_once("includes/sidebar.php"); ?> 
        </div>
    </div>
<?php
    if($_SESSION['camp_details']['camp_level_id'] != 1)
    {
?>
    <script>
        jQuery( "#camp_level_id" ).val(3);
        jQuery( "#camp_level" ).hide();
    </script>
<?php       
    }
?>
<?php include_once("includes/footer.php"); ?>