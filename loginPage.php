
<?php
session_start();
include('includes/header.php');



?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>



<?php  

if (isset($_SESSION["banned"])) {
	echo "
	  <script>
		Swal.fire({
		  icon: 'error',
		  title: 'Oops...',
		  text: \"it looks like you're banned!\",
		  footer: '<a>Why do I have this issue?</a>'
		}).then((result) => {
		  // handle the result of the modal
		  if (result.isConfirmed) {
			// do something if the user clicked \"OK\"
		  } else if (result.isDismissed) {
			// do something if the user clicked \"Cancel\" or clicked outside the modal
		  }
		});
	  </script>
	";
	unset($_SESSION["banned"]); // unset the session variable so that the modal is not shown again on page refresh
  }



  if (isset($_SESSION["incorrect"])) {
	echo "
	  <script>
	  Swal.fire('Password or email is wrong')
	  </script>
	";
	unset($_SESSION["incorrect"]); // unset the session variable so that the modal is not shown again on page refresh
  }

  
?>




	<div class="container-fluid d-flex login">
    <div class="logo">
   <h1>Fresh Pages</h1>
  <h3>find endless books in the only ever fresh page</h3>
   </div>
			<div class="col-md-5 offset-md-3">
				<div class="card">
					<div class="card-body">
						<form action="login.php" method="POST">
							<div class="form-group">
								<input type="text" class="form-control loginIput" name="Username" placeholder="Username">
							</div>
							<div class="form-group">
								<input type="text" class="form-control loginIput" name="pwd" placeholder="Password">
							</div>
                      <div class="loginbtn">
              <button type="submit" class="btn btn-primary form-control">Log in</button>
							<a href="singupPage.php"  class="btn btn-secondary">Don't have an acount sign up</a>
              </div>			
						</form>
					</div>
				</div>
			</div>
		</div>




<?php
 include('includes/footer.php');
?>


