$(document).ready(function() {
    $("#content").on("click", function(event) {
        event.preventDefault();
        $(this).animate({
            width: "1920px",
            opacity: 0.4,
            fontSize: "4em",
            borderWidth: "20px"
        }, 1500);
    });
});