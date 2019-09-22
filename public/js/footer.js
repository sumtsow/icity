$(document).ready(function() {

    setInterval( function() {
        // Create Date object newDate()
        currentDate = new Date();
        // get hours
        var hours = currentDate.getHours();
        // and minutes
        var minutes = currentDate.getMinutes();        
        // Add 0 if one digit
        $("#hours").html(( hours < 10 ? "0" : "" ) + hours);
        $("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
    }, 1000);
    getLocation().done(getWeather);
});

function getLocation() {
    return $.ajax({
        url: "https://ipapi.co/jsonp/",
        dataType: "jsonp",
        type: "GET",
        async: "true",
    });
}

function getWeather(locdata) {
    var lat = locdata.latitude;
    var lon = locdata.longitude;
    var apiURI = "https://api.openweathermap.org/data/2.5/weather?lat=" + lat + "&lon=" + lon + "&appid=5b58aee62c41eb64fcab16edce2e5cc1";
    if (locdata){
        $("#city").html(locdata.city);
    }
    return answer = $.ajax({
      url: apiURI,
      dataType: "jsonp",
      type: "GET",
      async: "true",
    }).done(dataHandler);
}

function dataHandler(data) {
    var temp = data.main.temp - 273.15;
    $("#temp").html(temp.toFixed(0) + "&deg;C");
    var imgURL = "https://openweathermap.org/img/w/" + data.weather[0].icon + ".png";
    $("#weatherImg").attr("src", imgURL);
}
