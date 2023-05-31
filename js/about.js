(function ($) {
    $(document).ready(function () {
        $(document).on('click', 'galleryImage', function() {
            var value = $(this).val($this).attr('target');
            alert(value);
            expandImg.src = imgs.src;
            expandImg.parentElement.style.display = "block";
        });
    });
})(jQuery);
