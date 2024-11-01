<?php

$title = "RegisterUser";

include_once('includes/header.inc');
include_once('includes/nav.inc');

$date = new DateTime('now', new DateTimeZone('Australia/Melbourne'));
$cd   = $date->format('Y-m-d');
$time = $date->format('h:i:s A');
$date_format = explode('-', $cd);
?>
<div class="content-wrapper ">
   <div class="content ">
   <div class="container ">
		<header>
	    	<h2>Register User</h2>
	    	<p>You can Register as new User here</p>
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
		<form action="users.php" method="post">
	          <div class="form-group">
	            <label for="UserName" class="required">User Name </label>
	            <input type="text" class="form-control" id="UserName" placeholder="Enter User Name " required name="UserName">
	          </div>
	          <div class="form-group">
	            <label for="Password" class="required">Password</label>
	            <input type="password" class="form-control" id="Password" placeholder="Password" required name="Password">
	          </div>
	          <div class="form-group">
	            <label for="date" class="required">Reg Date</label>
	            <input type="datetime-local" class="form-control" id="date" required name="reg_date">
	          </div>
	          <br>
	        <div class="button-container">
                <button type="submit" class="submit-button">
                    <span class="material-icons">add_task</span> Register
                </button>
               
            </div><br>
        </form>
	</div>
	</div>
</div>
<?php
include_once('includes/footer.inc');
?>