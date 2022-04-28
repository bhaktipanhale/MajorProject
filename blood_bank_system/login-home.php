<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[car_id])
	{
		$SQL="SELECT * FROM car WHERE car_id = $_REQUEST[car_id]";
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
					<h4 class="heading colr">Welcome to Blood Bank Management System</h4>
					<div class='msg'><?=$_REQUEST['msg']?></div>
					<ul class='login-home-listing'>
						<?php if($_SESSION['user_details']['user_level_id'] == 1) {?>
							<li><a href="doner.php">Add Blood Donor</a></li>
							<!--<li><a href="blood.php">Add Blood</a></li>-->
							<li><a href="stock.php">Add Blood Stock</a></li>
							<li><a href="doner-report.php">Donors Report</a></li>
							<!--<li><a href="blood-report.php">Blood Report</a></li>-->
							<li><a href="stock-report.php">Stock Report</a></li>
							<!--<li><a href="find-doner.php">Find Donors</a></li>-->
							<li><a href="change-password.php">Change Password</a></li>
							<li><a href="./lib/login.php?act=logout">Logout</a></li>
						<?php } ?>
					</ul>
			</div>
		</div>
		<div class="col2">
			<?php include_once("includes/sidebar.php"); ?> 
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
