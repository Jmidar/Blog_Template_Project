<?php include 'inc/header.php';?>

<?php
	if(!isset($_GET['id']) || $_GET['id'] == NULL){
		header("Location:404.php");
	}else{
		$id = $_GET['id'];
	}
?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<?php
					$query = "select * from tbl_post where id=$id";
					$post = $db->select($query);
					if($post){
						while ($result = $post->fetch_assoc()){
				?>

				<h2><a href=" post.php?id=<?php echo $result['id'];?>"><?php echo $result['title'];?></a></h2>
				<h4><?php echo $fm->formatDate($result['date']); ?>,  By <a href = "#"><?php echo $result['author'];?></a></h4>
				<img src="Admin/upload/<?php echo $result['image']; ?>" alt="post image"/>
				<?php echo $result['body']; ?>
			 
				
				<div class="relatedpost clear">
					<h2>Related articles</h2>

					<?php
						$catid = $result['cat'];
					    $queryrelated = "select * from tbl_post where cat='$catid' order by rand() limit 6";
					    $relatedpost = $db->select($queryrelated);
					    if($relatedpost){
						while ($rresult = $relatedpost->fetch_assoc()){
					?>

					<a href="post.php?id=<?php echo $rresult['id'];?>">
						<img src="Admin/upload/<?php echo $rresult['image']; ?>" alt="post image"/></a>
					
					<?php } }else{ echo "There are no related post Avaiable...!!!"; }?>

				</div>
				<?php } }else{ header("Location:404.php");
				}

				?>
	</div>

</div>
<?php include 'inc/sidebar.php';?>
<?php include 'inc/footer.php';?>