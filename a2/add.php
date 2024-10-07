<?php

$title = "Add Page";

include_once('includes/header.inc');
?>

<header>
    <?php

    include_once('includes/nav.inc');
    ?>
    <h2>Add a Pet</h2>
    <p>You can add a new pet here</p>
</header>

<main>
        <form action="upload.php" method="post" enctype="multipart/form-data" class="tall-form">
            <label for="petName" class="required">Pet Name:</label><br>
            <input type="text" id="petName" name="petName" placeholder="Provide a name for the pet" required><br>

            <label for="petType" class="required">Type:</label><br>
            <select id="petType" name="petType" class="form-input" required>
                <option value="" disabled selected>--Choose an option--</option>
                <option value="dog">Dog</option>
                <option value="cat">Cat</option>
                <option value="other">Other</option>
            </select><br>

            <label for="description" class="required">Description:</label><br>
            <input type ="description" name="message" rows="2" cols="155" class="form-input" placeholder ="Describe the pet briefly" required>


            <div class="file-input-container">
                <label for="petImage" class="required">Select an Image:</label>
                <input type="file" id="petImage" name="petImage" accept="image/*" required>
                <span class="image-size-warning">MAX IMAGE SIZE: 500PX</span>
            </div>

            <label for="caption" class="required">Image Caption:</label><br>
            <input type="text" id="caption" name="caption" class="form-input" placeholder="describe the image in one word" required><br>

            <label for="age" class="required">Age (Months):</label><br>
            <input type="text" id="age" name="age" placeholder="Age of a pet in months" required class="input-text"><br>

            <label for="location" class="required">Location:</label><br>
            <input type="text" id="location" name="location" class="form-input" placeholder="Location of the pet" required><br>
            
            <div class="button-container">
                <button type="submit" class="submit-button">
                    <span class="material-icons">add_task</span> submit
                </button>
                <button type="reset" class="clear-button">
                    <span class="material-icons">close</span> Clear
                </button>
            </div>

        </form>
    </main>

<?php

include_once('includes/footer.inc');
?>
