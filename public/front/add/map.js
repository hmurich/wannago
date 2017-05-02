if (jQuery("#map").length > 0){
    var myMap;
    ymaps.ready(init);

    function init()
    {
        lng = jQuery("#map").data('lng');
        lat = jQuery("#map").data('lat');

        console.log(lng);
        console.log(lat);

        myMap = new ymaps.Map("map",{
            center: [lng, lat],
            zoom: 12,
            behaviors: ["default", "scrollZoom"]
        },
        {
            balloonMaxWidth: 300
        });



        myPlacemark = new ymaps.Placemark([lng, lat]);
        myMap.geoObjects.add(myPlacemark);


        myMap.controls.add("zoomControl");
        myMap.controls.add("mapTools");
        myMap.controls.add("typeSelector");
    }
}
