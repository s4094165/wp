<nav class="navbar navbar-expand-sm ">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img src="images/logo.jpeg" alt="Pets Victoria Logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
       <li class="nav-item">
         <a class="nav-link <?php if($title != "Homepage"){?>active<?php }?>" href="index.php">Home</a>
        </li>
         <li class="nav-item">
          <a class="nav-link <?php if($title != "PetsPage"){?>active<?php }?>" href="pets.php">Pets</a>
        </li>
         <li class="nav-item">
          <a class="nav-link <?php if($title != "Gallery"){?>active<?php }?>" href="gallery.php">Gallery</a>
        </li>
        <?php
        if(isset($_SESSION["username"])){?>
            <li class="nav-item">
              <a class="nav-link <?php if($title != "AddPage"){?>active<?php }?>" href="add.php">Add More</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="logout.php">Logout</a>
            </li>
        <?php }else{
        ?>      
        <li class="nav-item">
          <a class="nav-link <?php if($title != "RegisterUser"){?>active<?php }?>" href="register.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($title != "Login"){?>active<?php }?>" href="login.php">Login</a>
        </li>
        <?php } ?>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="text" placeholder="Search">
       <button type="submit" class="search-button">
          <span class="material-icons">search</span>
        </button>
      </form>
    </div>
  </div>
</nav>
