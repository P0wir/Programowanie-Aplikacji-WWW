       $(document).ready(function() {
            $(".menu-item").on("click", function(){
                if (!$(this).is(":animated")) {
                    $(this).animate({
                        fontSize: "+=5px",
                        duration: 300
                    });
                }
            });
        });