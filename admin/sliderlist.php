<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Slider List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">


					<thead>
						<tr>
							<th>No.</th>
							<th>Slider Post Title</th>
							<th>Slider Image</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

				   <?php
                  	$query = "SELECT tbl_slider.*, tbl_category.name FROM tbl_post INNER JOIN tbl_category ON tbl_post.cat = tbl_category.id ORDER By tbl_post.title desc";
                  	$post = $db->select($query);
                  	if ($post){
                  		$i = 0;
                  		while ($result = $post->fetch_assoc()) {
                  			$i++;
                  	
                  ?>
					
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['title']; ?></td>
							<td><img src="<?php echo $result['image']; ?>" height="40px"; width="60px"; /></td>
			<td> 

			<?php if (Session::get('userRole') == '0') { ?>			
				<a href="editpost.php?editpostid=<?php echo $result['id']; ?>">Edit</a> 
				||		

				<a onclick="return confirm('Are you sure to Delete...???');"
								 href="delpost.php?delpostid=<?php echo $result['id']; ?>">Delete</a>
			<?php } ?>
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