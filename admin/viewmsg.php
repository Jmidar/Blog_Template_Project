<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<?php
  if (!isset($_GET['viewid']) || $_GET['viewid'] == NULL) {
    echo "<script>window.location = 'index.php'</script>";
  }else{
    $id = $_GET['viewid'];
  }
?>

    <div class="grid_10">

        <div class="box round first grid">
            <h2>View Page</h2>
         <?php

            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                echo "<script>window.location = 'inbox.php'</script>";
            }
         ?>
            <div class="block">               
             <form action="" method="post" >

          <?php
            $query = "SELECT * FROM tbl_contact WHERE id='$id'";
            $selected_row = $db->SELECT($query);
             if ($selected_row) {
              $i=0;
              while ($result = $selected_row->fetch_assoc()) {
                  $i++;
          ?>
                <table class="form">
                   
                    <tr>
                        <td>
                            <label>Name</label>
                        </td>
                        <td>
                            <input type="text" readonly="" value="<?php echo $result['firstname'].' '.$result['lastname']; ?>" name="name" class="medium" />
                        </td>
                    </tr>

                     <tr>
                        <td>
                            <label>Email</label>
                        </td>
                        <td>
                            <input type="text" readonly="" value="<?php echo $result['email']; ?>" name="name" class="medium" />
                        </td>
                    </tr>

                     <tr>
                        <td>
                            <label>Date</label>
                        </td>
                        <td>
                            <input type="text" readonly="" value="<?php echo $fm->formatDate($result['date']); ?>" name="date" class="medium" />
                        </td>
                    </tr>
                 
                  
                    <tr>
                        <td>
                            <label>Message</label>
                        </td>
                        <td>
                            <textarea class="tinymce" name="body">
                              <?php echo $result['body']; ?>
                            </textarea>
                        </td>
                    </tr>
                    
				            <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="OK" />
                        </td>
                    </tr>
                </table>
          <?php } } ?>
                </form>
            </div>
        </div>
    </div>

        <!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
<?php include 'inc/footer.php' ?>
