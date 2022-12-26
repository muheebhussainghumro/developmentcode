$(document).ready(function () {
  $(".header--middle-left").append(
    " <div class='header-button-wrapper'><a href='#' class='btn header-btn'>contact Us</a></div>"
  );

  $(".owl-carousel-blog").owlCarousel({
    loop: false,
    margin: 0,
    responsiveClass: true,
    dots: false,
    autoplay: false,
    responsive: {
      0: {
        items: 1,
        nav: true,
      },
      600: {
        items: 2,
        nav: true,
      },
      1000: {
        items: 3,
        nav: true,
      },
    },
  });

  $(".owl-carousel-testimonial").owlCarousel({
    loop: true,
    margin: 0,
    responsiveClass: true,
    nav: true,
    dots: false,
    autoplay: false,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 1,
      },
      1000: {
        items: 1,
      },
    },
  });
});
