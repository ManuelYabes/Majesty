$(document).ready(function() {
    $('#search').keyup(function(){
        console.log('ea');
        $.get('ajax/searchuser.php?user=' + $('#search').val(), function(data){
            $('#Container').html(data);
        });
    });
    $('#searchB').keyup(function(){
        console.log('ea');
        $.get('ajax/searchbaju.php?baju=' + $('#searchB').val(), function(data){
            $('#Container').html(data);
        });
    });
    $('#searchP').keyup(function(){
        console.log('ea');
        $.get('ajax/searchpeminjam.php?peminjam=' + $('#searchP').val(), function(data){
            $('#Container').html(data);
        });
    });
    $('#searchD').keyup(function(){
        console.log('ea');
        $.get('ajax/searchdipinjam.php?dipinjam=' + $('#searchD').val(), function(data){
            $('#Container').html(data);
        });
    });
    
});