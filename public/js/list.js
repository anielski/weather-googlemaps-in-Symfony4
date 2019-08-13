/**
 * Load weather
 * @param lat
 * @param Lng
 * @param appid
 * @param succesfn - fire function when success
 * @author Adam Nielski
 * @copyright Future-Soft Sp. z o.o.
 */
function loadWeather(lat, lng, appid, succesfn) {
    $j.ajax({
        url: "https://api.openweathermap.org/data/2.5/weather",
        data: {
            "lat": lat,
            "lon": lng,
            "appid": appid

        },
        cache: false,
        type: "GET",
        success: function (response) {
            succesfn( response )
        },
        error: function (xhr) {

        }
    });
}