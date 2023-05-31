(function ($) {

    // Open sell menu
    $(document).on('click', '.sell-aircraft', function () {
        var popup = document.getElementById('popup-form');
        popup.style.display = 'flex';
        $('#input_8_7').val('Selling Aircraft');
        $('#switchSelling').prop('checked', true);
    });
    // Open buy menu
    $(document).on('click', '.buy-aircraft', function () {
        var popup = document.getElementById('popup-form');
        popup.style.display = 'flex';
        $('#input_8_7').val('Buying Aircraft');
        $('#switchBuying').prop('checked', true);
    });
    // close popup
    $(document).on('click', '.close-form-popup', function () {
        var popup = document.getElementById('popup-form');
        popup.style.display = 'none';
    });
    const alertStatus = (e) => {
        if ($("#switchBuying").is(":checked")) {
            $('#input_8_7').val('Selling Aircraft');
        } else {
            $('#input_8_7').val('Buying Aircraft');
        }
    };
    $(document).on('click', '.switch-button', alertStatus)

})(jQuery);