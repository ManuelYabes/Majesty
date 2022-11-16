$(document).ready(function() {
    $('#fav').click(function(){
        console.log("ea");
        $('#fav').toggleClass('text-[#d7a86e]');
        $('#fav').toggleClass('text-white');
        $('#container').load('ajax/fav.php?iduser=' + $('#iduser').val() + '&idbaju=' + $('#idbaju').val());
    });
    $('#search').keyup(function(){
        console.log('ea');
        $.get('ajax/search.php?baju=' + $('#search').val(), function(data){
            $('#Container').html(data);
        });
    })
});