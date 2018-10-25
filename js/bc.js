/*!
 * Additional JS
 * 
 */

// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function() {
    $('.navbar-toggle:visible').click();
});

// Removes fixed width from .wp-caption div for images
$(".wp-caption").removeAttr('style');

CountDownTimer('03/24/2017 9:00 AM', 'countdown');

function CountDownTimer(dt, id)
{
    var end = new Date(dt);

    var _second = 1000;
    var _minute = _second * 60;
    var _hour = _minute * 60;
    var _day = _hour * 24;
    var timer;

    function showRemaining() {
        var now = new Date();
        var distance = end - now;
        if (distance < 0) {

            clearInterval(timer);
            document.getElementById(id).innerHTML = '<div class="begin">The games begin!</div>';

            return;
        }
        var days = Math.floor(distance / _day);
        var hours = Math.floor((distance % _day) / _hour);
        var minutes = Math.floor((distance % _hour) / _minute);
        var seconds = Math.floor((distance % _minute) / _second);

        document.getElementById(id).innerHTML = '<div><small>days</small><br/><strong>' + days + '</strong></div>';
        document.getElementById(id).innerHTML += '<div><small>hrs</small><br/><strong>' + hours + '</strong></div>';
        document.getElementById(id).innerHTML += '<div><small>mins</small><br/><strong>' + minutes + '</strong></div>';
        document.getElementById(id).innerHTML += '<div><small>secs</small><br/><strong>' + seconds + '</strong></div>';
    }

    timer = setInterval(showRemaining, 1000);
}