
$(document).ready(function(){
    $('.blog__listnews-list').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        prevArrow:"<button type='button' class='slick-prev arrows pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
        nextArrow:"<button type='button' class='slick-next arrows pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
        responsive: [
            {
              breakpoint: 1025,
              settings: {
                slidesToShow: 2,
              }
            },
            {
              breakpoint: 769,
              settings: {
                slidesToShow: 1,
                centerMode: true,
                centerPadding: '22px',
              }
            },
        ]
    });
  });


  function contentSwitcher(settings) {
    var settings = {
      contentClass: '.content',
      navigationId: '#blog__listpost-nav'
    };
    $(settings.contentClass).not(':first').hide();
    $(settings.navigationId).find('li:first').addClass('active');
    $(settings.navigationId).find('a').click(function(e) {
  
      var contentToShow = $(this).attr('href');
      contentToShow = $(contentToShow);
      e.preventDefault();
      $(settings.navigationId).find('li').removeClass('active');
      $(this).parent('li').addClass('active');
      $(settings.contentClass).hide();
      contentToShow.show();
    });
  }
  contentSwitcher();


  function sv(elem) {
    // get all 'a' elements
    var a = document.getElementsByTagName('li');
    // loop through all 'a' elements
    for (i = 0; i < a.length; i++) {
        // Remove the class 'active' if it exists
        a[i].classList.remove('active')
    }
    // add 'active' classs to the element that was clicked
    elem.classList.add('active');
}

