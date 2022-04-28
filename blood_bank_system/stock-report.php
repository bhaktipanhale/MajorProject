<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	$SQL="SELECT * FROM `stock`, `type` WHERE stock_blood_id = type_id";
	$rs=mysql_query($SQL) or die(mysql_error());
?>
<script>
function delete_stock(stock_id)
{
	if(confirm("Do you want to delete the stock?"))
	{
		this.document.frm_stock.stock_id.value=stock_id;
		this.document.frm_stock.act.value="delete_stock";
		this.document.frm_stock.submit();
	}
}
</script>
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1" style="width:100%">
		<div class="contact">
			<h4 class="heading colr">Stock Report</h4>
			<?php
			if($_REQUEST['msg']) { 
			?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
			<?php
			}
			?>
			<form name="frm_stock" action="lib/stock.php" method="post">
				<div class="static">
					<table style="width:100%">
					  <tbody>
					  <tr class="tablehead bold">
					    <td scope="col">ID</td>
						<td scope="col">Type</td>
						<td scope="col">Units Available</td>
						<td scope="col">Updated Date</td>
						<td scope="col">Action</td>
					  </tr>
					<?php 
					$sr_no=1;
					while($data = mysql_fetch_assoc($rs))
					{
					?>
					  <tr>
						<td><?=$data[stock_id]?></td>
						<td><?=$data[type_title]?></td>
						<td><?=$data[stock_number]?></td>
						<td><?=$data[stock_date]?></td>
						<td style="text-align:center">
							<a href="stock.php?stock_id=<?php echo $data[stock_id] ?>">Edit</a> | <a href="Javascript:delete_stock(<?=$data[stock_id]?>)">Delete</a> </td>
						</td>
					  </tr>
					<?php } ?>
					</tbody>
					</table>
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="stock_id" />
			</form>
		</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 