<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<?php
	if (isset($_GET['seenid'])) {
		$seenid = $_GET['seenid'];
			$query = "UPDATE tbl_contact SET status = '1' WHERE id = '$seenid'";
			$updated_row = $db->update($query);
			   if ($updated_row) {
			   		echo "<span class='success'>Seen</span>";
              }else {
                   echo "<span class='error'>not Seen !</span>";
                   }
}
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <div class="block">        
                  <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
				<?php
					$query = "SELECT * FROM tbl_contact WHERE status='0' order by id desc";
					$selected_row = $db->SELECT($query);
					 if ($selected_row) {
					 	$i=0;
					 	while ($result = $selected_row->fetch_assoc()) {
					 			$i++;
				?>	
					 
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<th><?php echo $result['firstname'].' '.$result['lastname']; ?></td>
							<td><?php echo $result['email']; ?></td>
							<td><?php echo $fm->textShorten($result['body'], 30); ?></td>
							<td><?php echo $fm->formatDate($result['date']); ?></td>
							<td><a href="viewmsg.php?viewid=<?php echo $result['id']; ?>">View</a> 
								|| <a href="replymsg.php?replyid=<?php echo $result['id']; ?>">Reply</a>
								|| <a onclick="return confirm('Are you sure for send Seen Message BOX...!!!')" href="?seenid=<?php echo $result['id']; ?>">Seen</a>
							</td>
						</tr>
				<?php } } ?>
					</tbody>
				</table>
               </div>
            </div>


        	<div class="box round first grid">
                <h2>Seen Massage</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
				<?php
					$query = "SELECT * FROM tbl_contact WHERE status='1' order by id desc";
					$selected_row = $db->SELECT($query);
					 if ($selected_row) {
					 	$i=0;
					 	while ($result = $selected_row->fetch_assoc()) {
					 			$i++;
				?>	
					 
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<th><?php echo $result['firstname'].' '.$result['lastname']; ?></td>
							<td><?php echo $result['email']; ?></td>
							<td><?php echo $fm->textShorten($result['body'], 30); ?></td>
							<td><?php echo $fm->formatDate($result['date']); ?></td>
							<td><a onclick="return confirm('Are you sure for Delete...!!!')" href="viewmsg.php?viewid=<?php echo $result['id']; ?>">Delete</a> 
								
							</td>
						</tr>
				<?php } } ?>
					</tbody>
				</table>
               </div>
            </div>

        </div>

        <script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
            setSidebarHeight();


        });
    </script>

<?php include 'inc/footer.php' ?>
