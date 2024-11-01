<?php

$title = "Homepage";

include_once('includes/header.inc');
include_once('includes/nav.inc');
include('includes/db_connect.inc');
?>
 <div class="content-wrapper">
<?php
    if(isset($_SESSION['success'])){?>
    <div class="alert alert-success  alert-dismissible fade show" role="alert">
    <?php echo $_SESSION['success']; unset($_SESSION['success']);?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } 
?>
    <div class="content">
    <div class="container">
       
<div class="row" >
    <?php
        $sql    = "SELECT image FROM pets LIMIT 4";
        $stmt   = mysqli_prepare($connection,$sql); 
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        mysqli_stmt_bind_result($stmt,$image);
        $images = array();
        while(mysqli_stmt_fetch($stmt)){
            $images[] = array('image' => $image);
        }
        mysqli_stmt_close($stmt);
        mysqli_close($connection);

    ?>
<div id="demo" class="carousel slide " data-bs-ride="carousel">
<br><br>
  <!-- Indicators/dots -->
  <div class="carousel-indicators">
    <?php foreach($images as $key => $image){?>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="<?php echo $key;?>" class="<?php if($key == 0) { echo 'active';}?>">
        </button>
    <?php } ?>
  </div>

  <!-- The slideshow/carousel -->
  <div class="carousel-inner" >
    <?php foreach($images as $key => $image){?>
        <div class="carousel-item <?php if($key == 0) { echo 'active';}?>">
          <img src="images/<?php echo $image['image'];?>" alt="<?php echo $image['image'];?>" class="d-block w-100">
        </div>
    <?php } ?>
  </div>

  <!-- Left and right controls/icons -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
<br><br>
</div>
<div class="home-header"><br><br>
  <h4 class="main-title">PETS VICTORIA</h4>
  <div class="welcome-text">WELCOME TO PET<br>ADOPTION</div>
</div>
</div>
</div>
</div>
<!-- </div> -->

<div class="content" id="home_content">
    <div class="container">
<form action="search.php" method="post">
    <div class="row">
        <div class="col-md-5">
            <input type="text" name="search" class="form-control" placeholder="I am Looking for..."> 
        </div>
        <div class="col-md-5">
            <select class="form-control" name="type">
                <option value="">Select your Pet Type</option>
                <option value="dog">Dog</option>
                <option value="cat">Cat</option>
                <option value="other">Other</option>
            </select>
        </div>
        <div class="col-md-2">
            <input type="submit"  value="Search" class="btn home_button">
        </div>
    </div>
</form>
<h3 class="homeh3">Discover Pets Victoria</h3>
    <p class="homep">
        Pets Victoria is a dedicated pet adoption organization based in Victoria, Australia, focussed on providing a safe and loving environment for pets in need. With a compassionate approach, Pets Victoria works tirelessly to rescue, rehabilitate, and rehome dogs, cats, and other animals. Their mission is to connect these deserving pets with caring individuals and families, creating lifelong bonds. The organization offers a range of services, including adoption counselling, pet education, and community support programs, all aimed at promoting responsible pet ownership and reducing the number of homeless animals.
    </p>
</div>
</div>
</div>
<?php
include_once('includes/footer.inc');
?>

<!--All images used are from Adobe Stock and used under RMIT Education License--> 