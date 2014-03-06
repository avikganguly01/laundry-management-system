var minHeight = 10; // Define a minimum height for the middle div

var resizeMiddle = function() {
    var h1 = $(window).height() - $('#header').height() - $('#footer').height() - 30;
    h1 = h1 > minHeight ? h1 : minHeight;
    $('#block').height(h1);
}

var resizeInside = function() {
    var h2 = $(window).height() - $('#header').height() - $('#footer').height() - 110;
    h2 = h2 > minHeight ? h2 : minHeight;
    $('#insideblock').height(h2);
}


$(document).ready(resizeMiddle);
$(document).ready(resizeInside);
$(window).resize(resizeMiddle);
$(window).resize(resizeInside);
