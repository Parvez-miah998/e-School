	<!--include start nav bar-->
	<?php 
	include('includes/header.php'); 
	include('includes/dbconnection.php'); 
	?>
	<!--end nav bar-->

	<div class="container-fluid bg-dark">
		<div class="row">
			<img src="assets/image/php.jpg" alt="courses" style="height: 300px; width: 100%; object-fit: cover; box-shadow: 10px;">
		</div>
	</div>

	<div class="container jumbotron mb-5 mt-5">
		<div class="row">
			<div class="col-md-4">
				<h5 class="mb-3">If Already Registered ! Login</h5>
				<form role="form" id="stuloginform">
					<div class="form-group">
						<i class="fas fa-envelope"></i> <label for="stulogemail" class="pl-2 font-weight-bold"> Email</label><small id="statusLogMsg"></small><input type="email" class="form-control" placeholder="Email" name="stulogemail" id="stulogemail">
					</div><br>
					<div class="form-group">
                      <label class="form-label" for="stulogpass"><i class="fa-solid fa-key"></i> Password</label>
                      <input type="password" id="stulogpass" class="form-control form-control-lg" placeholder="Password" />
                      </div><br>
                    <div class="d-flex justify-content-center">
                      <small id="statusLogMsg"></small>
                       <button type="submit" value ="Login" name="login" class="btn btn-primary" id="stuloginbtn" onclick="checkStuLogin()">Login</button> 
                    </div>
				</form><br>
				<small id="statusLogMsg"></small>
			</div>
			<div class="col-md-6 offset-md-1">
				<h5 class="mb-3">New User ! Sign Up</h5>
				<form role="form" id="sturegform">
					<div class="form-group">
						<label for="stuname">Name</label>
                        <small id="statusMsg1" class="error-msg"></small>
                        <input type="text" name="stuname" id="stuname" class="form-control">
					</div>
					<div class="form-group">
                        <label for="stucontact">Contact Number</label>
                        <small id="statusMsg2" class="error-msg"></small>
                        <input type="text" name="stucontact" id="stucontact" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="stuemail">Email</label>
                        <small id="statusMsg3" class="error-msg"></small>
                        <input type="email" name="stuemail" id="stuemail" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for= "stuinsname">Institution Name</label>
                        <small id="statusMsg4" class="error-msg"></small>
                        <input type="text" name="stuinsname" id="stuinsname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="stumajor">Class / Major</label>
                        <small id="statusMsg5" class="error-msg"></small>
                        <input type="text" name= "stumajor" id="stumajor" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="stupass">Password</label>
                        <small id="statusMsg6" class="error-msg"></small>
                        <input type="password" name="stupass" id="stupass" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="stuconfirmpass">Confirm Password</label>
                        <small id="statusMsg7" class="error-msg"></small>
                        <input type="password" name="stuconfirmpass" id="stuconfirmpass" class="form-control">
                    </div>
                    <br>
                    <div class="form-group">
                        <span id="successMsg" class="success-msg"></span>
                        <button type="submit" class="btn btn-primary" id="sturegbtn" onclick="addStu()">Register</button>
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    </div>
				</form><br>
				<small id="successMsg"></small>
			</div>
		</div>
	</div>




<!--Footer area start-->
	</div>
</div>
	<?php include('includes/footer.php') ?>
<!--Footer area end-->