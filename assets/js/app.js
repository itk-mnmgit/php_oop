$(function(){

    $(".js-toggle").on("click", function() {
        $(this).toggleClass("on");
        $(this)
        .siblings()
        .slideToggle();
    });

    $('')
});
