<?php include 'inc/header.php';?>

<?php
    $id = mysqli_real_escape_string($db->link, $_GET['id']);
	if(!isset($id ) || $id  == NULL){
		header("Location:404.php");
	}else{
		$id = $id ;
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
				<img src="admin/<?php echo $result['image']; ?>" alt="post image"/>
				<?php echo $result['body']; ?>

				<div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://http-homerental-ml.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                            
			 
				
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
						<img src="admin/<?php echo $rresult['image']; ?>" alt="post image"/></a>
					
					<?php } }else{ echo "There are no related post Avaiable...!!!"; }?>

				</div>
				<?php } }else{ header("Location:404.php");
				}

				?>
	</div>

</div>
<?php include 'inc/sidebar.php';?>
<?php include 'inc/footer.php';?>