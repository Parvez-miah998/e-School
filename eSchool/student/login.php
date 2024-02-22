<!--Student Login form modal start-->
    	<div class="modal fade" id="examplesModal" tabindex="-1" aria-labelledby="examplesModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="examplesModalLabel">Student Login</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
              <div class="card" style="border-radius: 15px;">
                <div class="card-body p-5">
                  <h2 class="text-uppercase text-center mb-5">Login Here</h2>

                  <form id="stuloginform">
                    <div class="form-outline mb-4">
                      <label class="form-label" for="stulogemail"><i class="fa-solid fa-envelope"></i> Your Email</label>
                      <input type="email" id="stulogemail" class="form-control form-control-lg" />
                      </div>
                    <div class="form-outline mb-4">
                      <label class="form-label" for="stulogpass"><i class="fa-solid fa-key"></i> Password</label>
                      <input type="password" id="stulogpass" class="form-control form-control-lg" />
                      </div>
                    <div class="d-flex justify-content-center">
                      <small id="statusLogMsg"></small>
                       <button type="submit" value ="Login" name="login" class="btn btn-primary" id="stuloginbtn" onclick="checkStuLogin()">Login</button> 
                    </div>
                    <p class="text-center text-muted mt-5 mb-0">Don't have an account? <a class="nav-link custom-nav-item" href="#"  data-bs-toggle="modal" data-bs-target="#exampleModal">Sign UP</a></p>

                  </form>
                 
                </div>
              </div>        
            </form>
          </div>
        </div>
      </div>
    </div>
	<!--Student Login form modal end-->