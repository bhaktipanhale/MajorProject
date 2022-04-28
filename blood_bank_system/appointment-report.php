<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	$SQL="SELECT * FROM appointment";
	$rs=mysql_query($SQL) or die(mysql_error());
	global $SERVER_PATH;
?>
<script>
function delete_app(app_id)
{
	if(confirm("Do you want to delete the appointment?"))
	{
		this.document.frm_app.app_id.value=app_id;
		this.document.frm_app.act.value="delete_app";
		this.document.frm_app.submit();
	}
}
</script>
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1" style="width:100%">
		<div class="contact">
				<h4 class="heading colr">Appointment Reports</h4>
			<form name="frm_app" action="lib/appointment.php" method="post">
				<div class="static">
					<table style="width:100%">
					  <tbody>
					  <tr class="tablehead bold">
						<td scope="col">Sr. No.</td>
						<td scope="col">Name</td>
						<td scope="col">Mobile</td>
						<td scope="col">Email</td>
						<td scope="col">Date</td>
						<td scope="col">Time</td>
                        <td scope="col">Address</td>
						<td scope="col">Action</td>
					  </tr>
					<?php 
					$sr_no=1;
					while($data = mysql_fetch_assoc($rs))
					{
					?>
					  <tr>
						<td style="text-align:center; font-weight:bold;"><?=$sr_no++?></td>
						<td><?=$data[app_name]?></td>
						<td><?=$data[app_mobile]?></td>
						<td><?=$data[app_email]?></td>
						<td><?=$data[app_date]?></td>
						<td><?=$data[app_time]?></td>
                        <td><?=$data[app_add1]?></td>
						<td style="text-align:center"><a href="appointment.php?app_id=<?php echo $data[app_id] ?>">Edit</a> | <a href="Javascript:delete_app(<?=$data[app_id]?>)">Delete</a> </td>
					  </tr>
					<?php } ?>
					</tbody>
					</table>
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="app_id" />
			</form>
		</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 