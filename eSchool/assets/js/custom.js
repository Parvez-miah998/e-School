$(document).ready(function() {
    $("#playlist li").on("click", function() {
        $("#videoarea").attr("src", $(this).attr("movieurl"));
    });

    // Set the video source to the first item in the playlist on page load
    $("#videoarea").attr("src", $("#playlist li").eq(0).attr("movieurl"));
});
