<?php
$title = "Pet Details";

include_once('includes/header.inc');
include_once('includes/nav.inc');
include_once('includes/db_connect.inc');
?>

<header>
  <?php

  include_once('includes/nav.inc');
  ?>
</header>

<?php

if (isset($_GET['petid'])) {
  $petid = mysqli_real_escape_string($connection, $_GET['petid']); 

  $sql = "SELECT * FROM pets WHERE petid = ?";
  $stmt = mysqli_prepare($connection, $sql);  
  mysqli_stmt_bind_param($stmt, "i", $petid);    
  mysqli_stmt_execute($stmt);                  

  $result = mysqli_stmt_get_result($stmt);     

 
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    $petname = htmlspecialchars($row['petname']);
    $type = htmlspecialchars($row['type']);
    $age = htmlspecialchars($row['age']);
    $location = htmlspecialchars($row['location']);
    $image = htmlspecialchars($row['image']); 
    $description = htmlspecialchars($row['description']);
    $caption = htmlspecialchars($row['caption']);
    $username = htmlspecialchars($row['username']);
    $imagePath = "images/" . $image;
  } else {
    echo "<p>Pet not found.</p>";
    exit();
  }

  mysqli_stmt_close($stmt);
} else {
  echo "<p>No pet selected.</p>";
  exit();
}

mysqli_close($connection);
?>

<main class="default-main">
  <div class="content row">
     <div class="col-md-4">
      <img src="<?php echo $imagePath; ?>" alt="<?php echo $petname; ?>" class="">
      <table>
        <tr>
          <td class="detail"><br><i class="material-icons">alarm</i><br><?php echo $age; ?> Months</td>
          <td class="detail"><br><i class="material-icons">pets</i><br><?php echo ucfirst($type); ?></td>
          <td class="detail"><br><i class="material-icons">location_on</i><br><?php echo $location; ?></td>
        </tr>
        <?php
          if(@$_SESSION["username"] == $username){?>
        <tr>
          <td class="edits">
            <a href="edit.php?petid=<?php echo $_GET['petid'];?>" class="btn btn-primary btn-sm">Edit</a>
            <a href="delete.php?petid=<?php echo $_GET['petid'];?>" class="btn btn-danger btn-sm" onclick ="return confirmDelete()">Delete</a>
          </td>
        </tr>
      <?php } ?>
      </table>
      </div>
      <div class="col-md-6">
        <div class="h2"><?php echo $petname; ?></div>
        <p class="homep"><?php echo $description .' '. $caption; ?></p>
      </div>
  </div>
</main>

<?php

include_once('includes/footer.inc');
?>
