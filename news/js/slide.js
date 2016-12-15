$(document).ready(function() {
     $('[data-toggle="tooltip"]').tooltip(); 
$('#owl-example').owlCarousel(
    { 
     autoplay : true,
     loop:true,
     navigation : true, // Show next and prev buttons
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem:true,
        autoplayHoverPause: true,
      dots: false,
      navigationText:['&lt;','&gt;'],
    }
    );
$('#hai').owlCarousel(
    { 
     autoplay : true,
     loop:true,
    items:1,
    navigation : true,
    dots:false,
    navigationText:['&lt;','&gt;'],
    }
    );
$('#tincuhon').owlCarousel(
    { 
     autoplay : true,
     loop:true,
    items:3,
    navigation : true,
    dots:false,
    navigationText:['&lt;','&gt;'],
      
    }
    );
$('#slider').owlCarousel(
    { 
     autoplay : true,
     loop:true,
     navigation : true, // Show next and prev buttons
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem:true,
      dots: false,
     navigationText:['&lt;','&gt;'],
    }
    );
var owl_feature;
    owl_feature = $("");
    owl_feature.owlCarousel({
        autoplay : true,
        loop:true,

        margin:10,
        nav:true,
        dots: false,
        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
        responsiveClass:true,
        responsive:{
            320:{
                items:1,
            },
            390:{
                items:1,
            },
            600:{
                items:2,
            },
            800:{
                items:3,
            },
            1000:{
                items:4,
            }
        }
    });
    $("#back-top").hide();
  
  // fade in #back-top
  $(function () {
    $(window).scroll(function () {
      if ($(this).scrollTop() > 100) {
        $('#back-top').fadeIn();
      } else {
        $('#back-top').fadeOut();
      }
    });

    // scroll body to 0px on click
    $('#back-top a').click(function () {
      $('body,html').animate({
        scrollTop: 0
      }, 800);
      return false;
    });
  });

    });
