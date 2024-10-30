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
<div class="h2"><?php  echo $_GET['username']."'s Collection";?></div>
<main class="default-main">
<div class="content row">
<?php

if (isset($_GET['username'])) {
  $username = mysqli_real_escape_string($connection, $_GET['username']); 

  $sql = "SELECT * FROM pets WHERE username = ?";
  $stmt = mysqli_prepare($connection, $sql);  
  mysqli_stmt_bind_param($stmt, "s", $username);    
  mysqli_stmt_execute($stmt);                  
  $result = mysqli_stmt_get_result($stmt);     

  if (mysqli_num_rows($result) > 0) {

    while($row = mysqli_fetch_assoc($result)){

    $petname = htmlspecialchars($row['petname']);
    $type = htmlspecialchars($row['type']);
    $age = htmlspecialchars($row['age']);
    $location = htmlspecialchars($row['location']);
    $image = htmlspecialchars($row['image']); 
    $description = htmlspecialchars($row['description']);

    $imagePath = "images/" . $image;?>

      <div class="col-md-4">
          <img src="<?php echo $imagePath; ?>" alt="<?php echo $petname; ?>" class="" style="width:100%;">
      <table>
        <tr>
          <td class="detail"><br><i class="material-icons">alarm</i><br><?php echo $age; ?> Months</td>
          <td class="detail"><br><i class="material-icons">pets</i><br><?php echo ucfirst($type); ?></td>
          <td class="detail"><br><i class="material-icons">location_on</i><br><?php echo $location; ?></td>
        </tr>
        <?php
          if(@$_SESSION["username"] == $_GET['username']){?>
        <tr>
          <td class="edits">
            <a href="edit.php?petid=<?php echo $row['petid'];?>" class="btn btn-primary btn-sm">Edit</a>
            <a href="delete.php?petid=<?php echo $row['petid'];?>" class="btn btn-danger btn-sm" onclick = "return confirmDelete()">Delete</a>
          </td>
        </tr>
      <?php } ?>
      </table>
      </div>
      <div class="col-md-7">
        <div class="h2"><?php echo $petname; ?></div>
        <p class="homep"><?php echo $description; ?></p>
      </div>
  <?php  } 
  }
  else {
    echo "<p>Pet not found.</p>";
  }

  mysqli_stmt_close($stmt);
} else {
  echo "<p>No pet selected.</p>";
}

mysqli_close($connection);
?>
</div>
</main>

<?php

include_once('includes/footer.inc');
?>
