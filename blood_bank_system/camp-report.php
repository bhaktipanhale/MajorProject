<?php 
    include_once("includes/header.php"); 
    include_once("includes/db_connect.php"); 
    $SQL="SELECT * FROM camp";
    $rs=mysql_query($SQL) or die(mysql_error());
    global $SERVER_PATH;
?>
<script>
function delete_doner(camp_id)
{
    if(confirm("Do you want to delete the camp?"))
    {
        this.document.frm_camp.camp_id.value=camp_id;
        this.document.frm_camp.act.value="delete_camp";
        this.document.frm_camp.submit();
    }
}
</script>
    <div class="crumb">
    </div>
    <div class="clear"></div>
    <div id="content_sec">
        <div class="col1" style="width:100%">
        <div class="contact">
                <h4 class="heading colr">Campaign Reports</h4>
            <form name="frm_camp" action="lib/camp.php" method="post">
                <div class="static">
                    <table style="width:100%">
                      <tbody>
                      <tr class="tablehead bold">
                        <td scope="col">Sr. No.</td>
                        <td scope="col">Image</td>
                        <td scope="col">Title</td>
                        <td scope="col">City</td>
                        <td scope="col">State</td>
                        <td scope="col">Mobile</td>
                        <td scope="col">Action</td>
                      </tr>
                    <?php 
                    $sr_no=1;
                    while($data = mysql_fetch_assoc($rs))
                    {
                    ?>
                      <tr>
                        <td style="text-align:center; font-weight:bold;"><?=$sr_no++?></td>
                        <td><img src="<?=$SERVER_PATH.'uploads/'.$data[camp_image]?>" style="heigh:50px; width:50px"></td>
                        <td><?=$data[camp_title]?></td>
                        <td><?=$data[camp_city]?></td>
                        <td><?=$data[camp_state]?></td>
                        <td><?=$data[camp_mobile]?></td>
                        <td style="text-align:center"><a href="camp.php?camp_id=<?php echo $data[camp_id] ?>">Edit</a> | <a href="Javascript:delete_camp(<?=$data[camp_id]?>)">Delete</a> </td>
                      </tr>
                    <?php } ?>
                    </tbody>
                    </table>
                </div>
                <input type="hidden" name="act" />
                <input type="hidden" name="camp_id" />
            </form>
        </div>
        </div>
    </div>
<?php include_once("includes/footer.php"); ?>