jQuery(document).ready(function () {
  jQuery(".owl-carousel-blog").owlCarousel({
    loop: true,
    margin: 35,
    responsiveClass: true,
    nav: true,
    dots: true,
    autoplay: false,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 2,
      },
      1000: {
        items: 3,
      },
    },
  });
});
