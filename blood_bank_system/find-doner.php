<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
?>
	<div class="crumb">
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1" style="width:100%">
		<div class="contact">
				<h4 class="heading colr">Doner Reports</h4>
			<form name="frm_doner" action="" method="post" >
					<ul class="forms">
						<li class="txt">City</li>
						<li class="inputfield"><input name="doner_city1" type="text" class="bar" required /></li>
					</ul>
                    <ul class="forms" >
						<li class="txt">&nbsp;</li>
						<li class="textfield"><input type="submit" value="Submit" class="simplebtn"></li>
						<li class="textfield"><input type="reset" value="Reset" class="resetbtn"></li>
					</ul>
                    </div>
                
				<div class="static">
					<table style="width:100%">
					  <tbody>
					  <tr class="tablehead bold">
						<td scope="col">Sr. No.</td>
						<td scope="col">Image</td>
						<td scope="col">Name</td>
						<td scope="col">Mobile</td>
						<td scope="col">Email</td>
						<td scope="col">Group</td>
						<td scope="col">Date Of Birth</td>
						<td scope="col">City</td>
						<td scope="col">Action</td>
					  </tr>
                      <?php
                if(isset($_POST['submit']))
                {
					$sr_no=1;
                    $SQL="SELECT * FROM doner WHERE doner_city LIKE doner_city1";
		            $rs=mysql_query($SQL) or die(mysql_error());
					while($data = mysql_fetch_assoc($rs))
					{
					?>
					  <tr>
						<td style="text-align:center; font-weight:bold;"><?=$sr_no++?></td>
						<td><img src="<?=$SERVER_PATH.'uploads/'.$data[doner_image]?>" style="heigh:50px; width:50px"></td>
						<td><?=$data[doner_name]?></td>
						<td><?=$data[doner_mobile]?></td>
						<td><?=$data[doner_email]?></td>
						<td><?=$data[doner_blood_group]?></td>
						<td><?=$data[doner_dob]?></td>
						<td><?=$data[doner_city]?></td>
						<td style="text-align:center"><a href="doner.php?doner_id=<?php echo $data[doner_id] ?>">Edit</a> | <a href="Javascript:delete_doner(<?=$data[doner_id]?>)">Delete</a> </td>
					  </tr>
					<?php } ?>
					</tbody>
					</table>
				</div>
                <?php  
      }
?>
				<input type="hidden" name="act" />
				<input type="hidden" name="doner_id" />
			</form>
		</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 