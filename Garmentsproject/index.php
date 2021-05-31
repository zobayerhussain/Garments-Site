<?php require_once('connect1.php') ?>
<?php require_once('login.php') ?>

<!doctype html>
<html lang="en">
<?php require_once('head.php') ?>

  <body style="background-color: #63686D">

  	<div class="container bg-info bounce" style="width: 100%; max-width: 420px; margin-top: 5%; padding:2%;border-radius: 500px">
	  	<div class="text-center">
	      <img src="img/bubt.png" alt="" width="180" height="72">
	      <h1 class="h3 mb-3 font-weight-normal"><strong>Login</strong></h1>       
	    </div>

	    <form style="padding: 0; margin: 0; " method="post" action="index.php">
	    	<div class="container">
	    		<div class="form-inline form-row mb-3">
	      			<div class="col-md-4 col-sm-4"><label for="inputEmail">Account</label></div>
	      			<div class="col-md-8 col-sm-8">
	      				<input  type="email" id="inputEmail" class="form-control" name="username" required autofocus>
	      			</div>
	        
	     		</div>

			    <div class="form-inline mb-3 form-row">
			    	<div class="col-md-4 col-sm-4"> <label for="inputPassword">Password</label></div>
			      	<div class="col-md-8 col-sm-8"><input type="password" id="inputPassword" class="form-control" name="password" required></div>
			    </div>

			    <!-- <div class="checkbox mb-3" style="padding-left: 100px;">
			      <label>
			        <input type="checkbox" value="remember-me"> Remember me
			      </label>
			    </div>
 -->			    <div class=" d-flex flex-row-reverse">
			    	<button class="btn btn-lg btn-block btn-dark p-2" type="submit" name="submit">Sign in </button>
			    </div>
	    	</div>
	      
	    </form>
    </div>
  </body>
  <link rel="stylesheet" type="text/css" href="css/animate.css">
</html>
