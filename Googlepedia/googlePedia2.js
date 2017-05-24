/*global $ , google*/

(function () {
    "use strict";

    var searchInput = $('#seachInput'),
        searchButton = $('#searchButton'),
        searchResultsDisplay = $('#searchResultsDisplay ul'),
        coordinates = [],
        //   lat,
        //  lng,
        fetchedResults = [];

    searchButton.click(function () {
        coordinates = [];
        searchResultsDisplay.empty();
        var currentSearch = searchInput.val();
        $.getJSON('http://api.geonames.org/wikipediaSearch?q=' + currentSearch + '&maxRows=10&username=aang631&type=json&callback=?', function (data) {
            console.log(data);
            if (data.geonames.length < 1) {
                searchResultsDisplay.append("<h3>No results found</h3>").css("color", "red");
            } else {
                fetchedResults = [];
                searchResultsDisplay.css("color", "black");
                data.geonames.forEach(function (searchResults) {
                    fetchedResults.push(searchResults);
                    $("<br><li><img class='thumbnail' src='" + (searchResults.thumbnailImg || "defaultMarker.png") + "'> " + searchResults.title + "</li>")
                        .appendTo(searchResultsDisplay)
                        .click(function () {
                            // lat = searchResults.lat;
                            // lng = searchResults.lng;
                            var map = new google.maps.Map(
                                document.getElementById('mapSide'), {
                                    zoom: 100,
                                    center: {
                                        lat: searchResults.lat,
                                        lng: searchResults.lng
                                    },
                                    mapTypeId: google.maps.MapTypeId.SATELLITE
                                }
                            );
                        });
                        
                    /*coordinates.push({
                        "lat": searchResults.lat,
                        "lng": searchResults.lng
                    });*/
                });
                //console.log(coordinates);

                /*var map = new google.maps.Map(
                    document.getElementById('mapSide'), {
                        zoom: 100,
                        center: {
                            lat: parseInt(lat),
                            lng: parseInt(lng)
                        },
                        mapTypeId: google.maps.MapTypeId.SATELLITE
                    }
                );*/
            }
        });
    });

}());