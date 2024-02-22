<!--Student Registration form modal start-->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Student Registration</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h2 class="text-uppercase text-center mb-5">Create an account</h2>
                <!-- <form action="addstudent.php" method="POST" id="sturegform"> -->
                  <form action="addstudent.php" method="POST" id="sturegform" onsubmit="addStu()">

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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Student Registration form modal end-->
