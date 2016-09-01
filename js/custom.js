
$(document).ready(function () {

    $(window).load(function () {
        $('.flexslider').flexslider({
            animation: "slide",
            controlsContainer: ".flex-container"
        });
    });

    (function (window, $, PhotoSwipe)
    {
        $(document).ready(function ()
        {
            $("#gallery a").photoSwipe(
                    {
                        enableMouseWheel: false,
                        enableKeyboard: false
                    });
        });
    }(window, window.jQuery, window.Code.PhotoSwipe));
});		