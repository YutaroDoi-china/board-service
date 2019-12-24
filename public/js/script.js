$(function(){
    let favList = {};
    if(!localStorage) {
        alert('ローカルストレージが使えません。');
    }
    // to active favirite button
    favList = JSON.parse(localStorage.getItem("favList"));
    let current_obj_id = $('#favBtn').data()
    if($('#favBtn').length && favList[current_obj_id.id+'key']){
        $('#favBtn').addClass('active');
    }

    if(document.URL.match('favirite')){
        console.log(favList);
    }

    $('.sort-btn').on('click', function(){
        let sort_url = $(this).attr('data-sort');
        $('.sort-btn').removeClass('active');
        $(this).addClass('active');
        $('#sort-content').html("");
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: sort_url,
            type: "POST",
            data: favList,
        })
        .done(function(html){
            $('#sort-content').html(html);
        })
        ;
    });

    $('#favBtn').on("click", function(){
        $(this).toggleClass('active');
        const obj_id = $(this).data();
        if($(this).hasClass('active')){
            saveFav(obj_id.id);
        }else{
            deleteFav(obj_id.id);
        }
    });

    function saveFav(id){
        if(!favList){
            localStorage.setItem("favList", JSON.stringify(favList));
        }
        favList = JSON.parse(localStorage.getItem("favList"));
        favList[id+"key"] = id;
        localStorage.setItem("favList", JSON.stringify(favList));
    }
    function deleteFav(id){
        favList = JSON.parse(localStorage.getItem("favList"));
        delete favList[id+"key"];
        localStorage.setItem("favList", JSON.stringify(favList));
    }
});



