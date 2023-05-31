(function ($) {
    $(document).ready(function () {
        var ppp = 12;
        $.post(
            ajaxurl,
            {
                'action': 'get_projects',
                'projectType': 'aircraft',
                'ppp': ppp
            },
            function (response) {
                $data = $.parseJSON(response);
                $('.projects-container').delay(700).html($data[0]);
                $('.projects-types').html($data[1]);
                $('.projects-container').append($data[2]);
                $('.spinner').addClass('hide');
            }
        );
        $(document).on('click', ".project-type", function () {
            $('.projects-types').find('.type-active').removeClass('type-active');
            $(this).addClass('type-active');
            var projectType = $(this).data("projectType");
            $('.spinner').removeClass('hide');
            $.post(
                ajaxurl,
                {
                    'action': 'get_projects',
                    'projectType': $(this).data("projectType"),
                    'ppp': ppp
                },
                function (response) {
                    $data = $.parseJSON(response);
                    $('.projects-container').delay(700).html($data[0]);
                    $('.projects-container').append($data[2]);
                    $('.spinner').addClass('hide');
                }
            );
        });
        $(document).on('keyup', ".search-project", function () {
            var search = document.getElementById('search-project');
            $('.spinner').removeClass('hide');
            $.post(
                ajaxurl,
                {
                    'action': 'get_projects',
                    'projectType': $(this).data("projectType"),
                    'ppp': ppp,
                    'value': search.value
                },
                function (response) {
                    $data = $.parseJSON(response);
                    $('.projects-container').delay(700).html($data[0]);
                    $('.projects-container').append($data[2]);
                    $('.spinner').addClass('hide');
                }
            );
        });
        $(document).on('click', "#load-more", function () {
            $("#more-posts").attr("disabled", true);
            $('.spinner').removeClass('hide');
            var ppp = -1;
            $.post(
                ajaxurl,
                {
                    'action': 'get_projects',
                    'projectType': $(this).data("projectType"),
                    'ppp': ppp
                },
                function (response) {
                    // Remove Load More
                    $('#load-more').remove();

                    // parse response
                    $data = $.parseJSON(response);

                    // Rebuild items
                    $('.projects-container').html($data[0]);

                    // hide spinner
                    $('.spinner').addClass('hide');

                    $("#more-posts").attr("disabled", false);
                }

            )
        });
        $(document).on('click', ".project-card", function () {
            $.post(
                ajaxurl,
                {
                    'action': 'get_projects',
                    'single': $(this).data("projectType")
                },
                function (response) {
                    $data = $.parseJSON(response);

                    $('.project-info').html($data[0]);

                    $('.aircraft-popup').removeClass('hide');

                }
            )
        });
        $(document).on('click', '.close-pop', function () {
            $('.aircraft-popup').addClass('hide');
        })
        $(document).on('click', '.spec-tab', function () {
            // Get clicked tabs value
            var select = $(this).data('projectType');

            // remove active from all listed items
            var tabs = document.getElementsByClassName('spec-tab');
            for (var i = 0; i < tabs.length; i++) {
                tabs[i].classList.remove('active');
            }
            $(this).addClass('active');

            // hide all spec tabs
            var elements = document.getElementsByClassName('spec');
            for (var i = 0; i < elements.length; i++) {
                elements[i].classList.remove('show');
            }
            // show spec
            var activeTab = document.getElementById(select);
            activeTab.classList.add('show');
        })
        // Outside clicks
        $(document).on("click", function (event) {
            if (!$(event.target).closest('.aircraft-popup').length && !$(event.target).is('aircraft-popup')) {
                $('.aircraft-popup').addClass('hide');
            }
        })
    });
})(jQuery);

