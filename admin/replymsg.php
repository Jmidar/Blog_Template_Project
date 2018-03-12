<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<?php
  if (!isset($_GET['replyid']) || $_GET['replyid'] == NULL) {
    echo "<script>window.location = 'index.php'</script>";
  }else{
    $id = $_GET['replyid'];
  }
?>

    <div class="grid_10">

        <div class="box round first grid">
            <h2>View Page</h2>
         <?php

            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $to = $fm->validation($_POST['toEmail']);
                $from = $fm->validation($_POST['fromEmail']);
                $subject = $fm->validation($_POST['subject']);
                $message = $fm->validation($_POST['message']);
                $sendmail = mail($to, $subject, $message, $from);
                if ($sendmail) {
                  echo "<span color: green>Send Success</span>";
                }else {
                   echo "<span color: red>Send Success</span>";
                }
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
                            <label>To </label>
                        </td>
                        <td>
                            <input type="text" readonly="" value="<?php echo $result['email']; ?>" name="toEmail" class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>From </label>
                        </td>
                        <td>
                            <input type="text" placeholder="Please Enter your email address..." name="fromEmail" class="medium" />
                        </td>
                    </tr>

                     <tr>
                        <td>
                            <label>Subject</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Please Enter your Subject..." name="subject" class="medium" />
                        </td>
                    </tr>
                 
                  
                    <tr>
                        <td>
                            <label>Message</label>
                        </td>
                        <td>
                            <textarea class="tinymce" name="message">
                            </textarea>
                        </td>
                    </tr>
                    
				            <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Send" />
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
