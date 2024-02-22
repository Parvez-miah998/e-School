$(document).ready(function () {
    $("#adminloginbtn").on("click", function (event) {
        event.preventDefault();
        checkAdminLogin();
    });
});

function checkAdminLogin() {
    var adminemail = $("#adminlogemail").val().trim();
    var adminpass = $("#adminlogpass").val().trim();

    $.ajax({
        url: 'admin/admin.php', // Update the URL to the correct path if necessary
        method: 'POST',
        dataType: 'json',
        data: {
            adminlogemail: adminemail,
            adminlogpass: adminpass
        },
        success: function (data) {
            console.log(data);
            if (data.status === "OK") {
                $("#statusadminLogMsg").html("<small style='color:green;'>Login Successful!</small>");
                window.location.href = "http://localhost/eschool/admin/dashboard.php";
            } else {
                $("#statusadminLogMsg").html("<small style='color:red;'>" + data.message + "</small>");
            }
        },
        error: function (error) {
            console.log("Error:", error);
        }
    });
}

