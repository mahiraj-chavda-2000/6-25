<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,
			initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>
        MovieDB API
    </title>


    <style>
        img {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px;
            width: 200px;
            height: 150px;
        }

        ul.ba {
            list-style-type: none;
        }

        li {
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-size: x-large;
        }

        #titl {
            font-weight: bold;
        }

        #apiDiv {
            border: dashed 2px #CCC;
            padding: 10px;
            padding-left: 20px;


        }

        #apiDiv #message {
            padding-top: 10px;
            align-items: center;
        }

        p {
            font-size: xx-large;
            text-align: center;
        }
    </style>


</head>

<body>


    <div class="container">
 
        <div id="apiDiv">
            <div id="message">
            </div>
            <!-- <button class="btn btn-primary" onclick="loadData()">Load More</button> -->
        </div>

    </div>

    <div class="loading">
        <div class="ball"></div>
        <div class="ball"></div>
        <div class="ball"></div>
    </div>





    <script>
        var page = 0;
        getData();
       
        const container = document.getElementById('container');
        const loading = document.querySelector('.loading');

        window.addEventListener('scroll', () => {
            const { scrollTop, scrollHeight, clientHeight } = document.documentElement;

            console.log({ scrollTop, scrollHeight, clientHeight });

            if (clientHeight + scrollTop >= scrollHeight - 5) {
                showLoading();
            }
        });

        function showLoading() {
            loading.classList.add('show');
            // load more data
            setTimeout(getData, 100)
        }

       
       
        function getData() {
            page++;
            $.ajax({
                url: "https://api.themoviedb.org/3/discover/movie?api_key=ffc4e23618d62c1f9b865e732e5ecfcf&language=en-US&sort_by=popularity.desc&include_adult=false&include_video=false&page=" + page,
                dataType: "JSON",
                success: function (results) {
                    var data = results.results;
                    var resultHtml = $("<div><p>Movies</p>");
                    for (let index = 0; index < data.length; index++) {

                        var image = "https://image.tmdb.org/t/p/original" + data[index].poster_path;
                        var title = data[index].original_title;
                        var desc = data[index].overview;
                        var popularity = data[index].popularity;
                        var language = data[index].original_language;
                        var id = data[index].id;

                        resultHtml.append("<div>" + "<p id=\"titl\"> <a href=\"favourite.php?id=" + id + "\" >" + "Favourite" + "</a></p>" +"<p id=\"titl\"> <a href=\"recive.php?id=" + id + "\" >" + "Add To Favourite" + "</a></p>" + "<ul class=\"ba\">" +  "<li><img src=\"" + image + "\" /></a><li>"  + "<li id=\"titl\">    <a href=\"info.php?id=" + id + "\" >" + title + "</a></li>" + "<li> Language : " + language + "</li>" + "<li> Overview : " + desc + "</li>" + "<li> popularity : " + popularity + "</li></ul></div>")
                        // console.log(image);
                    }
                    resultHtml.append("</div>");
                    $("#message").html(resultHtml);
                    loading.classList.remove('show');
                    // console.log(data);
                }
            });
        }

        // function postData(){
        //     const xhr = new XMLHttpRequest();
        //     xhr.open("POST","recieve.php");
        //     // xhr.send(); 
        // }

    </script>


</body>

</html>