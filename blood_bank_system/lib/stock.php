<?php
	include_once("../includes/db_connect.php");
	include_once("../includes/functions.php");
	if($_REQUEST[act]=="save_stock")
	{
		save_stock();
		exit;
	}
	if($_REQUEST[act]=="delete_stock")
	{
		delete_stock();
		exit;
	}
	if($_REQUEST[act]=="update_stock_status")
	{
		update_stock_status();
		exit;
	}
	
	###Code for save stock#####
	function save_stock()
	{
		$R=$_REQUEST;						
		if($R[stock_id])
		{
			$statement = "UPDATE `stock` SET";
			$cond = "WHERE `stock_id` = '$R[stock_id]'";
			$msg = "Data Updated Successfully.";
		}
		else
		{
			$statement = "INSERT INTO `stock` SET";
			$cond = "";
			$msg="Data saved successfully.";
		}
		$SQL=   $statement." 
				`stock_blood_id` = '$R[stock_blood_id]', 
				`stock_date` = '$R[stock_date]', 
				`stock_number` = '$R[stock_number]', 
				`stock_description` = '$R[stock_description]'". 
				 $cond;
		$rs = mysql_query($SQL) or die(mysql_error());
		header("Location:../stock-report.php?msg=$msg");
	}
#########Function for delete stock##########3
function delete_stock()
{	
	/////////Delete the record//////////
	$SQL="DELETE FROM stock WHERE stock_id = $_REQUEST[stock_id]";
	mysql_query($SQL) or die(mysql_error());
	header("Location:../stock-report.php?msg=Deleted Successfully.");
}
?>