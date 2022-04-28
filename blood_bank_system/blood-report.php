<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	$SQL="SELECT * FROM `blood`, `type` WHERE blood_type_id = type_id";
	$rs=mysql_query($SQL) or die(mysql_error());
?>
<script>
function delete_blood(blood_id)
{
	if(confirm("Do you want to delete the blood?"))
	{
		this.document.frm_blood.blood_id.value=blood_id;
		this.document.frm_blood.act.value="delete_blood";
		this.document.frm_blood.submit();
	}
}
</script>
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1" style="width:100%">
		<div class="contact">
			<h4 class="heading colr">Blood Report</h4>
			<?php
			if($_REQUEST['msg']) { 
			?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
			<?php
			}
			?>
			<form name="frm_blood" action="lib/blood.php" method="post">
				<div class="static">
					<table style="width:100%">
					  <tbody>
					  <tr class="tablehead bold">
					    <td scope="col">ID</td>
						<td scope="col">Type</td>
						<td scope="col">Cost Per Unit</td>
						<td scope="col">Action</td>
					  </tr>
					<?php 
					$sr_no=1;
					while($data = mysql_fetch_assoc($rs))
					{
					?>
					  <tr>
						<td><?=$data[blood_id]?></td>
						<td><?=$data[type_title]?></td>
						<td><?=$data[blood_price_per_unit]?></td>
						<td style="text-align:center">
							<a href="blood.php?blood_id=<?php echo $data[blood_id] ?>">Edit</a> | <a href="Javascript:delete_blood(<?=$data[blood_id]?>)">Delete</a> </td>
						</td>
					  </tr>
					<?php } ?>
					</tbody>
					</table>
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="blood_id" />
			</form>
		</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 