<?php
    $movie_id = $_GET['id'];
    // echo $movie_id;


?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script>





// $.ajax({
//     url: `https://api.themoviedb.org/3/movie/${movie_id}?api_key=ffc4e23618d62c1f9b865e732e5ecfcf&language=en-US`,
//     dataType: "JSON",
//     success: function(results) {
//         var data = results;
//         // console.log(data);
//         var resultHtml = $("<div><p>Movies Detail</p>");


//         var image = "https://image.tmdb.org/t/p/original" + data.poster_path;
//         var title = data.original_title;
//         var desc = data.overview;
//         var popularity = data.popularity;
//         var language = data.original_language;
//         var releasedate = data.release_date;

//         // console.log(movie_list);









//         // function sendData() {
//         //     $.ajax({
//         //         url: `https://api.themoviedb.org/3/list/${movie_id}?api_key=ffc4e23618d62c1f9b865e732e5ecfcf&language=en-US`,
//         //         success: sendData(),
//         //         dataType: 'json',
//         //     });
//         // }

//     }

// });
// var data1 = {
//     "name": "Luca",
//     "iso_639_1": "en"



// }


var settings = {
    "async": true,
    "crossDomain": true,
    "url": "https://api.themoviedb.org/4/list?api_key=ffc4e23618d62c1f9b865e732e5ecfcf",
    "method": "POST",
    "headers": {
        "authorization": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJmZmM0ZTIzNjE4ZDYyYzFmOWI4NjVlNzMyZTVlY2ZjZiIsImp0aSI6IjMyMDAzMDYiLCJzY29wZXMiOlsiYXBpX3JlYWQiLCJhcGlfd3JpdGUiXSwic3ViIjoiNjBkNDExODI5MjRjZTYwMDdmOGUwOGNmIiwidmVyc2lvbiI6MSwibmJmIjoxNjI0NjE2ODgxfQ.jMWW70VUlsEnaOSO2VBbhqSa4g7Y5PdUk5sq7vJ5n4s",
        "content-type": "application/json;charset=utf-8"
    },
    "processData": false,
    "data": "{\"name\":\"My Cool List\",\"iso_639_1\":\"en\"}"
}

$.ajax(settings).done(function(response) {
    console.log(response);
});


</script>