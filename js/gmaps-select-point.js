/**
 * Behavior for gmaps widget
 *
 * @type {{attach: Drupal.behaviors.loadMaps.attach}}
 */
Drupal.behaviors.loadMaps = {
    attach: function(context, settings) {

        /**
         * Initializes all the maps in the page.
         */
        function initMaps () {
            var elements = document.getElementsByClassName('gmaps-wrapper');
            for (var i in elements) {
                Map(elements[i]);
            }
        }

        /**
         * Map module
         *
         * @param wrapper
         * @constructor
         */
        function Map (wrapper) {
            var container = wrapper.getElementsByClassName('gmaps-container')[0];
            var latField = wrapper.getElementsByClassName('gmaps-select-point-widget-lat')[0];
            var lngField = wrapper.getElementsByClassName('gmaps-select-point-widget-lng')[0];
            var latInitialValue = latField.value;
            var lngInitialValue = lngField.value;

            var theMap = new google.maps.Map(container, {
                center: {lat: 0, lng: 0},
                zoom: 4
            });

            var marker = new google.maps.Marker({
                map: null
            });

            if (latInitialValue && lngInitialValue) {
                marker.setPosition({
                    lat: parseFloat(latInitialValue),
                    lng: parseFloat(lngInitialValue)
                });
                marker.setMap(theMap);
            }

            theMap.addListener('click', function (event) {
                updateMarkerPos(event.latLng);
                setCoordinates(event.latLng);
            });


            /**
             * Adds a marker to a map.
             *
             * @param map
             * @param latLng
             * @param markerProps
             * @returns {google.maps.Marker}
             */
            function updateMarkerPos (latLng) {
                var position =  {lat: latLng.lat(), lng: latLng.lng()};
                marker.setPosition(position);
                marker.setMap(theMap);
            }

            function setCoordinates(latLng) {
                latField.value = latLng.lat();
                lngField.value = latLng.lng();
            }
        }

        initMaps();
    }
};