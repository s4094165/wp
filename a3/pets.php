<?php

$title = "Pets Page";

include_once('includes/header.inc');

include('includes/db_connect.inc');
?>

    <header>
        
        <?php
        include_once('includes/nav.inc');
        ?>

    </header>
    <main>
        <h2 class="center">Discover Pets Victoria</h2>
        <p>Pets Victoria is a dedicated pet adoption organization based in Victoria, Australia, focussed on providing a safe and loving environment for pets in need. With a compassionate approach, Pets Victoria works tirelessly to rescue, rehabilitate, and rehome dogs, cats, and other animals. Their mission is to connect these deserving pets with caring individuals and families, creating lifelong bonds. The organization offers a range of services, including adoption counselling, pet education, and community support programs, all aimed at promoting responsible pet ownership and reducing the number of homeless animals.</p>
        <br><div class="content">
            <img src="images/pets.jpeg" alt="A cute dog" class="center">
            <table>
            <thead>
                <tr>
                    <th>Pet</th>
                    <th>Type</th>
                    <th>Age</th>
                    <th>Location</th>
                </tr>
            </thead>
            
                <?php

$sql = "SELECT petid, petname, type, age, location FROM pets";
$stmt = mysqli_prepare($connection, $sql);  

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);     

if ($result && mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {

    $petid = $row['petid'];
    $petname = htmlspecialchars($row['petname']);
    $type = htmlspecialchars($row['type']);
    $age = htmlspecialchars($row['age']);
    $location = htmlspecialchars($row['location']);

    echo '<tr>
              <td><a href="details.php?petid=' . $petid . '">' . $petname . '</a></td>
              <td>' . ucfirst($type) . '</td>
              <td>' . $age . ' month</td>
              <td>' . $location . '</td>
            </tr>';
  }
} else {

  echo '<tr><td colspan="4">No pets found.</td></tr>';
}

mysqli_stmt_close($stmt);
mysqli_close($connection);
?>

        </table>
 
        </div>
    </main>

<?php
include_once('includes/footer.inc');
?>

<!--All images used are from Adobe Stock and used under RMIT Education License--> 