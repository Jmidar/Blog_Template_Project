<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<?php
    if (!isset($_GET['sliderid']) || $_GET['sliderid'] == NULL){
        echo "<script>window.location = 'sliderlist.php';</script>";
        //header("Location:catlist.php");
    } else{
        $sliderid = $_GET['sliderid'];
        //var_dump($postid);
    }
?>


  <div class="grid_10">
<?php
$query = "SELECT * FROM tbl_slider WHERE id='$sliderid' ORDER BY id desc";
$getslider = $db->select($query);
  if ($getslider){
    while ($sliderresult = $getslider->fetch_assoc()) {
      
    
?>

<div class="box round first grid">
    <h2>Update Slider</h2>
 <?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $title = mysqli_real_escape_string($db->link, $_POST['title']);
   

     $permited  = array('jpg', 'jpeg', 'png', 'gif');
     $file_name = $_FILES['image']['name'];
     $file_size = $_FILES['image']['size'];
     $file_temp = $_FILES['image']['tmp_name'];

     $div = explode('.', $file_name);
     $file_ext = strtolower(end($div));
     $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
     $uploaded_image = "Upload/Slider/".$unique_image;

   if ($title == "" ){

      echo "<span style='color: red;font-size: 18px;'>Field must not be Empty...!!!</span>";
   } else {
  if (!empty($file_ext)){

  
     if ($file_size >1048567) {
         echo "<span class='error'>Image Size should be less then 1MB!
                 </span>";
      } elseif (in_array($file_ext, $permited) === false) {
         echo "<span class='error'>You can upload only:-"
            .implode(', ', $permited)."</span>";
     } else{
          move_uploaded_file($file_temp, $uploaded_image);
          $query = "UPDATE tbl_slider 
                    set 
                    title = '$title',
                    image = '$uploaded_image'
                    WHERE id = '$sliderid'";
          //var_dump($query);
          $updated_rows = $db->update($query);
          if ($updated_rows) {
          echo "<span class='success'>Slider data updated Successfully.
          </span>";
          }else {
               echo "<span class='error'>Slider data Not updated !</span>";
               }
        } 
    }else {
       $query = "UPDATE tbl_slider
                  set 
                  title = '$title'
                  WHERE id = '$sliderid'";
        //var_dump($query);
        $updated_rows = $db->update($query);
        if ($updated_rows) {
        echo "<span class='success'>Slider data updated Successfully.</span>";
        }else {
             echo "<span class='error'>Slider data Not updated !</span>";
             }
      }
    }
  }
 ?>
          <div class="block">               
           <form action="editslider.php" method="post" enctype="multipart/form-data">
              <table class="form">
                 
                  <tr>
                      <td>
                          <label>Title</label>
                      </td>
                      <td>
                          <input type="text" name="title" value = "<?php echo $sliderresult['title']; ?>" class="medium" />
                      </td>
                  </tr>
               
             
                  <tr>
                      <td>
                          <label>Upload Image</label>
                      </td>
                      <td>
                          <img src="<?php echo $sliderresult['image']; ?>" height="80px" wight="200px" />
                          <input type="file" name="image" />
                      </td>
                  </tr>
                  
                      <td></td>
                      <td>
                          <input type="submit" name="submit" Value="Save" />
                      </td>
                  </tr>
              </table>
              </form>
  <?php } }?>
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
