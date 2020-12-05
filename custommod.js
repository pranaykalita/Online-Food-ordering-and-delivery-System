// header background color on scroll

$(window).on("scroll", function() {
    if($(window).scrollTop() > 50) {
        $(".headsc").addClass("active");
    } else {
        //remove the background property so it comes transparent again (defined in your css)
       $(".headsc").removeClass("active");
    }
});


//typing effect 