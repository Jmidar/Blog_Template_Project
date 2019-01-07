<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Amount</h2>
               <div class="block copyblock"> 
        <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST'){

                $amount = $_POST['amount'];
                $amount = mysqli_real_escape_string($db->link, $amount);
               // echo "<span style='color: red;font-size: 18px;'>No Result Found...!!!</span>";
                if (empty($amount)){
                    echo "<span style='color: red;font-size: 18px;'>Your Field is Empty...!!!</span>";
                } else {
                    $query = "INSERT INTO tbl_price(amount) VALUES('$amount')";
                    $catinsert = $db->insert($query);

                    if ($catinsert){
                        echo "<span style='color: green;font-size: 18px;'>Amount inserted Successfully...</span>";
                    } else {
                        echo "<span style='color: red;font-size: 18px;'>Amount not inserted...!!!</span>";
                    }
                }

            }
        ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                Enter Amount Range:
                            </td>
                            <td>
                                <input type="text" name="amount" placeholder="Ex: 1000TK-10000TK..." class="medium" />
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
    
<?php include 'inc/footer.php' ?>