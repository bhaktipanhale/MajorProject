<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[app_id])
	{
		$SQL="SELECT * FROM appointment WHERE app_id = $_REQUEST[app_id]";
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
	if(validateEmail(obj.app_email.value))
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
				<h4 class="heading colr">Appointment</h4>
				<?php
				if($_REQUEST['msg']) { 
				?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
				<?php
				}
				?>
				<div class="msg" style="display:none" id="error-msg">Enter valid EmailID !!!</div>
				<form action="lib/appointment.php" enctype="multipart/form-data" method="post" name="frm_doner" onsubmit="return validateForm(this)">
					<ul class="forms">
						<li class="txt">Name</li>
						<li class="inputfield"><input name="app_name" type="text" class="bar" required value="<?=$data[app_name]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Mobile</li>
						<li class="inputfield"><input name="app_mobile" type="text" class="bar" required value="<?=$data[app_mobile]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Email</li>
						<li class="inputfield"><input name="app_email" id="app_email" type="text" class="bar" required value="<?=$data[app_email]?>" onchange="validateEmail(this)" /></li>
					</ul><br>
          			<ul class="forms">
          			<?php $mindate = date("Y-m-d");
  						?>
						<li class="txt">Reservation Date</li>
						<li class="inputfield"><input name="app_date" id="app_date" type="date" class="bar" required value="<?=date("Y-m-d")?>" /></li>
					</ul><br>
          			<ul class="forms">
						<li class="txt">Time</li>
						<li class="inputfield"><input name="app_time" id="app_time" type="time" class="bar" required value="<?=$data[app_email]?>"  /></li>
					</ul><br>
					<ul class="forms">
						<li class="txt">Address</li>
						<li class="inputfield"><input name="app_add1" type="text" class="bar" required value="<?=$data[app_add1]?>"/></li>
					</ul>
					
					<div class="clear"></div>
					<ul class="forms">
						<li class="txt">&nbsp;</li>
						<li class="textfield"><input type="submit" value="Submit" class="simplebtn"></li>
						<li class="textfield"><input type="reset" value="Reset" class="resetbtn"></li>
					
					<input type="hidden" name="act" value="save_app">
					<input type="hidden" name="app_id" value="<?=$data[app_id]?>">
				</form>
			</div>
		</div>
		<div class="col2">
			<?php if($_REQUEST[app_id]) { ?>
			<div class="contactfinder">
				<h4 class="heading colr">Profile of <?=$data['app_name']?></h4>
			</div> 
			<?php } ?>
		</div>
		<div class="col2">
			<?php include_once("includes/sidebar.php"); ?> 
		</div>
	</div>
<?php
	if($_SESSION['app_details']['app_level_id'] != 1)
	{
?>
	<script>
		jQuery( "#app_level_id" ).val(3);
		jQuery( "#app_level" ).hide();
	</script>
<?php		
	}
?>
