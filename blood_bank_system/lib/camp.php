<?php
    session_start();
    include_once("../includes/db_connect.php");
    include_once("../includes/functions.php");
    if($_REQUEST[act]=="save_camp")
    {
        save_camp();
        exit;
    }
    if($_REQUEST[act]=="delete_camp")
    {
        delete_camp();
        exit;
    }
    if($_REQUEST[act]=="get_report")
    {
        get_report();
        exit;
    }
    ###Code for save doner#####
    function save_camp()
    {
        $R=$_REQUEST;
        /////////////////////////////////////
        $image_name = $_FILES[camp_image][name];
        $location = $_FILES[camp_image][tmp_name];
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
            $statement = "UPDATE `camp` SET";
            $cond = "WHERE `camp_id` = '$R[camp_id]'";
            $msg = "Data Updated Successfully.";
            $condQuery = "";
        }
        else
        {
            $statement = "INSERT INTO `camp` SET";
            $cond = "";
            $msg="Data saved successfully.";
        }
        $SQL=   $statement." 
                `camp_title` = '$R[camp_title]',  
                `description` = '$R[description]',
                `camp_city` = '$R[camp_city]', 
                `camp_state` = '$R[camp_state]', 
                `camp_mobile` = '$R[camp_mobile]', 
                `camp_image` = '$image_name'". 
                 $cond;
        $rs = mysql_query($SQL) or die(mysql_error());
        header("Location:../camp-report.php?msg=$msg");
    }
#########Function for delete doner##########3
function delete_doner()
{
    $SQL="SELECT * FROM camp WHERE camp_id = $_REQUEST[camp_id]";
    $rs=mysql_query($SQL);
    $data=mysql_fetch_assoc($rs);
    
    /////////Delete the record//////////
    $SQL="DELETE FROM camp WHERE camp_id = $_REQUEST[camp_id]";
    mysql_query($SQL) or die(mysql_error());
    
    //////////Delete the image///////////
    if($data[camp_image])
    {
        unlink("../uploads/".$data[camp_image]);
    }
    header("Location:../camp-report.php?msg=Deleted Successfully.");
}
?>