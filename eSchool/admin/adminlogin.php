<!-- Admin Login form modal start -->
<div class="modal fade" id="adminexampleModal" tabindex="-1" aria-labelledby="adminexampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="adminexampleModalLabel">Admin Login</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card" style="border-radius: 15px;">
                    <div class="card-body p-5">
                        <h2 class="text-uppercase text-center mb-5">Admin Login Here</h2>
                        <div id="adminLoginForm">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="adminlogemail"><i class="fa-solid fa-envelope"></i> Your Email</label>
                                <input type="email" id="adminlogemail" class="form-control form-control-lg" />
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="adminlogpass"><i class="fa-solid fa-key"></i> Password</label>
                                <input type="password" id="adminlogpass" class="form-control form-control-lg" />
                            </div>
                            <div class="d-flex justify-content-center">
                                <small id="statusadminLogMsg"></small>
                                <!-- Include onclick attribute -->
                                <button type="button" value="Login" name="login" class="btn btn-primary" id="adminloginbtn" onclick="checkAdminLogin()">Login</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include jQuery library -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="adminajaxrequest.js"></script>
 -->

      <!-- <div class="modal-body">
        <form>
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Admin Login Here</h2>

              <form id="adminloginform">
                <div class="form-outline mb-4">
                  <label class="form-label" for="adminlogemail"><i class="fa-solid fa-envelope"></i> Your Email</label>
                  <input type="email" id="adminlogemail" class="form-control form-control-lg" />
                  </div>
                <div class="form-outline mb-4">
                  <label class="form-label" for="adminlogpass"><i class="fa-solid fa-key"></i> Password</label>
                  <input type="password" id="adminlogpass" class="form-control form-control-lg" />
                  </div>
                <div class="d-flex justify-content-center">
                  <small id="statusadminLogMsg"></small>
                  <button type="submit" value ="Login" name="login" class="btn btn-primary" id="adminloginbtn" onclick="checkadminLogin()">Login</button>
                </div>

              </form>

            </div>
          </div>        
        </form>
      </div> -->
    </div>
  </div>
</div>
	<!-- Admin Login form modal end-->
