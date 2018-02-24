<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<?php
    if (!isset($_GET['editpostid']) || $_GET['editpostid'] == NULL){
        echo "<script>window.location = 'postlist.php';</script>";
        //header("Location:catlist.php");
    } else{
        $postid = $_GET['editpostid'];
    }
?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Edit Post</h2>
             <?php

                if ($_SERVER['REQUEST_METHOD'] == 'POST'){

                $title = mysqli_real_escape_string($db->link, $_POST['title']);
                $cat = mysqli_real_escape_string($db->link, $_POST['cat']);
                $body = mysqli_real_escape_string($db->link, $_POST['body']);
                $tags = mysqli_real_escape_string($db->link, $_POST['tags']);
                $author = mysqli_real_escape_string($db->link, $_POST['author']);

                 $permited  = array('jpg', 'jpeg', 'png', 'gif');
                 $file_name = $_FILES['image']['name'];
                 $file_size = $_FILES['image']['size'];
                 $file_temp = $_FILES['image']['tmp_name'];

                 $div = explode('.', $file_name);
                 $file_ext = strtolower(end($div));
                 $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                 $uploaded_image = "Upload/".$unique_image;

                 if ($title == "" || $cat == "" || $body == "" || $tags == "" || $author == "" || $file_name == ""){

                    echo "<span style='color: red;font-size: 18px;'>Field must not be Empty...!!!</span>";
                 }elseif ($file_size >1048567) {
                     echo "<span class='error'>Image Size should be less then 1MB!
                             </span>";
                  } elseif (in_array($file_ext, $permited) === false) {
                     echo "<span class='error'>You can upload only:-"
                        .implode(', ', $permited)."</span>";
                 } else{
                      move_uploaded_file($file_temp, $uploaded_image);
                      $query = "INSERT INTO tbl_post(cat, title, body, image, author, tags) VALUES('$cat', '$title', '$body', '$uploaded_image', '$author', '$tags')";
                      //var_dump($query);
                      $inserted_rows = $db->insert($query);
                      if ($inserted_rows) {
                      echo "<span class='success'>Post Inserted Successfully.
                      </span>";
                      }else {
                           echo "<span class='error'>Post Not Inserted !</span>";
                           }
                    } 
                }
             ?>
                <div class="block">
            <?php
                $query = "select * from tbl_post where id='postid' ORDER BY id desc";
                $getpost = $db->select($query);
                  while ($result = $getpost->fetch_assoc()) {
                  
            ?>               
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $result['title']?>" class="medium" />
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
                                    <option value="<?php echo $result['id']; ?>"><?php echo $result['name']; ?></option>
                              <?php  } } ?>
                                </select>
                            </td>
                        </tr>
                   
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input type="file" name="image" value="<?php echo $result['image']; ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body" >
                                  <?php echo $result['body']; ?>
                                </textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Tags</label>
                            </td>
                            <td>
                                <input type="text" name="tags" value="<?php echo $result['tags']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input type="text" name="author" value="<?php echo $result['author']; ?>" class="medium" />
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
                <?php } ?>
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
<?php include 'inc/footer' ?>