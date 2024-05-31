(function($) {
    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction('frontend/element_ready/google_maps.default', function() {
            if (typeof google === 'object' && typeof google.maps === 'object') {
                initMap();
            }
        });
    });
})(jQuery);
