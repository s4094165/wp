
    <footer class="main-footer">
    	<p>
    	<?php
    	include('db_connect.inc');
    	$sql = "SELECT username FROM users"; 
		$result = $connection->query($sql);
		while ($row = $result->fetch_assoc()){?>
        	<a href="user.php?username=<?php echo $row["username"];?>"><?php echo $row["username"];?> </a> &nbsp;
        <?php }?>
        <br>© Copyright s4094165. All Rights Reserved | Designed For Pets Victoria
		</p>
    </footer>
</body>
</html>
<script type="text/javascript" >
  function confirmDelete(){
  return confirm("Are you sure want to delete?");
}

document.getElementById('petTypeChange').addEventListener('change',function(){
    document.getElementById('selectForm').submit();
});
</script>