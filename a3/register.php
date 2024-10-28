<?php

$title = "RegisterUser";

include_once('includes/header.inc');
include_once('includes/nav.inc');
?>
<div class="content-wrapper ">
   <div class="content ">
   <div class="container ">
		<header>
	    	<h2>Register User</h2>
	    	<p>You can Register as new User here</p>
		</header>
		<form action="reg.php" method="post">
	          <div class="form-group">
	            <label for="UserName " class="required">User Name </label>
	            <input type="text" class="form-control" id="UserName " placeholder="Enter User Name " required="">
	          </div>
	          <div class="form-group">
	            <label for="Password" class="required">Password</label>
	            <input type="password" class="form-control" id="Password" placeholder="Password" required="">
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