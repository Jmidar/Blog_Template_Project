	<?php
		if (isset($_GET['pageid'])){
			$pagetitleid = $_GET['pageid'];			
		    $query = "SELECT * FROM tbl_page WHERE id='$pagetitleid'";
		    $pages = $db->select($query);
		        if ($pages){
		            while ($result = $pages->fetch_assoc()) { ?>
		            	<title><?php echo $result['name']; ?> - <?php echo Jmi;?></title>

		     <?php  } } }elseif (isset($_GET['id'])){
			$posttitleid = $_GET['id'];			
		    $query = "SELECT * FROM tbl_post WHERE id='$posttitleid'";
		    $posts = $db->select($query);
		        if ($posts){
		            while ($result = $posts->fetch_assoc()) { ?>
		            	<title><?php echo $result['title']; ?> - <?php echo Jmi;?></title>
		     <?php  } } } else{ ?>
		    <title><?php echo $fm->title();?></title>
		 <?php } ?>
	<meta name="language" content="English">
	<meta name="description" content="It is a website about education">
  <?php
  	if(isset($_GET['id'])) {
  		$keywords = $_GET['id'];
  		$query = "SELECT * FROM tbl_post where id='$keywords'";
  		$keywords = $db->SELECT($query);
  		if($keywords){
  			while ($result = $keywords->fetch_assoc()) { ?>
  				<meta name="keywords" content="<?php echo $result['tags']; ?>">
<?php }	}	}else{ ?>
		<meta name="keywords" content="<?php echo KEYWORDS;?>">
<?php  	} ?>
	
	<meta name="author" content="JmidarArnab">