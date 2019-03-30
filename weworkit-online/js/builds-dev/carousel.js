$(document).on('ready', function() {

    $('.slick-carousel').slick({
            centerMode: true,
            slidesToShow: 3,
            variableWidth: true,
            centerPadding: '60px',
            responsive: [
              {
                breakpoint: 768,
                settings: {
                  arrows: false,
                  centerMode: true,
                  slidesToShow: 3
                }
              },
              {
                breakpoint: 480,
                settings: {
                  arrows: false,
                  centerMode: true,
                  slidesToShow: 1
                }
              }
            ]

    }); // $('.slick-carousel')

}); // (function)