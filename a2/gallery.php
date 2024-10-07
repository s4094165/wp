<?php

$title = "Gallery";
include_once('includes/header.inc');
include('includes/db_connect.inc');

$sql = "SELECT petid, petname, image FROM pets"; 
$result = $connection->query($sql);

if (!$result) {
    die("Database query failed: " . $conn->error);
}
?>

<header>
    <?php

    include_once('includes/nav.inc');
    ?>
 <h2>Pets Victoria has a lot to offer!</h2>
 <p class = "second">For almost two decades, Pets Victoria has helped in creating true social change by bringing pet adoption into the mainstream. Our work has helped make a difference to the Victorian rescue community and thousands of pets in need of rescue and rehabilitation. But, until every pet is safe, respected, and loved, we all still have big, hairy work to do.</p>
    </header>

    <main>
        <div class="gallery">
            <div class="image-box">
                <img src="Images/cat1.jpeg" alt="Image 1">
                <div class="overlay">
                    <span class="material-icons">search</span>
                    <p>Discover More!</p>
                </div>

                <p class="third">Milo</p>
            </div>
            <div class="image-box">
                <img src="Images/dog1.jpeg" alt="Image 2">
                <div class="overlay">
                    <span class="material-icons">search</span>
                    <p>Discover More!</p>
                </div>

                <p class="third">Baxter</p>
            </div>

            <div class="image-box">
                <img src="Images/cat2.jpeg" alt="Image 3">
                <div class="overlay">
                    <span class="material-icons">search</span>
                    <p>Discover More!</p>
                </div>

                <p class="third">Luna</p>
            </div>

            <div class="image-box">
                <img src="Images/dog2.jpeg" alt="Image 4">
                <div class="overlay">
                    <span class="material-icons">search</span>
                </div>

                <p class="third">Willow</p>
            </div>

            <div class="image-box">
                <img src="Images/cat3.jpeg" alt="Image 5">
                <div class="overlay">
                    <span class="material-icons">search</span>
                    <p>Discover More!</p>
                </div>

                <p class="third">Oliver</p>
            </div>


            <div class="image-box">
                <img src="Images/dog3.jpeg" alt="Image 6">
                <div class="overlay">
                    <span class="material-icons">search</span>
                    <p>Discover More!</p>
            </div>

            <p class="third">Bella</p>
        </div>

        </div>
     
    </main>

<?php

include_once('includes/footer.inc');

$connection->close();
?>
