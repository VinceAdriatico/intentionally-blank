(function($){
    $(document).ready(function() {

        // Default
        $.post(
            ajaxurl,
            {
                'action' : 'get_reps', 
                'projectType' : 'default'
            },
            function( response ) {
                $data=$.parseJSON(response);

                // Add response to container
                $('.rep-container').delay(1000).html($data[0]);

                // Hide spinner
                $('.spinner').addClass('hide');
            }
        );

        // Search
        $(document).on('keyup', '.search-input', function() {

            var search = document.getElementById('search-input');

            // show spinner
            $('.spinner').removeClass('hide');
            $.post(
                ajaxurl,
                {
                    'action': 'get_reps', 
                    'projectType': 'search-project',
                    'value': search.value
                },
                function( response ) {
                    $data=$.parseJSON(response);
                    $('.rep-container').delay(1000).html($data[0]);

                    // hide spinner
                    $('.spinner').addClass('hide');
                }
            )
        });
        // Map Clicks
        $(document).on('click', '.map-feature', function() {
            var connect = $(this).data('connect');

            // Disable active maps
            var maps = document.getElementsByClassName('map-feature'); 
            for(var i = 0; i < maps.length; i++) {
                // Remove highlight from all
                maps[i].classList.remove('highlight'); 
                // add fade to all
                maps[i].classList.add('fade');
            }

            // Add highlight
            $(this).addClass('highlight');

            // Disable active tab
            var tabs = document.getElementsByClassName('rep-type');
            for(var i = 0; i < tabs.length; i++){
                tabs[i].classList.remove('active-rep');

                // Add active tab
                if(tabs[i].classList.contains(connect)) {
                    tabs[i].classList.add('active-rep');
                }
            }

            

            // show loading spinner
            $('.spinner').removeClass('hide');

            $.post(
                ajaxurl,
                {
                    'action': 'get_reps', 
                    'projectType': $(this).data('projectType')
                },
                function( response ) {
                    $data=$.parseJSON(response);

                    // add response to container
                    $('.rep-container').delay(1000).html($data[0]);

                    $('.spinner').addClass('hide');
                }
            )            
        });
        // Tabbed
        $(document).on('click', '.rep-type', function() {


            // Disable active tab
            var tabs = document.getElementsByClassName('rep-type');
            for(var i = 0; i < tabs.length; i++){
                tabs[i].classList.remove('active-rep');

            }
            // add active 
            $(this).addClass('active-rep');

            // get project type value
            var projectType = $(this).data('projectType');

            // remove map active and add fade
            var maps = document.getElementsByClassName('map-feature');
            for(var i = 0; i < maps.length; i++){
                if( ! maps[i].classList.contains( projectType ) ) {

                    // remove highlighted maps
                    maps[i].classList.remove('highlight');

                    // add fade to maps
                    maps[i].classList.add('fade');
                }
            }

            // add highlight
            var mapHigh = document.getElementById(projectType);
            mapHigh.classList.add('highlight');

            // show loading spinner
            $('.spinner').removeClass('hide');

            $.post(
                ajaxurl,
                {
                    'action': 'get_reps', 
                    'projectType': $(this).data('projectType')
                },
                function( response ) {
                    $data=$.parseJSON(response);

                    // add response to container
                    $('.rep-container').delay(1000).html($data[0]);

                    $('.spinner').addClass('hide');
                }
            )
        });
    });
})(jQuery);