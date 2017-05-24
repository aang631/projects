/*global $ , google*/

(function () {
    "use strict";

    var searchInput = $('#seachInput'),
        searchButton = $('#searchButton'),
        searchResultsDisplay = $('#searchResultsDisplay ul'),
        coordinates = [],
        fetchedResults = [],
        markers = [],
        searchResultBounds = new google.maps.LatLngBounds(),
        theMap = new google.maps.Map(
            document.getElementById('mapSide'), {
                zoom: 2,
                center: {
                    lat: 0,
                    lng: 0
                },
                mapTypeId: google.maps.MapTypeId.SATELLITE
            }
        ),
        infoWindow = new google.maps.InfoWindow({
            maxWidth: 500
        });

    searchButton.click(function () {
        coordinates = [];
        //searchResultsDisplay.empty();
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
                        info = searchResults.summary,
                        wikipediaLink = "<a href='https://" + searchResults.wikipediaUrl + "' target='_blank'>Wikipedia",
                        marker = new google.maps.Marker({
                            position: currentLocation,
                            map: theMap,
                            icon: currentThumbnail ? { //ternary operator for next 3 lines to remove error from console when there is no url for icon
                                url: currentThumbnail,
                                scaledSize: new google.maps.Size(64, 32)
                            } : null
                        });
                    markers.push(marker);
                    searchResultBounds.extend(currentLocation);

                    marker.addListener('click', function () {
                        theMap.panTo(currentLocation);
                        infoWindow.setContent(info + "<br>" + wikipediaLink);
                        infoWindow.open(theMap, marker);
                        theMap.setZoom(15);
                    });
                    fetchedResults.push(searchResults);
                    $("<br><li><img class='thumbnail' src='" + (currentThumbnail || "defaultMarker.png") + "'> " + currentTitle + "</li>")
                        .appendTo(searchResultsDisplay)
                        .click(function () {
                            theMap.panTo(currentLocation);
                            infoWindow.setContent((info || "No info found <br>") + wikipediaLink);
                            infoWindow.open(theMap, marker);
                            theMap.setZoom(15);
                        });
                });
                theMap.fitBounds(searchResultBounds);
            }
        });
    });
    $('#clear').click(function () {
        markers.forEach(function (marker) {
            marker.setMap(null);
        });
        markers = [];

        searchResultsDisplay.empty();
    });
}());