// ..................Google maps functions..............................
var map, infoWindow;

/**
 * Google map initialization
 * @author Adam Nielski
 * @copyright Future-Soft Sp. z o.o.
 */
function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 8,
        draggableCursor: 'default'
    });
    infoWindow = new google.maps.InfoWindow;

    map.addListener('click', function (e) {
        selectPointOnMapEvent(e.latLng, map);
    });

    $j.cookie.json = true;
    if ($j.cookie("pos")) {
        pos = $j.cookie("pos");
                infoWindow.setPosition(pos);
                infoWindow.setContent('Location found.');
                infoWindow.open(map);
                map.setCenter(pos);
    } else {
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                $j.cookie("pos", pos, {expires: 10});

                infoWindow.setPosition(pos);
                infoWindow.setContent('Location found.');
                infoWindow.open(map);
                map.setCenter(pos);
            }, function () {
                handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }
    }
}

/**
 * if error, we get location data from the service provider's IP.
 * @param browserHasGeolocation
 * @param infoWindow
 * @param pos
 * @author Adam Nielski
 * @copyright Future-Soft Sp. z o.o.
 */
function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    $j.get("http://ip-api.com/json", function (response) {
        var pos = {
            lat: response.lat,
            lng: response.lon
        };
        infoWindow.setPosition(pos);
        infoWindow.setContent('Location found.');
        infoWindow.open(map);
        map.setCenter(pos);
    }, "jsonp");
    // infoWindow.setPosition(pos);
    // infoWindow.setContent(browserHasGeolocation ?
    //     'Error: The Geolocation service failed.' :
    //     'Error: Your browser doesn\'t support geolocation.');
    // infoWindow.open(map);
}

/**
 * Saving a point to the server's endpoint
 * @param resp
 * @author Adam Nielski
 * @copyright Future-Soft Sp. z o.o.
 */
function save( resp ) {
    setVisible('#loading', true);
    $j.ajax({
        url: "/save",
        type: "POST",
        data: JSON.stringify({
            "lng": resp.coord.lon,
            "lat": resp.coord.lat,
            "city": resp.name,
            "dt": resp.dt,
            "temp": resp.main.temp,
            "clouds": resp.clouds.all,
            "wind": resp.wind.speed,
            "description": resp.weather[0].description,
            "timezone": resp.timezone
        }),
        contentType: "application/json; charset=utf-8"
    })
    .fail((jqXHR, textStatus) => {
        $("#alert_tmpl").tmpl({style: "alert-danger", title: textStatus}).appendTo('div#flash');
    })
     .done((res) => {
            $("div#box").html("");
            resp.message = "Selected town: "
            $("#box_tmpl").tmpl(resp).appendTo('div#box');
     })
    .always(() => {
        setVisible('#loading', false);
    })
}