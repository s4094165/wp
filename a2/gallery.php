<?php

$title = "Gallery";
include_once('includes/header.inc');
include('includes/db_connect.inc');

$sql = "SELECT petid, petname, image FROM pets"; 
$result = $connection->query($sql);

if (!$result) {
    die("Database query failed: " . $connection->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <?php include_once('includes/nav.inc'); ?>
    <h2>Pets Victoria has a lot to offer!</h2>
    <p class="second">For almost two decades, Pets Victoria has helped in creating true social change by bringing pet adoption into the mainstream. Our work has helped make a difference to the Victorian rescue community and thousands of pets in need of rescue and rehabilitation. But, until every pet is safe, respected, and loved, we all still have big, hairy work to do.</p>
</header>

<main>
    <div class="gallery">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="image-box">
                <a href="details.php?petid=<?php echo $row['petid']; ?>">
                    <img src="images/<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['petname']); ?>">
                    <div class="overlay">
                        <span class="material-icons">search</span>
                        <p>Discover More!</p>
                    </div>
                </a>
                <div class="desc"><?php echo htmlspecialchars($row['petname']); ?></div>
            </div>
        <?php endwhile; ?>
    </div>
</main>

<?php include_once('includes/footer.inc'); ?>

</body>
</html>

<?php
$connection->close();
?>
