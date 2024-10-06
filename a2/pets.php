<?php

$title = "Pets Page";

include_once('includes/header.inc');

include('includes/db_connect.inc');
?>

<body>
    <header>
        
        <?php
        include_once('includes/nav.inc');
        ?>

    </header>
    <main>
        <h2 class="center">Discover Pets Victoria</h2>
        <p>Pets Victoria is a dedicated pet adoption organization based in Victoria, Australia, focussed on providing a safe and loving environment for pets in need. With a compassionate approach, Pets Victoria works tirelessly to rescue, rehabilitate, and rehome dogs, cats, and other animals. Their mission is to connect these deserving pets with caring individuals and families, creating lifelong bonds. The organization offers a range of services, including adoption counselling, pet education, and community support programs, all aimed at promoting responsible pet ownership and reducing the number of homeless animals.</p>
        <br><div class="content">
            <img src="Images/pets.jpeg" alt="A cute dog" class="center">
            <table class="center">
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Age</th>
                    <th>Location</th>
                </tr>
                <tr>
                    <td>Milo</td>
                    <td>Cat</td>
                    <td>3 Months</td>
                    <td>Melbourne CBD</td>
                </tr>
                <tr>
                    <td>Baxter</td>
                    <td>Dog</td>
                    <td>5 Months</td>
                    <td>Cape Woolamai</td>
                </tr>
                <tr>
                    <td>Luna</td>
                    <td>Cat</td>
                    <td>1 Month</td>
                    <td>Ferntree Gully</td>
                </tr>
                <tr>
                    <td>Willow</td>
                    <td>Dog</td>
                    <td>48 Months</td>
                    <td>Marysville</td>
                </tr>
                <tr>
                    <td>Oliver</td>
                    <td>Cat</td>
                    <td>12 Months</td>
                    <td>Grampians</td>
                </tr>
                <tr>
                    <td>Bella</td>
                    <td>Dog</td>
                    <td>10 Months</td>
                    <td>Carlton</td>
                </tr>
            </table>
        </div>
    </main>

<?php
include_once('includes/footer.inc');
?>


<!--All images used are from Adobe Stock and used under RMIT Education License--> 