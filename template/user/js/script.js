$(document).ready(function() {
    $('#fav').click(function(){
        console.log("ea");
        $('#container').load('ajax/fav.php?iduser=' + $('#iduser').val() + '&idbaju=' + $('#idbaju').val());
    });
});