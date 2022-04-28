<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[blood_id])
	{
		$SQL="SELECT * FROM `blood` WHERE blood_id = $_REQUEST[blood_id]";
		$rs=mysql_query($SQL) or die(mysql_error());
		$data=mysql_fetch_assoc($rs);
	}
?>
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1">
			<div class="contact">
				<h4 class="heading colr">Blood Entry Form</h4>
				<?php if($_REQUEST['msg']) { ?>
					<div class="msg"><?=$_REQUEST['msg']?></div>
				<?php } ?>
				<form action="lib/blood.php" enctype="multipart/form-data" method="post" name="frm_blood">
					<ul class="forms">
						<li class="txt">Blood Type</li>
						<li class="inputfield">
							<select name="blood_type_id" class="bar" required/>
								<?php echo get_new_optionlist("type","type_id","type_title",$data[blood_type_id]); ?>
							</select>
						</li>
					</ul>
					<ul class="forms">
						<li class="txt">Unit</li>
						<li class="inputfield"><input name="blood_price_per_unit" id="blood_price_per_unit" type="text" class="bar" required value="<?=$data[blood_price_per_unit]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Description</li>
						<li class="textfield"><textarea name="blood_description" cols="" rows="6" required><?=$data[blood_description]?></textarea></li>
					</ul>
					<div class="clear"></div>
					<ul class="forms">
						<li class="txt">&nbsp;</li>
						<li class="textfield"><input type="submit" value="Submit" class="simplebtn"></li>
						<li class="textfield"><input type="reset" value="Reset" class="resetbtn"></li>
					</ul>
					<input type="hidden" name="act" value="save_blood">
					<input type="hidden" name="blood_id" value="<?=$data[blood_id]?>">
				</form>
			</div>
		</div>
		<div class="col2">
			<?php include_once("includes/sidebar.php"); ?> 
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 