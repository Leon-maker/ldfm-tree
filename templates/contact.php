<?php
/**
 * Template Name: Template Contact Page
 */
$title_page = get_the_title(); ?> 

<?php 
$img_bkg = wp_get_attachment_image_src(21533, 'full')[0];
$title_page = 'Contactez-nous';
$ArianeTitle = "Contact";
$ArianeLink1 = get_the_permalink()  ;

echo do_shortcode('[shortcode-header-section img-bkg="' . $img_bkg . '" title="' . $title_page . '" link1="'. $ArianeLink1 .'" title1="'.$ArianeTitle.'"]'); 

$subtitle = "Envoyez nous un message";
$id_form = 1;

echo do_shortcode('[shortcode-map-section]'); 

echo do_shortcode('[shortcode-contact id_form="'.$id_form.'" subtitle="'.$subtitle.'"]');


get_footer();
$lat = floatval($mapp['lat']);
$lng = floatval($mapp['lng']);
?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC2p1nVSwcAVGXQYMEkC1cQwfL1kLcum3U&callback=Function.prototype"></script>
<script type="text/javascript">
(function( $ ) {

    function initMap( $el ) {

        // Find marker elements within map.
        var $markers = $el.find('.marker');

        // Create generic map.
        var mapArgs = {
            center: { lat: <?php echo $lat; ?>, lng: <?php echo $lng; ?> },
            zoom        : 14,
            disableDefaultUI: true,
            styles      : [
                {
                    "featureType": "administrative",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#444444"
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "all",
                    "stylers": [
                        {
                            "color": "#f2f2f2"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "all",
                    "stylers": [
                        {
                            "saturation": -100
                        },
                        {
                            "lightness": 45
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "simplified"
                        }
                    ]
                }
            ]
        };
        var map = new google.maps.Map( $el[0], mapArgs );

        // Add markers.
        map.markers = [];
        $markers.each(function(){
            initMarker( $(this), map );
        });

        // Center map based on markers.
        centerMap( map );

        // Return map instance.
        return map;
    }

    /**
     * initMarker
     *
     * Creates a marker for the given jQuery element and map.
     *
     * @date    22/10/19
     * @since   5.8.6
     *
     * @param   jQuery $el The jQuery element.
     * @param   object The map instance.
     * @return  object The marker instance.
     */
    function initMarker( $marker, map ) {

        // Get position from marker.
        var lat = $marker.data('lat');
        var lng = $marker.data('lng');
        var latLng = {
            lat: parseFloat( lat ),
            lng: parseFloat( lng )
        };

        // Create marker instance.
        var marker = new google.maps.Marker({
            position : latLng,
            map: map
        });

        // Append to reference for later use.
        map.markers.push( marker );

        // If marker contains HTML, add it to an infoWindow.
        if( $marker.html() ){

            // Create info window.
            var infowindow = new google.maps.InfoWindow({
                content: $marker.html()
            });

            // Show info window when marker is clicked.
            google.maps.event.addListener(marker, 'click', function() {
                infowindow.open( map, marker );
            });
        }
    }

    /**
     * centerMap
     *
     * Centers the map showing all markers in view.
     *
     * @date    22/10/19
     * @since   5.8.6
     *
     * @param   object The map instance.
     * @return  void
     */
    function centerMap( map ) {

        // Create map boundaries from all map markers.
        var bounds = new google.maps.LatLngBounds();
        map.markers.forEach(function( marker ){
            bounds.extend({
                lat: marker.position.lat(),
                lng: marker.position.lng()
            });
        });

        // Case: Single marker.
        if( map.markers.length === 1 ){
            map.setCenter( bounds.getCenter() );

        // Case: Multiple markers.
        } else {
            map.fitBounds( bounds );
        }
    }

    // Render maps on page load.
    $(document).ready(function(){
        $('.acf-map').each(function(){
            var map = initMap( $(this) );
        });
    });

})(jQuery);
</script>