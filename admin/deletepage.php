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
    if (!isset($_GET['delpage']) || $_GET['delpage'] == NULL){
        echo "<script>window.location = 'index.php';</script>";
        //header("Location:catlist.php");
    } else{
        $pageid = $_GET['delpage'];
        //var_dump($postid);

        $delquery = "DELETE FROM tbl_page where id = '$pageid'";
        $delData = $db->delete($delquery);
        if ($delData) {
        	echo "<script>alert('Page Deleleted Successfully...')</script>";
        	echo "<script>window.location = 'index.php';</script>";
        } else {
        	echo "<script>alert('Page not Deleted...')</script>";
        }
    }
?>
