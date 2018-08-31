<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<?php
  $userid = Session::get('userId');
  $userrole = Session::get('userRole');
?>
<div class="grid_10">
 <div class="box round first grid">
    <h2>Update Profile</h2>
 <?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $title = mysqli_real_escape_string($db->link, $_POST['title']);
    $cat = mysqli_real_escape_string($db->link, $_POST['cat']);
    $body = mysqli_real_escape_string($db->link, $_POST['body']);
    $tags = mysqli_real_escape_string($db->link, $_POST['tags']);
    $author = mysqli_real_escape_string($db->link, $_POST['author']);

     $query = "UPDATE tbl_post 
                  set 
                  cat = '$cat',
                  title = '$title',
                  body = '$body',
                  author = '$author',
                  tags = '$tags' 
                  WHERE id = '$postid'";
        //var_dump($query);
        $updated_rows = $db->update($query);
        if ($updated_rows) {
        echo "<span class='success'>Post data updated Successfully.</span>";
        }else {
             echo "<span class='error'>Post data Not updated !</span>";
             }
      }  
 ?>
          <div class="block">
      <?php
          $query = "select * from tbl_user where id='postid'";
      ?>             
           <form action="" method="post" enctype="multipart/form-data">
              <table class="form">
                 
                  <tr>
                      <td>
                          <label>Title</label>
                      </td>
                      <td>
                          <input type="text" name="title" value = "<?php echo $postresult['title']; ?>" class="medium" />
                      </td>
                  </tr>
               
                  <tr>
                      <td>
                          <label>Category</label>
                      </td>
                      <td>
                          <select id="select" name="cat">
                              <option>Select Category</option>
                        <?php
                          $query = "SELECT * FROM tbl_category";
                          $category = $db->select($query);
                           if ($category){
                              while ($result = $category->fetch_assoc()) {
                                   
                        ?>
                              <option 
                            <?php 
                              if($postresult['cat']== $result['id']){
                             ?> selected = "selected';
                             <?php } ?>
                               value="<?php echo $result['id'] ?>"><?php echo $result['name']; ?></option>
                        <?php  } } ?>
                          </select>
                      </td>
                  </tr>
             
                  <tr>
                      <td>
                          <label>Upload Image</label>
                      </td>
                      <td>
                          <img src="<?php echo $postresult['image']; ?>" height="80px" wight="200px" />
                          <input type="file" name="image" />
                      </td>
                  </tr>
                  <tr>
                      <td style="vertical-align: top; padding-top: 9px;">
                          <label>Content</label>
                      </td>
                      <td>
                          <textarea class="tinymce" name="body">
                              <?php echo $postresult['body']; ?>
                          </textarea>
                      </td>
                  </tr>
                  <tr>
                      <td>
                          <label>Tags</label>
                      </td>
                      <td>
                          <input type="text" name="tags" value = "<?php echo $postresult['tags']; ?>" class="medium" />
                      </td>
                  </tr>
                  <tr>
                      <td>
                          <label>Author</label>
                      </td>
                      <td>
                          <input type="text" name="author" value = "<?php echo $postresult['author']; ?>" class="medium" />
                      </td>
                  </tr>
      <tr>
                      <td></td>
                      <td>
                          <input type="submit" name="submit" Value="Save" />
                      </td>
                  </tr>
              </table>
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
