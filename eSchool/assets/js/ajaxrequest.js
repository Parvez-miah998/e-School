//Login code for submission

$(document).ready(function () {
    $("#stuloginbtn").on("click", function (event) {
        event.preventDefault();
        checkStuLogin();
    });
});

function checkStuLogin() {
    var stuemail = $("#stulogemail").val().trim();
    var stupass = $("#stulogpass").val().trim();

    console.log("Email:", stuemail);
    console.log("Password:", stupass);

    $.ajax({
        url: 'logstudent.php',
        method: 'POST',
        dataType: 'json',
        data: {
            stulogemail: stuemail,
            stulogpass: stupass
        },
        success: function (data) {
            console.log(data);
            if (data.status === "OK") {
                $("#statusLogMsg").html("<small style='color:green;'>Login Successful!</small>");
                // Redirect to the dashboard or home page after successful login
                window.location.href = "http://localhost/eschool/index.php";
            } else {
                $("#statusLogMsg").html("<small style='color:red;'>" + data.message + "</small>");
            }
        },
        error: function (error) {
            console.log("Error:", error);
        }
    });
}



//Registration code for submission

$(document).ready(function () {
    $("#stuemail").on("blur", function () {
        var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        var stuemail = $("#stuemail").val();

        $.ajax({
            url: '../addstudent.php', 
            method: 'POST',
            dataType: 'json',
            data: {
                checkemail: "checkemail",
                stuemail: stuemail,
            },
            success: function (data) {
                if (data === "Exists") {
                    $("#statusMsg3").html('<small style="color:red;">This email is already registered.</small>');
                    $("#stuemail").focus();
                } else if (data === "Available" && reg.test(stuemail)) {
                    $("#statusMsg3").html('<small style="color:green;">Email is available.</small>');
                } else if (!reg.test(stuemail)) {
                    $("#statusMsg3").html('<small style="color:red;">Please Enter a valid email (e.g. example@gmail.com).</small>');
                } else if (stuemail === "") {
                    $("#statusMsg3").html('<small style="color:red;">Please Enter your Email.</small>');
                }
            }
        });
    });
});


function addStu() {
    event.preventDefault();

    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;

    // Get form values
    var stuname = $("#stuname").val().trim();
    var stucontact = $("#stucontact").val().trim();
    var stuemail = $("#stuemail").val().trim();
    var stuinsname = $("#stuinsname").val().trim();
    var stumajor = $("#stumajor").val().trim();
    var stupass = $("#stupass").val().trim();
    var stuconfirmpass = $("#stuconfirmpass").val().trim();

    // Function to display error messages within the modal
    function displayErrorMessage(field, message) {
        $("#" + field).next(".error-msg").html('<small style="color:red;">' + message + '</small>');
        $("#" + field).focus();
    }

    // Validate required fields
    if (!stuname) {
        $("#statusMsg1").html('<small style="color:red;">Please Enter your Name.</small>');
        $("#stuname").focus();
        return false;
    } else {
        $("#statusMsg1").html('');
    }

    if (!stucontact) {
        $("#statusMsg2").html('<small style="color:red;">Please Enter your Contact.</small>');
        $("#stucontact").focus();
        return false;
    } else {
        $("#statusMsg2").html('');
    }

    if (!stuemail) {
        $("#statusMsg3").html('<small style="color:red;">Please Enter your Email.</small>');
        $("#stuemail").focus();
        return false;
    } else if (stuemail.trim() != "" && !reg.test(stuemail)) {
        $("#statusMsg3").html('<small style="color:red;">Please Enter valid Email. (e.g. example@gmail.com)</small>');
        $("#stuemail").focus();
        return false;
    }
    else {
        $("#statusMsg3").html('');
    }


    if (!stuinsname) {
        $("#statusMsg4").html('<small style="color:red;">Please Enter your Institution Name.</small>');
        $("#stuinsname").focus();
        return false;
    } else {
        $("#statusMsg4").html('');
    }

    if (!stumajor) {
        $("#statusMsg5").html('<small style="color:red;">Please Enter your Class or Major.</small>');
        $("#stumajor").focus();
        return false;
    } else {
        $("#statusMsg5").html('');
    }

    if (!stupass) {
        $("#statusMsg6").html('<small style="color:red;">Please Enter Password.</small>');
        $("#stupass").focus();
        return false;
    } else {
        $("#statusMsg6").html('');
    }

    if (!stuconfirmpass) {
        $("#statusMsg7").html('<small style="color:red;">Please Enter Confirm Password.</small>');
        $("#stuconfirmpass").focus();
        return false;
    } else {
        $("#statusMsg7").html('');
    }

    // Check if passwords match
    if (stupass !== stuconfirmpass) {
        $("#statusMsg7").html('<small style="color:red;">Passwords do not match</small>');
        return false;
    } else {
        $("#statusMsg7").html('');
    }

    // Submit the form if all validations pass
    $.ajax({
    url: 'http://localhost/eschool/addstudent.php',
    method: 'POST',
    dataType: 'json',
    data: {
        sturegbtn: 'sturegbtn',
        stuname: stuname,
        stucontact: stucontact,
        stuemail: stuemail,
        stuinsname: stuinsname,
        stumajor: stumajor,
        stupass: stupass,
        stuconfirmpass: stuconfirmpass
    },
    success: function (data) {
        console.log(data);
        if (data.status === "OK") {
            $("#successMsg").html("<span>Registration Successful!</span>");
            window.location.href = "http://localhost/eschool/index.php";
            clearStuRegField();
        } else if (data.status === "Failed") {
            $("#successMsg").html("<span>This Email is already Used !</span>");
        }
    },
    error: function (error) {
        console.log("Error:", error);
    }
});

}

//Empty all the fields
function clearStuRegField(){
    $("#sturegform").trigger("reset");
    // Clear the form fields
        $("#stuname").val("");
        $("#stucontact").val("");
        $("#stuemail").val("");
        $("#stuinsname").val("");
        $("#stumajor").val("");
        $("#stupass").val("");
        $("#stuconfirmpass").val("");
}


//Ajax call for studentLogin





