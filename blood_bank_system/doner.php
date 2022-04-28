<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[doner_id])
	{
		$SQL="SELECT * FROM doner WHERE doner_id = $_REQUEST[doner_id]";
		$rs=mysql_query($SQL) or die(mysql_error());
		$data=mysql_fetch_assoc($rs);
	}
?> 
<script>

jQuery(function() {
	jQuery( "#doner_dob" ).datepicker({
	  changeMonth: true,
	  changeYear: true,
	   yearRange: "-65:-10",
	   dateFormat: 'd MM,yy'
	});
	jQuery('#frm_doner').validate({
		rules: {
			doner_confirm_password: {
				equalTo: '#doner_password'
			}
		}
	});
});
function validateForm(obj) {
	if(validateEmail(obj.doner_email.value))
		return true;
	jQuery('#error-msg').show();
	return false;
}
</script>
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1">
			<div class="contact">
				<h4 class="heading colr">Donor Registration</h4>
				<?php
				if($_REQUEST['msg']) { 
				?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
				<?php
				}
				?>
				<div class="msg" style="display:none" id="error-msg">Enter valid EmailID !!!</div>
				<form action="lib/doner.php" enctype="multipart/form-data" method="post" name="frm_doner" onsubmit="return validateForm(this)">
					<ul class="forms">
						<li class="txt">Name</li>
						<li class="inputfield"><input name="doner_name" type="text" class="bar" required value="<?=$data[doner_name]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Blood Group</li>
						<li class="inputfield"><input name="doner_blood_group" type="text" class="bar" required value="<?=$data[doner_blood_group]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Mobile</li>
						<li class="inputfield"><input name="doner_mobile" type="text" class="bar" required value="<?=$data[doner_mobile]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Email</li>
						<li class="inputfield"><input name="doner_email" id="doner_email" type="text" class="bar" required value="<?=$data[doner_email]?>" onchange="validateEmail(this)" /></li>
					</ul>
					<ul class="forms">
						<li class="txt">Date of Birth</li>
						<li class="inputfield"><input name="doner_dob" id="doner_dob" type="text" class="bar" required value="<?=$data[doner_dob]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Address Line 1</li>
						<li class="inputfield"><input name="doner_add1" type="text" class="bar" required value="<?=$data[doner_add1]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Address Line 2</li>
						<li class="inputfield"><input name="doner_add2" type="text" class="bar" required value="<?=$data[doner_add2]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">City</li>
						<li class="inputfield"><input name="doner_city" type="text" class="bar" required value="<?=$data[doner_city]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">State</li>
						<li class="inputfield"><input name="doner_state" type="text" class="bar" required value="<?=$data[doner_state]?>"/></li>
					</ul>
					<!--<ul class="forms">
						<li class="txt">City</li>
						<li class="inputfield">
							<select name="doner_city" class="bar" required/>
								?php echo get_new_optionlist("city","city_id","city_name",$data[doner_city]); ?>
							</select>
						</li>
					</ul>
					<ul class="forms">
						<li class="txt">State</li>
						<li class="inputfield">
							<select name="doner_state" class="bar" required/>
								?php echo get_new_optionlist("state","state_id","state_name",$data[doner_state]); ?>
							</select>
						</li>
					</ul>
					<ul class="forms">
						<li class="txt">Country</li>
						<li class="inputfield">
							<select name="doner_country" class="bar" required/>
								?php echo get_new_optionlist("country","country_id","country_name",$data[doner_country]); ?>
							</select>
						</li>
					</ul>-->
					<ul class="forms">
						<li class="txt">Photo</li>
						<li class="inputfield"><input name="doner_image" type="file" class="bar"/></li>
					</ul>
					<div class="clear"></div>
					<ul class="forms">
						<li class="txt">&nbsp;</li>
						<li class="textfield"><input type="submit" value="Submit" class="simplebtn"></li>
						<li class="textfield"><input type="reset" value="Reset" class="resetbtn"></li>
					</ul>
					<input type="hidden" name="act" value="save_doner">
					<input type="hidden" name="avail_image" value="<?=$data[doner_image]?>">
					<input type="hidden" name="doner_id" value="<?=$data[doner_id]?>">
				</form>
			</div>
		</div>
		<div class="col2">
			<?php if($_REQUEST[doner_id]) { ?>
			<div class="contactfinder">
				<h4 class="heading colr">Profile of <?=$data['doner_name']?></h4>
				<div><img src="<?=$SERVER_PATH.'uploads/'.$data[doner_image]?>" style="width: 250px"></div><br>
			</div> 
			<?php } ?>
		</div>
		<div class="col2">
			<?php include_once("includes/sidebar.php"); ?> 
		</div>
	</div>
<?php
	if($_SESSION['doner_details']['doner_level_id'] != 1)
	{
?>
	<script>
		jQuery( "#doner_level_id" ).val(3);
		jQuery( "#doner_level" ).hide();
	</script>
<?php		
	}
?>
<?php include_once("includes/footer.php"); ?> 