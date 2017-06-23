$(document).ready(function () {
    $("#header ul li").hover(function () {
        $(this).find("ul").stop().fadeToggle(350);
    });
});