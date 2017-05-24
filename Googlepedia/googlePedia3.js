/*global $ , google*/

(function () {
    "use strict";

    var searchInput = $('#seachInput'),
        searchButton = $('#searchButton'),
        searchResultsDisplay = $('#searchResultsDisplay ul'),
        coordinates = [],
        fetchedResults = [],
        searchResultBounds = new google.maps.LatLngBounds(),
        // theMap = new google.maps.Map(
        //     document.getElementById('mapSide'), {
        //         zoom: 4,
        //         center: {
        //             lat: 0,
        //             lng: 0
        //         },
        //         mapTypeId: google.maps.MapTypeId.SATELLITE
        //     }
        // ),
         infoWindow = new google.maps.InfoWindow({
                maxWidth:300
            });

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
                    var currentThumbnail = searchResults.thumbnailImg,
                        currentTitle = searchResults.title,
                        currentLocation = {
                            "lat": searchResults.lat,
                            "lng": searchResults.lng
                        },
                        marker = new google.maps.Marker({
                            position: currentLocation,
                            map: theMap,
                            icon: {
                                url: currentThumbnail,
                                scaledSize: new google.maps.Size(64, 32)
                            }
                        });
                    searchResultBounds.extend(currentLocation);

                    marker.addListener('click', function () {
                        theMap.panTo(currentLocation);
                        infoWindow.setContent(searchResults.summary);
                        infoWindow.open(theMap,marker);
                    });
                    fetchedResults.push(searchResults);
                    $("<br><li><img class='thumbnail' src='" + (currentThumbnail || "defaultMarker.png") + "'> " + currentTitle + "</li>")
                        .appendTo(searchResultsDisplay)
                        .click(function () {
                            theMap.panTo(currentLocation);
                            theMap.zoom(30);
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
                theMap.fitBounds(searchResultBounds);
            }
        });
    });

}());