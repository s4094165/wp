<?php

$title = "Search";
include_once('includes/header.inc');
include_once('includes/nav.inc');
include('includes/db_connect.inc');

//if($_SERVER["REQUEST_METHOD"] == "POST"){
    //if(isset($_POST['petType'])){

        $keyword = $_POST['search'];
		$type = $_POST['type'];
		if($type){
			$sql = "SELECT * FROM pets WHERE type = ? AND petname LIKE ?"; 
        	$stmt = mysqli_prepare($connection, $sql); 
        	$search_keyword = "%$keyword%";
	        mysqli_stmt_bind_param($stmt, "ss",$type,$search_keyword);    
	        mysqli_stmt_execute($stmt);
	        $result = mysqli_stmt_get_result($stmt);
		}else{
			$sql = "SELECT * FROM pets WHERE petname LIKE ? OR description LIKE ? OR type = ? "; 
        	$stmt = mysqli_prepare($connection, $sql); 
        	$search_keyword = "%$keyword%";
	        mysqli_stmt_bind_param($stmt, "sss", $search_keyword,$search_keyword,$type);    
	        mysqli_stmt_execute($stmt);
	        $result = mysqli_stmt_get_result($stmt);
		}
		

?>

<header>
    <?php

    include_once('includes/nav.inc');
    ?>
 <h2>Pets Victoria has a lot to offer!</h2>
 <p class = "second">For almost two decades, Pets Victoria has helped in creating true social change by bringing pet adoption into the mainstream. Our work has helped make a difference to the Victorian rescue community and thousands of pets in need of rescue and rehabilitation. But, until every pet is safe, respected, and loved, we all still have big, hairy work to do.<br>
 	Search Keyword - <?php echo $keyword;?> | Search Type - <?php echo $type;?></p>
    </header>

    <main>
        <div class="row">
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
              <div class="col-md-4"><br>
                <div class="thumbnail" style="height: 300px;">
                  <a href="details.php?petid=<?php echo $row['petid']; ?>">
                    <img src="images/<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['petname']); ?>" style="width:100%;min-height: 200px">
                    <div class="overlay">
                        <span class="material-icons">search</span>
                        <p>Discover More!</p>
                    </div>
                    </a>
                    <div class="desc">
                      <p class="third">
                      	 <?php echo htmlspecialchars($row['petname']); ?><br>
                      	 <?php echo htmlspecialchars($row['description']); ?>
                      </p>
                    </div>
                </div>
          </div>
          <?php endwhile; ?>
        </div>
    <div class="gallery">

        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="image-box">
                <a href="details.php?petid=<?php echo $row['petid']; ?>">
                    <div class="image-wrapper">
                        <img src="images/<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['petname']); ?>">
                    </div>
                    <div class="overlay">
                        <span class="material-icons">search</span>
                        <p>Discover More!</p>
                    </div>
                </a>
                <div class="desc">
                    <p class="third"><?php echo htmlspecialchars($row['petname']); ?></div>
                </div>
        <?php endwhile; ?>
    </div>
</main>

<?php include_once('includes/footer.inc'); ?>

<?php
$connection->close();
?>
