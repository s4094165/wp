<?php

$title = "Gallery";
include_once('includes/header.inc');
include_once('includes/nav.inc');
include('includes/db_connect.inc');

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['petType'])){
        $type = $_POST['petType'] ;
        $sql = "SELECT * FROM pets WHERE type = ?"; 
        $stmt = mysqli_prepare($connection, $sql); 
        mysqli_stmt_bind_param($stmt, "s", $type);    
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    }
}else{
        $sql = "SELECT petid, petname, image FROM pets"; 
        $result = $connection->query($sql);
        $type = '';
    }

?>

<header>
    <?php

    include_once('includes/nav.inc');
    ?>
 <h2>Pets Victoria has a lot to offer!</h2>
 <p class = "second">For almost two decades, Pets Victoria has helped in creating true social change by bringing pet adoption into the mainstream. Our work has helped make a difference to the Victorian rescue community and thousands of pets in need of rescue and rehabilitation. But, until every pet is safe, respected, and loved, we all still have big, hairy work to do.</p>
<form id="selectForm" action="" method="post">
 <select id="petTypeChange" name="petType"  class="form-control">
    <option value="" disabled selected>Select Type</option>
    <option value="dog" <?php if($type == "dog"){ echo 'selected';}?>>Dog</option>
    <option value="cat" <?php if($type == "cat"){ echo 'selected';}?>>Cat</option>
    <option value="other" <?php if($type == "other"){ echo 'selected';}?>>Other</option>
</select>
</form>
    </header>

    <main>
        <div class="row">
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
              <div class="col-md-4"><br>
                <div class="thumbnail">
                  <a href="details.php?petid=<?php echo $row['petid']; ?>">
                    <img src="images/<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['petname']); ?>" style="width:100%;min-height: 200px">
                    <div class="overlay">
                        <span class="material-icons">search</span>
                        <p>Discover More!</p>
                    </div>
                    </a>
                    <div class="desc">
                      <p class="third"><?php echo htmlspecialchars($row['petname']); ?></p>
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
