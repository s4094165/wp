<?php

$title = "Gallery";
include_once('includes/header.inc');
include_once('includes/nav.inc');
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
