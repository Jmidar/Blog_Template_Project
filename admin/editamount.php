<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<?php
    if (!isset($_GET['amountid']) || $_GET['amountid'] == NULL){
        echo "<script>window.location = 'amountlist.php';</script>";
        //header("Location:catlist.php");
    } else{
        $id = $_GET['amountid'];
    }
?>
        <div class="grid_10">
        
            <div class="box round first grid">
                <h2>Update Amount</h2>
               <div class="block copyblock"> 
        <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST'){

                $amount = $_POST['amount'];
                $amount = mysqli_real_escape_string($db->link, $amount);
               // echo "<span style='color: red;font-size: 18px;'>No Result Found...!!!</span>";
                if (empty($amount)){
                    echo "<span style='color: red;font-size: 18px;'>Your Field is Empty...!!!</span>";
                } else {
                    $query = "UPDATE tbl_price
                              SET
                              amount = '$amount'
                              WHERE id = $id
                            ";
                    $updated_row = $db->update($query);

                    if ($updated_row){
                        echo "<span style='color: green;font-size: 18px;'>Amount Range Updated Successfully...</span>";
                    } else {
                        echo "<span style='color: red;font-size: 18px;'>Amount Range not Updated...!!!</span>";
                    }
                }

            }
        ?>

        <?php 
            $query = "select * from tbl_price where id=$id order by id desc";
            $category = $db->select($query);
            if ($category){
             while ($result = $category->fetch_assoc()) {
                 
             
        ?>
                 <form action="" method="post">
                    <table class="form">                    
                        <tr>
                            <td>
                                <input type="text" name="amount" value="<?php echo $result['amount']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <input type="submit" name="submit" Value="update" />
                            </td>
                        </tr>
                    </table>
                    </form>
            <?php  } }  ?>
                </div>
            </div>
        </div>
    
<?php include 'inc/footer.php' ?>