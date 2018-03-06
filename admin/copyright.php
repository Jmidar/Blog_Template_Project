<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>

    <div class="grid_10">
	
        <div class="box round first grid">
            <h2>Update Copyright Text</h2>
    <?php

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $note = $fm->validation($_POST['note']);
        
        $note = mysqli_real_escape_string($db->link, $note);

            if ($note == "" ){

              echo "<span style='color: red;font-size: 18px;'>Field must not be Empty...!!!</span>";
            } else {
                  $query = "UPDATE tbl_footer 
                  set 
                  note = '$note' 
                  WHERE id = '1'";
                //var_dump($query);
                $updated_rows = $db->update($query);
                if ($updated_rows) {
                echo "<span class='success'>Post data updated Successfully.</span>";
                }else {
                     echo "<span class='error'>Post data Not updated !</span>";
                     }
                }
        }
    ?>
            <div class="block copyblock"> 
    <?php
        $query = "SELECT * FROM tbl_footer WHERE id='1'";
        $copyright = $db->select($query);
          if ($copyright){
            while ($result = $copyright->fetch_assoc()) {
                
    ?>        
             <form action="" method="post">
                <table class="form">					
                    <tr>
                        <td>
                            <input type="text" value="<?php echo $result['note']; ?>" name="note" class="large" />
                        </td>
                    </tr>
					
					 <tr> 
                        <td>
                            <input type="submit" name="submit" Value="Update" />
                        </td>
                    </tr>
                </table>
                </form>
    <?php } } ?>
            </div>
        </div>
    </div>

<?php include 'inc/footer.php' ?>