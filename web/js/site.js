function getEpisodes(id){
    setTimeout(function(){
        $.ajax({
            url: '/post',
            data: {
                id: id,
            },
            type: 'POST',
            success: function(e){
                
            },
            error: function(){

            }
        })
    },0);
}