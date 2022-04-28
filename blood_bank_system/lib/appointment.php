<?php
	session_start();
	include_once("../includes/db_connect.php");
	include_once("../includes/functions.php");
	if($_REQUEST[act]=="save_app")
	{
		save_app();
		exit;
	} 
	if($_REQUEST[act]=="delete_app")
	{
		delete_app();
		exit;
	}
	if($_REQUEST[act]=="get_report")
	{
		get_report();
		exit;
	}
	###Code for save doner#####
	function save_app()
	{
		$R=$_REQUEST;
		/////////////////////////////////////
		/*$image_name = $_FILES[app_image][name];
		$location = $_FILES[app_image][tmp_name];
		if($image_name!="")
		{
			move_uploaded_file($location,"../uploads/".$image_name);
		}
		else
		{
			$image_name = $R[avail_image];
		}*/
		//die;
		if($R[app_id])
		{
			$statement = "UPDATE `appointment` SET";
			$cond = "WHERE `app_id` = '$R[app_id]'";
			$msg = "Data Updated Successfully.";
			
		}
		else
		{
			$statement = "INSERT INTO `appointment` SET";
			$cond = "";
			$msg="Data saved successfully.";
		}
		$SQL=   $statement." 
				`app_name` = '$R[app_name]', 
				`app_mobile` = '$R[app_mobile]', 
				`app_email` = '$R[app_email]', 
				`app_date` = '$R[app_date]', 
				`app_time` = '$R[app_time]', 
                `app_add1` = '$R[app_add1]'".

				 $cond;
        $rs = mysql_query($SQL) or die(mysql_error());
                 header("Location:../appointment-report.php?msg=$msg");
             }
         #########Function for delete doner##########3
         function delete_app()
         {
             $SQL="SELECT * FROM appointment WHERE app_id = $_REQUEST[app_id]";
             $rs=mysql_query($SQL);
             $data=mysql_fetch_assoc($rs);
             
             /////////Delete the record//////////
             $SQL="DELETE FROM appointment WHERE app_id = $_REQUEST[app_id]";
             mysql_query($SQL) or die(mysql_error());
             
             //////////Delete the image///////////
             /*if($data[doner_image])
             {
                 unlink("../uploads/".$data[doner_image]);
             }*/
             header("Location:../appointment-report.php?msg=Deleted Successfully.");
         }
         ?>		