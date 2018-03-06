<div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
    <div id="site_info">
 <?php
    $query = "SELECT * FROM tbl_footer WHERE id='1'";
    $copyright = $db->select($query);
      if ($copyright){
        while ($result = $copyright->fetch_assoc()) {
            
  ?> 
        <p>
         &copy; <a href="http://trainingwithliveproject.com"><?php echo $result['note']; ?> <?php echo date('Y'); ?></a>. All Rights Reserved.
        </p>
  <?php } } ?>
    </div>
</body>
</html>
