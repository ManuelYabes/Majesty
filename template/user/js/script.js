$(document).ready(function() {
    $('#favs').unbind().click(function(){
        // stop();
        console.log("ea");
        $('#favs').toggleClass('text-[#d7a86e]');
        $('#favs').toggleClass('text-white');
        $('#container').load('ajax/fav.php?iduser=' + $('#iduser').val() + '&idbaju=' + $('#idbaju').val());
    });
    $('#search').unbind().keyup(function(){
        console.log('ea');
        $.get('ajax/search.php?baju=' + $('#search').val(), function(data){
            $('#Container').html(data);
        });
    })
});