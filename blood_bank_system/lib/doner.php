<?php
	session_start();
	include_once("../includes/db_connect.php");
	include_once("../includes/functions.php");
	if($_REQUEST[act]=="save_doner")
	{
		save_doner();
		exit;
	}
	if($_REQUEST[act]=="delete_doner")
	{
		delete_doner();
		exit;
	}
	if($_REQUEST[act]=="get_report")
	{
		get_report();
		exit;
	}
	###Code for save doner#####
	function save_doner()
	{
		$R=$_REQUEST;
		/////////////////////////////////////
		$image_name = $_FILES[doner_image][name];
		$location = $_FILES[doner_image][tmp_name];
		if($image_name!="")
		{
			move_uploaded_file($location,"../uploads/".$image_name);
		}
		else
		{
			$image_name = $R[avail_image];
		}
		//die;
		if($R[doner_id])
		{
			$statement = "UPDATE `doner` SET";
			$cond = "WHERE `doner_id` = '$R[doner_id]'";
			$msg = "Data Updated Successfully.";
			$condQuery = "";
		}
		else
		{
			$statement = "INSERT INTO `doner` SET";
			$cond = "";
			$msg="Data saved successfully.";
		}
		$SQL=   $statement." 
				`doner_name` = '$R[doner_name]', 
				`doner_blood_group` = '$R[doner_blood_group]', 
				`doner_add1` = '$R[doner_add1]', 
				`doner_add2` = '$R[doner_add2]', 
				`doner_city` = '$R[doner_city]', 
				`doner_state` = '$R[doner_state]', 
				`doner_email` = '$R[doner_email]', 
				`doner_mobile` = '$R[doner_mobile]', 
				`doner_gender` = '$R[doner_gender]', 
				`doner_dob` = '$R[doner_dob]',
				`doner_image` = '$image_name'". 
				 $cond;
		$rs = mysql_query($SQL) or die(mysql_error());
		header("Location:../doner-report.php?msg=$msg");
	}
#########Function for delete doner##########3
function delete_doner()
{
	$SQL="SELECT * FROM doner WHERE doner_id = $_REQUEST[doner_id]";
	$rs=mysql_query($SQL);
	$data=mysql_fetch_assoc($rs);
	
	/////////Delete the record//////////
	$SQL="DELETE FROM doner WHERE doner_id = $_REQUEST[doner_id]";
	mysql_query($SQL) or die(mysql_error());
	
	//////////Delete the image///////////
	if($data[doner_image])
	{
		unlink("../uploads/".$data[doner_image]);
	}
	header("Location:../doner-report.php?msg=Deleted Successfully.");
}
?>