<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	$SQL="SELECT * FROM doner";
	$rs=mysql_query($SQL) or die(mysql_error());
	global $SERVER_PATH;
?>
<script>
function delete_doner(doner_id)
{
	if(confirm("Do you want to delete the doner?"))
	{
		this.document.frm_doner.doner_id.value=doner_id;
		this.document.frm_doner.act.value="delete_doner";
		this.document.frm_doner.submit();
	}
}
</script>
	<div class="crumb">
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1" style="width:100%">
		<div class="contact">
				<h4 class="heading colr">Donor Reports</h4>
			<form name="frm_doner" action="lib/doner.php" method="post">
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
					$sr_no=1;
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
				<input type="hidden" name="act" />
				<input type="hidden" name="doner_id" />
			</form>
		</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 