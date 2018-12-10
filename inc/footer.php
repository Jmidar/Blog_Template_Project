</div>

	<div class="footersection templete clear">
	  <div class="footermenu clear">
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Contact</a></li>
			<li><a href="#">Privacy</a></li>
		</ul>
	  </div>
	<?php
        $query = "SELECT * FROM tbl_footer WHERE id='1'";
        $copyright = $db->select($query);
          if ($copyright){
            while ($result = $copyright->fetch_assoc()) {
                
    ?> 
	  <p>&copy; <?php echo $result['note'];?> <?php echo date('Y'); ?> </p>
	<?php } } ?>
	</div>
	<div class="fixedicon clear">
		<a href="http://www.facebook.com"><img src="images/fb.png" alt="Facebook"/></a>
		<a href="http://www.twitter.com"><img src="images/tw.png" alt="Twitter"/></a>
		<a href="http://www.linkedin.com"><img src="images/in.png" alt="LinkedIn"/></a>
		<a href="http://www.google.com"><img src="images/gl.png" alt="GooglePlus"/></a>
	</div>
<script type="text/javascript" src="js/scrolltop.js"></script>
<script id="dsq-count-scr" src="//http-homerental-ml.disqus.com/count.js" async></script>
</body>
</html>