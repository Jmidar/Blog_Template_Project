<?php
    include '../lib/Session.php' ;
    Session:: init();
?>

<?php include '../config/config.php'; ?>
<?php include '../lib/Database.php'; ?>
<?php include '../helpers/Format.php'; ?>
<?php
    $db = new Database();
?>
<?php
    if (!isset($_GET['slideid']) || $_GET['slideid'] == NULL){
        echo "<script>window.location = 'sliderlist.php';</script>";
        //header("Location:catlist.php");
    } else{
        $slideid = $_GET['slideid'];
        //var_dump($postid);
        $query = "SELECT * FROM tbl_slider WHERE id = '$slideid'";
        $getData = $db->select($query);

        if ($getData){
        	while ($delimg = $getData->fetch_assoc()){
        		$dellink = $delimg['image'];
        		unlink($dellink);
        	}
        }

        $delquery = "DELETE FROM tbl_slider where id = '$slideid'";
        $delSlider = $db->delete($delquery);
        if ($delSlider) {
        	echo "<script>alert('Slider Deleleted Successfully...')</script>";
        	echo "<script>window.location = 'sliderlist.php';</script>";
        } else {
        	echo "<script>alert('Slider not Deleted...')</script>";
        }
    }
?>
