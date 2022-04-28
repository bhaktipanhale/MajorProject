<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[stock_id])
	{
		$SQL="SELECT * FROM `stock` WHERE stock_id = $_REQUEST[stock_id]";
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
				<h4 class="heading colr">Stock Entry Form</h4>
				<?php if($_REQUEST['msg']) { ?>
					<div class="msg"><?=$_REQUEST['msg']?></div>
				<?php } ?>
				<form action="lib/stock.php" enctype="multipart/form-data" method="post" name="frm_stock">
					<ul class="forms">
						<li class="txt">Stock Type</li>
						<li class="inputfield">
							<select name="stock_blood_id" class="bar" required/>
								<?php echo get_new_optionlist("type","type_id","type_title",$data[stock_blood_id]); ?>
							</select>
						</li>
					</ul>
					<ul class="forms">
						<li class="txt">Units</li>
						<li class="inputfield"><input name="stock_number" id="stock_number" type="text" class="bar" required value="<?=$data[stock_number]?>"/></li>
					</ul>
					<ul class="forms">
					<?php $mindate = date("Y-m-d");
  ?>
						<li class="txt">Date</li>
						<li class="inputfield"><input name="stock_date" id="stock_date" type="date" class="bar" required value="<?=$data[stock_date]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Description</li>
						<li class="textfield"><textarea name="stock_description" cols="" rows="6" required><?=$data[stock_description]?></textarea></li>
					</ul>
					<div class="clear"></div>
					<ul class="forms">
						<li class="txt">&nbsp;</li>
						<li class="textfield"><input type="submit" value="Submit" class="simplebtn"></li>
						<li class="textfield"><input type="reset" value="Reset" class="resetbtn"></li>
					</ul>
					<input type="hidden" name="act" value="save_stock">
					<input type="hidden" name="stock_id" value="<?=$data[stock_id]?>">
				</form>
			</div>
		</div>
		<div class="col2">
			<?php include_once("includes/sidebar.php"); ?> 
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 