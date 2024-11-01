<?php

$title = "Login";

include_once('includes/header.inc');
include_once('includes/nav.inc');
?>
<div class="content-wrapper ">
   <div class="content ">
   <div class="container ">
		<header>
	    	<h2>Login</h2>
	    	<p>You can Login here</p>
		</header>
		<?php
		if(isset($_SESSION['error'])){?>
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<?php echo $_SESSION['error']; unset($_SESSION['error']);?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		<?php } ?>
		<form action="loginUser.php" method="post">
	          <div class="form-group">
	            <label for="UserName" class="required">User Name </label>
	            <input type="text" class="form-control" id="UserName" placeholder="Enter User Name " required name="UserName">
	          </div>
	          <div class="form-group">
	            <label for="Password" class="required">Password</label>
	            <input type="password" class="form-control" id="Password" placeholder="Password" required name="Password">
	          </div>
	          <br>
	        <div class="button-container">
                <button type="submit" class="submit-button">
                    <span class="material-icons">add_task</span> Login
                </button>
               
            </div><br>
        </form>
	</div>
	</div>
</div>
<?php
include_once('includes/footer.inc');
?>