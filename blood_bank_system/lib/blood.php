<?php
	include_once("../includes/db_connect.php");
	include_once("../includes/functions.php");
	if($_REQUEST[act]=="save_blood")
	{
		save_blood();
		exit;
	}
	if($_REQUEST[act]=="delete_blood")
	{
		delete_blood();
		exit;
	}
	if($_REQUEST[act]=="update_blood_status")
	{
		update_blood_status();
		exit;
	}
	
	###Code for save blood#####
	function save_blood()
	{
		$R=$_REQUEST;						
		if($R[blood_id])
		{
			$statement = "UPDATE `blood` SET";
			$cond = "WHERE `blood_id` = '$R[blood_id]'";
			$msg = "Data Updated Successfully.";
		}
		else
		{
			$statement = "INSERT INTO `blood` SET";
			$cond = "";
			$msg="Data saved successfully.";
		}
		$SQL=   $statement." 
				`blood_type_id` = '$R[blood_type_id]', 
				`blood_price_per_unit` = '$R[blood_price_per_unit]', 
				`blood_description` = '$R[blood_description]'". 
				 $cond;
		$rs = mysql_query($SQL) or die(mysql_error());
		header("Location:../blood-report.php?msg=$msg");
	}
#########Function for delete blood##########3
function delete_blood()
{	
	/////////Delete the record//////////
	$SQL="DELETE FROM blood WHERE blood_id = $_REQUEST[blood_id]";
	mysql_query($SQL) or die(mysql_error());
	header("Location:../blood-report.php?msg=Deleted Successfully.");
}
?>