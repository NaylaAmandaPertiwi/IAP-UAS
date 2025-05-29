
$('#search-button').on('click', function () {
    const query = $('#search-input').val().trim();
    if (!query) return;

    $('#movie-list').empty();

    $.ajax({
        url: 'http://www.omdbapi.com',
        type:'get',
        dataType: 'json',
        data: {
            apikey: '575b7ddf',
            s: query
        },
        success: function (result) {
            if (result.Response === "True") {
                $.each(result.Search, function (i, movie) {
                    $('#movie-list').append(`
                        <div class="col-md-4 mb-3">
                            <div class="card h-100">
                                <img src="${movie.Poster !== "N/A" ? movie.Poster : 'https://via.placeholder.com/300x445?text=No+Image'}"
                                     class="card-img-top" alt="${movie.Title}">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">${movie.Title}</h5>
                                    <h6 class="text-muted mb-2">${movie.Year}</h6>
                                    <a href="https://www.imdb.com/title/${movie.imdbID}/" 
                                       target="_blank" 
                                       class="mt-auto d-block text-primary">
                                       See Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    `)
                });

            } else {
                $('#movie-list').html(`
                    <div class="col">
                        <h1 class="text-center">${result.Error}</h1>
                    </div>    
                `)
            }
        },
    });

});


$('#search-input').on ('keypress', function (e) {
    if (e.which === 13) {
        $('#search-button').click();
    }
});
