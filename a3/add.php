<?php

$title = "AddPage";

include_once('includes/header.inc');
include_once('includes/nav.inc');
?>

<header>
    <h2>Add a Pet</h2>
    <p>You can add a new pet here</p>
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
        <?php } ?>
<div class="content-wrappers ">
    <div class="content">
    <div class="container ">
        <form action="upload.php" method="post" enctype="multipart/form-data" class="tall-forms">
            <div class="form-group">
            <label for="petName" class="required">Pet Name:</label>
            <input type="text" id="petName" name="petName" placeholder="Provide a name for the pet" required class="form-control">
            </div>
            <div class="form-group">
            <label for="petType" class="required">Type:</label>
            <select id="petType" name="petType" required class="form-control">
                <option value="" disabled selected>--Choose an option--</option>
                <option value="dog">Dog</option>
                <option value="cat">Cat</option>
                <option value="other">Other</option>
            </select>
            </div>
            <div class="form-group">
            <label for="petDescription" class="required">Description:</label>
            <textarea id="petDescription" name="petDescription" rows="2" cols="155" class="form-control" placeholder ="Describe the pet briefly" required></textarea>
            </div>
            <div class="form-group">
            <!-- <div class="file-input-container"> -->
                <label for="petImage" class="required">Select an Image:</label>
                <input type="file" id="petImage" name="petImage" accept="image/*" required class="form-control">
                <span class="text-danger">MAX IMAGE SIZE: 500PX</span>
            <!-- </div> -->
            </div>
            <div class="form-group">
            <label for="petCaption" class="required">Image Caption:</label>
            <input type="text" id="petCaption" name="petCaption" class="form-control" placeholder="describe the image in one word" required class="form-control">
            </div>
            <div class="form-group">
            <label for="petAge" class="required">Age (Months):</label>
            <input type="text" id="petAge" name="petAge" placeholder="Age of a pet in months" required class="form-control">
            </div>
            <div class="form-group">
            <label for="petLocation" class="required">Location:</label>
            <input type="text" id="petLocation" name="petLocation" placeholder="Location of the pet" required class="form-control">
            </div><br>
            <div class="button-container">
                <button type="submit" class="submit-button">
                    <span class="material-icons">add_task</span> submit
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

<?php

include_once('includes/footer.inc');
?>
