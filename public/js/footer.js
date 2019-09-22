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
        url: "https://ipapi.co/city",
        type: "GET",
        async: "true",
    });        
}

function getWeather(city) {
    var result = false;
    if (city) {
        var userCity = $(".city").attr('title');
        if(typeof userCity === "undefined") {
            userCity = city;
            $(".city").html(city);
        }
        var apiURI = "https://api.openweathermap.org/data/2.5/weather?q=" + userCity + "&appid=5b58aee62c41eb64fcab16edce2e5cc1";
        result = $.ajax({
            url: apiURI,
            dataType: "jsonp",
            type: "GET",
            async: "true",
        }).done(dataHandler);
    }
    return result;
}

function dataHandler(data) {
    if(data) {
        var temp = data.main.temp - 273.15;
        $("#temp").html(temp.toFixed(0) + "&deg;C");
        var imgURL = "https://openweathermap.org/img/w/" + data.weather[0].icon + ".png";
        $("#weatherImg").attr("src", imgURL);
    }
}
