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
                <h2>Amount Range List</h2>
            <?php
            	if (isset($_GET['delcat'])){
            		$delid = $_GET['delcat'];
            		$delquery = "DELETE from tbl_price WHERE id='$delid'";
            		$deldata = $db->delete($delquery);

                    if ($deldata){
                        echo "<span style='color: green;font-size: 18px;'>Amount Range Deleted Successfully...</span>";
                    } else {
                        echo "<span style='color: red;font-size: 18px;'>Amount Range not Deleted...!!!</span>";
                    }
            	}
            ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Amount Range</th>
							<th>Action</th>
						</tr>
					</thead>
				 <tbody>

				<?php
					$query = "select * from tbl_price order by id desc";
					$amount = $db->select($query);
					if ($amount){
						$i = 0;
						while ($result = $amount->fetch_assoc()) {
							$i++;
					
				?>	
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['amount']; ?></td>
							<td><a href="editamount.php?amountid=<?php echo $result['id']; ?>">Edit</a> 
								|| <a onclick="return confirm('Are you sure for Delete...!!!')" href="?delcat=<?php echo $result['id']; ?>">Delete</a> </td>
						</tr>
				
				<?php 	} } ?>

					</tbody>
				</table>
               </div>
            </div>
        </div>
<?php include 'inc/footer.php' ?>
