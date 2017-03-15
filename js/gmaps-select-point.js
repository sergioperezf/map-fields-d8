Drupal.behaviors.loadMaps = {
    attach: function(context, settings) {
        function initMaps () {
            var elements = document.getElementsByClassName('gmaps_container');
            for (var i in elements){
                map = new google.maps.Map(elements[i], {
                    center: {lat: 0, lng: 0},
                    zoom: 4
                })
            }
        }

        initMaps();
    },
}