(function ($) {
    'use strict';
    /*============================================
    	FAQ
     ==============================================*/
     var $faq_categories = $("#faq-categories a");
     console.log($faq_categories);
     $faq_categories.on('click', function (event) {
        event.preventDefault();
        $('html, body').animate({
            scrollTop: $($.attr(this, 'href')).offset().top
        }, 500);
        $faq_categories.removeClass('active');
        $(this).addClass('active');
    });

})(jQuery);