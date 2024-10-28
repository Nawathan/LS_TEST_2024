
<style>
</style>
<?php
	include "./database.php";

if($_POST['event']=='get_announcement'){
    $user_id = $_REQUEST['user_id'];
    $member = $_REQUEST['member'];

    $str_status = " ";
	$array_result = array();
	
    ?>

    <table id="joblist" class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
        <thead>
            <tr class="header ls-bg-blue">
                <th></th>
                <th>Announcement No</th>
                <th>Title</th>
                <th>Type</th>
                <th>Recorder</th>
                <th>Publish</th>
                <th>Start Datetime</th>
                <th>End Datetime</th>
                <th>Edited Datetime</th>
            </tr>
        </thead>
        <tbody>
    <?php

    $sql_announcement = "SELECT
    an.*
        FROM `announcement` an
        WHERE an.deleted_datetime is null
        and an.end_datetime >= curdate()
        and an.start_datetime <= curdate()
        and an.publish = 'checked' 
        ".$str_status."
        order by an.id desc";
        echo $sql_announcement;

	$result = $conn->query($sql_announcement);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {

                $color_status =" fa-pencil ls-blue ";
				?>
                    <tr>
                        <td style="text-align: center;"><div style="font-size:32px" ><i class="fa  <?php echo $color_status; ?>" aria-hidden="true"></i></div></td>

                        <td>
                            <div class="w3-tag w3-round ls-c-bg" style="padding:3px"><div class="w3-tag w3-round ls-c-bg w3-border w3-border-white">
                                <div><a style="display:inline-flex" href="./update?id=<?php echo $row['id']; ?>"><?php echo $row['announcement_no']; ?></a> </div>
                                </div>
                        </div>
                        </td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['type']; ?></td>
                        <td><?php echo $row['recorder']; ?></td>
                        <td><?php echo $row['publish']; ?></td>
                        <td><?php echo $row['start_datetime']; ?></td>
                        <td><?php echo $row['end_datetime']; ?></td>
                        <td><?php echo $row['edited_datetime']; ?></td>
                    </tr>

                    <?php
            }
        }

        ?>
            </tbody>
        </table>
    </div>

<?php
}

?>
<script>
    // $('.thaiword').each(function(index, value) { 
    //     $(value).html(thaiWord($(value).html()));
    // });

</script>