var idleTime = 0;
$(document).ready(function () {
    //Increment the idle time counter every minute.
    var idleInterval = setInterval(timerIncrement, 1000); // 1 second

    //Zero the idle timer on mouse movement.
    $(this).mousemove(function (e) {
        idleTime = 0;
        $("figure").removeClass('away offline');
    });
    $(this).keypress(function (e) {
        idleTime = 0;
        $("figure").removeClass('away offline');
    });
});

function timerIncrement() {
    idleTime = idleTime + 1;
    if (idleTime > 120) { // 20 minutes
      $("figure").addClass('away');
    }
    if (idleTime > 300) {
      $("figure").addClass('offline').removeClass('away');
    }
}
