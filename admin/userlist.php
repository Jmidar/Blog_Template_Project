<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
            setSidebarHeight();


        });
    </script>
    


        <div class="grid_10">
            <div class="box round first grid">
                <h2>UserList</h2>
            <?php
            	if (isset($_GET['delcat'])){
            		$delid = $_GET['delcat'];
            		$delquery = "DELETE from tbl_category WHERE id='$delid'";
            		$deldata = $db->delete($delquery);

                    if ($deldata){
                        echo "<span style='color: green;font-size: 18px;'>Category Deleted Successfully...</span>";
                    } else {
                        echo "<span style='color: red;font-size: 18px;'>Category not Deleted...!!!</span>";
                    }
            	}
            ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>username</th>
							<th>Email</th>
							<th>Details</th>
							<th>Role</th>
							<th>Action</th>
						</tr>
					</thead>
				 <tbody>

				<?php
					$query = "select * from tbl_user order by id desc";
					$alluser = $db->select($query);
					if ($alluser){
						$i = 0;
						while ($result = $alluser->fetch_assoc()) {
							$i++;
					
				?>	
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['name']; ?></td>
							<td><?php echo $result['username']; ?></td>
							<td><?php echo $result['email']; ?></td>
							<td><?php echo $fm->textShorten($result['details'], 30); ?></td>
							<td><?php echo $result['role']; ?></td>


							<td><a href="editcat.php?catid=<?php echo $result['id']; ?>">Edit</a> 
								|| <a onclick="return confirm('Are you sure for Delete...!!!')" href="?delcat=<?php echo $result['id']; ?>">Delete</a> </td>
						</tr>
				
				<?php 	} } ?>

					</tbody>
				</table>
               </div>
            </div>
        </div>
<?php include 'inc/footer.php' ?>


    