
<?php

$title = "EditPage";

include_once('includes/header.inc');
include_once('includes/nav.inc');
include_once('includes/db_connect.inc');
?>
<header>
    <h2>Edit Pet</h2>
    <p>You can edit pet here</p>
</header>
<?php
        if(isset($_SESSION['error'])){?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['error']; unset($_SESSION['error']);?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php } 
        if(isset($_SESSION['success'])){?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['success']; unset($_SESSION['success']);?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php } 
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
    $imagePath = "images/" . $image;?>

    <div class="content-wrappers ">
    <div class="content">
    <div class="container ">
    <form action="editPet.php?petid=<?php echo $row['petid'];?>" method="post" enctype="multipart/form-data" class="tall-forms">
            <div class="form-group">
            <label for="petName" class="required">Pet Name:</label>
            <input type="text" id="petName" name="petName" placeholder="Provide a name for the pet" required class="form-control" value="<?php echo $petname;?>">
            </div>
            <div class="form-group">
            <label for="petType" class="required">Type:</label>
            <select id="petType" name="petType" required class="form-control">
                <option value="" disabled selected>--Choose an option--</option>
                <option value="dog"<?php if($type == 'dog'){ echo 'selected';}?>>Dog</option>
                <option value="cat" <?php if($type == 'cat'){ echo 'selected';}?>>Cat</option>
                <option value="other" <?php if($type == 'other'){ echo 'selected';}?>>Other</option>
            </select>
            </div>
            <div class="form-group">
            <label for="petDescription" class="required">Description:</label>
            <textarea id="petDescription" name="petDescription" rows="2" cols="155" class="form-control" placeholder ="Describe the pet briefly" required><?php echo $description;?></textarea>
            </div>
            <div class="form-group">
            <!-- <div class="file-input-container"> -->
                <label for="petImage" class="required">Select an Image:</label>
                <input type="file" id="petImage" name="petImage" accept="image/*"  class="form-control">
                <span class="text-danger">MAX IMAGE SIZE: 500PX</span><?php echo $image;?>
            <!-- </div> -->
            </div>
            <div class="form-group">
            <label for="petCaption" class="required">Image Caption:</label>
            <input type="text" id="petCaption" name="petCaption" class="form-control" placeholder="describe the image in one word" required class="form-control" value="<?php echo $caption;?>">
            </div>
            <div class="form-group">
            <label for="petAge" class="required">Age (Months):</label>
            <input type="text" id="petAge" name="petAge" placeholder="Age of a pet in months" required class="form-control" value="<?php echo $age;?>">
            </div>
            <div class="form-group">
            <label for="petLocation" class="required">Location:</label>
            <input type="text" id="petLocation" name="petLocation" placeholder="Location of the pet" required class="form-control" value="<?php echo $location;?>">
            </div><br>
            <div class="button-container">
                <button type="submit" class="submit-button">
                    <span class="material-icons">add_task</span> Edit
                </button>
                <button type="reset" class="clear-button">
                    <span class="material-icons">close</span> Clear
                </button>
            </div>
            <br>
        </form>
    </div>
</div>
</div>
 <?php } else {
    echo "<p>Pet not found.</p>";
  }
  mysqli_stmt_close($stmt);
} else {
  echo "<p>No pet selected.</p>";
}
mysqli_close($connection);
include_once('includes/footer.inc');
?>
