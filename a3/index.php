<?php

$title = "Homepage";

include_once('includes/header.inc');
include_once('includes/nav.inc');
?>
 <div class="content-wrapper">
    <div class="content">
    <div class="container">
       
<div class="row">
<div id="demo" class="carousel slide col-md-5" data-bs-ride="carousel">

  <!-- Indicators/dots -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
  </div>

  <!-- The slideshow/carousel -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/cat1.jpeg" alt="Los Angeles" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="images/cat2.jpeg" alt="Chicago" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="images/cat3.jpeg" alt="New York" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="images/pets.jpeg" alt="New York" class="d-block w-100">
    </div>
  </div>

  <!-- Left and right controls/icons -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>

</div>
<div class=" col-md-6">
  <h1 class="main-title">PETS VICTORIA</h1>
  <p class="welcome-text">WELCOME TO PET<br>ADOPTION</p>
</div>
</div>

<br>
<form action="search.php" method="post">
    <div class="row">
        <div class="col-md-5">
            <input type="text" name="" class="form-control" placeholder="I am Looking for..."> 
        </div>
        <div class="col-md-5">
            <select class="form-control">
                <option value="">Select your Pet Type</option>
                <option value="dog">Dog</option>
                <option value="cat">Cat</option>
                <option value="other">Other</option>
            </select>
        </div>
        <div class="col-md-2">
             <button type="submit" class="submit-button">
                    <span class="material-icons"></span> Search
                </button>
        </div>
    </div>
</form>
<h3>Discover Pets Victoria</h3>
    <p>
        Pets Victoria is a dedicated pet adoption organization based in Victoria, Australia, focussed on providing a safe and loving environment for pets in need. With a compassionate approach, Pets Victoria works tirelessly to rescue, rehabilitate, and rehome dogs, cats, and other animals. Their mission is to connect these deserving pets with caring individuals and families, creating lifelong bonds. The organization offers a range of services, including adoption counselling, pet education, and community support programs, all aimed at promoting responsible pet ownership and reducing the number of homeless animals.
    </p>
</div>
</div>
</div>
<?php
include_once('includes/footer.inc');
?>

<!--All images used are from Adobe Stock and used under RMIT Education License--> 