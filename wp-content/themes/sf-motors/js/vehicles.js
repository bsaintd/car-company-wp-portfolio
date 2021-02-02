/*--------------------------*/
/*     Vehicles Page JS     */
/*--------------------------*/
var VEHICLES_REPSONSIVE = 770;
/*-----------------------------------*/
/*  fullPage.js Navigational Hooks   */
/*-----------------------------------*/
function afterResponsive(isResponsive) {
  var that = sokonFullpage;
  that.responsiveCalls++;
  if (isResponsive) {
    $('.vehicle-gallery.dsktp-only').appendTo('#hidden-elements');
    $('#mobile-gallery-sf7').insertAfter('#vehicles-sf7');
    $('#mobile-gallery-sf5').insertAfter('#vehicles-sf5');
    $('.vehicle-gallery.mobile-only').addClass('fp-section');
  } else {
    that.allowDestroy = true;
    $('.vehicle-gallery.mobile-only').appendTo('#hidden-elements');
    $('#gallery-sf7').insertAfter('#vehicles-sf7');
    $('#gallery-sf5').insertAfter('#vehicles-sf5');
  }
}

//image gallery for vehicles with sidebar thumbnails functionality
// SF7 Gallery
$('.sf7SelectImage').on('click', function() {
  var selectedImage = $(this).css('background-image');
  $('.sf7ExpandImage').css('background-image', selectedImage);
});
// SF5 Gallery
$('.sf5SelectImage').on('click', function() {
  var selectedImage = $(this).css('background-image');
  $('.sf5ExpandImage').css('background-image', selectedImage);
});

/*------------------------*/
/* Page Intro Animations  */
/*------------------------*/
function vehiclesIntro() {
  TweenMax.from($('#vehicles-hero'), 1.5, {
    delay: 0.6,
    scale: 1.2,
    alpha: 0,
    ease: Power4.easeOut
  });
  TweenMax.from($('#vehicles-title'), 1.5, {
    delay: 1,
    y: 150,
    alpha: 0,
    ease: Power4.easeOut
  });
  TweenMax.from($('#video-player-text'), 1, {
    delay: 2,
    x: -250,
    alpha: 0,
    ease: Power4.easeOut
  });
  TweenMax.from($('#video-player-btn'), 0.5, {
    delay: 2.2,
    alpha: 0,
    ease: Power4.easeOut
  });
}



function handleHashVariations() {
  switch (location.hash) {
    case '#sf5':
      sokonFullpage.instance.moveTo(4);
      break;
    case '#sf7':
      sokonFullpage.instance.moveTo(2);
      break;
  }
  location.hash = '';
}

// initialize the first gallery image
// SF7 Gallery
var selectedImage = $('.sf7SelectImage:nth-child(2)').css('background-image');
$('.sf7ExpandImage').css('background-image', selectedImage);

// SF5 Gallery
selectedImage = $('.sf5SelectImage:nth-child(3)').css('background-image');
$('.sf5ExpandImage').css('background-image', selectedImage);

function checkResponsive(){
  return $(window).width() < VEHICLES_REPSONSIVE;
}
var initialResponsiveState = checkResponsive();

$(window).resize(function() {
  if (initialResponsiveState !== checkResponsive()) {
    location.reload();
  }
});

afterResponsive(initialResponsiveState);
//sokonFullpage.setNoScroll();
sokonFullpage.setOptions({
  responsiveWidth: VEHICLES_REPSONSIVE
});
sokonFullpage.start();

window.addEventListener('hashchange', handleHashVariations, false);
handleHashVariations();

$(window).load(vehiclesIntro);

// Gallery thumbnail scroll buttons not currently in use
// $('.scroll-button.up').click(function () {
//   $('.draggable-wrapper').scrollTop($('.draggable-wrapper').scrollTop() - $('.draggable-wrapper .gal-image').first().height());
// });

// $('.scroll-button.down').click(function () {
//   $('.draggable-wrapper').scrollTop($('.draggable-wrapper').scrollTop() + $('.draggable-wrapper .gal-image').first().height());
// });

