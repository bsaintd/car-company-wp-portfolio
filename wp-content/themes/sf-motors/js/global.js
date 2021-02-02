/*----------------*/
/*   Global JS    */
/*----------------*/

/* Polyfills */
// For object.assign (effects older safari browser on IOS)
if (!Object.assign) {
    Object.defineProperty(Object, 'assign', {
        enumerable: false,
        configurable: true,
        writable: true,
        value: function (target, firstSource) {
            'use strict';
            if (target === undefined || target === null) {
                throw new TypeError('Cannot convert first argument to object');
            }

            var to = Object(target);
            for (var i = 1; i < arguments.length; i++) {
                var nextSource = arguments[i];
                if (nextSource === undefined || nextSource === null) {
                    continue;
                }

                var keysArray = Object.keys(Object(nextSource));
                for (var nextIndex = 0, len = keysArray.length; nextIndex < len; nextIndex++) {
                    var nextKey = keysArray[nextIndex];
                    var desc = Object.getOwnPropertyDescriptor(nextSource, nextKey);
                    if (desc !== undefined && desc.enumerable) {
                        to[nextKey] = nextSource[nextKey];
                    }
                }
            }
            return to;
        }
    });
}

/* Init */
var $body = $('body'),
    $fullpage = $('#fullpage'),
    $toggleCheck = $('.toggle-check'),
    $dropDownNav = $('.dropdown-nav'),
    $navbar = $('#site-navigation'),
    $navbarLink = $('#site-navigation .nav-link'),
    $navHr = $("#nav-hr"),
    $navLogo = $("#navLogo"),
    $navMachine = $(".menu-main-navbar-menu-container .nav-item:nth-child(6)"),
    $globalSideNav = $('#global-sidenav'),
    $navToggle = $("#navbar-toggler"),
    $vehicleSubnav = $('#vehicles-subnav'),

    // clicktracking
    $emailSignup  = $('#email-signup');

/* -- Show #fullpage element when loading is complete -- */
function showFullpageElement(){
    $("#fullpage").css('opacity', '1');
}

/* --- BEGIN NAV --- */
/*-------------------*/

var $navbarLinks = [];

$('li.nav-item a').each(function(i, val) {
    $navbarLinks.push($(val));
})

function darkPageNav() {
    $navbar.removeClass('inverted');
    $globalSideNav.removeClass('dark');
}

function lightPageNav() {
    $navbar.addClass('inverted');
    if(!$globalSideNav.hasClass('dark'))
        $globalSideNav.addClass('dark');
}

// Hamburger Menu
$toggleCheck.click(function() {
    $dropDownNav.toggleClass('expand');
    $fullpage.toggleClass('nav-blur');

    if(sokonFullpage.isResponsive){
        $body.toggleClass('freeze');

    } else{
        $body.removeClass('freeze');
    }
});

// declare variables for animation of targeted HTML element IDs
$navMachine.hover(machinesShowHandler, machinesCloseHandler);

function machinesShowHandler() {
    if ($vehicleSubnav.hasClass('hidden'))
        $vehicleSubnav.removeClass('hidden');
}

function machinesCloseHandler() {
    setTimeout(function() { $vehicleSubnav.addClass('hidden') }, 3000);
}

function whenReadyMakeNavLight(light) {
    (light) ? lightPageNav() : darkPageNav() ;
}

function highlightSideNavLink(index) {
    $("#global-sidenav li").removeClass('is-active');
    $("#global-sidenav li:eq(" + (index-1) + ")").addClass('is-active');
}

function fitNavColor() {
    var navIsInverted = $navbar.hasClass('inverted'),
        slideIsLight = $('.fp-section.active').hasClass('light');

    if (slideIsLight && !navIsInverted)
        lightPageNav();
    else if (!slideIsLight && navIsInverted)
        darkPageNav();
}

function topNavIntro() { // order: mfg, vehicles, tech, company
  var navTL = new TimelineMax();
  var linkTL = new TimelineMax();

  linkTL.from($navbarLinks[3], .2, {
    delay: .5,
    alpha: 0,
    ease: Power2.easeOut,
  });
  linkTL.from($navbarLinks[2], .2, {
    delay: .1,
    alpha: 0,
    ease: Power2.easeOut,
  });
  linkTL.from($navbarLinks[1], .2, {
    delay: .1,
    alpha: 0,
    ease: Power2.easeOut,
  });
  linkTL.from($navbarLinks[0], .2, {
    delay: .1,
    alpha: 0,
    ease: Power2.easeOut,
  });
  navTL.add([
    TweenMax.from($navHr, 1.3, {
        delay: 0.3,
        scaleX: 0,
        ease: Power1.easeOut,
    }),
    TweenMax.from($navLogo, .8, {
        delay: 0.6,
        y:-100,
        alpha: 0,
        ease: Power2.easeOut,
    }),
    TweenMax.from($navToggle, .2, {
        delay: 1.2,
        alpha: 0,
        x: 100,
        ease: Power2.easeOut,
    }),
    linkTL
  ]);
}

function loadSideNav(){
    $('#global-sidenav a[href^="#"]').on('click',function (e) {
      e.preventDefault();
      sokonFullpage.instance.moveTo($(this).parent().index()+1);
   });
}

loadSideNav();

$navbarLink.map(function(){
    if($(this).attr('href') === window.location.pathname.toString())
    $(this).addClass('active');
});

/*-----END NAV ------*/

/*---Video Controls---*/

var $showVideo=$('#video-player-btn'),
    $exitBtn = $('#video-player-panel .exit-btn'),
    $playVideo = $('#video-player-panel .play-btn'),
    $videoContainer = $('#video-player-panel video'),
    $videoWrapper = $('#video-player-panel');

function globalHandleShowVideo(){
    if ($videoContainer.get(0)){
        $videoContainer.get(0).play();
    }
    $videoWrapper.addClass('active');
    if(!$navbar.hasClass('hidden'))
        $navbar.addClass('hidden');
}

function globalHandleExitVideo(){
    $videoWrapper.removeClass('active');
    if ($videoContainer.get(0))
        $videoContainer.get(0).pause();
    if ($videoWrapper.hasClass('active')) {
        $videoWrapper.removeClass('active');
    }
    $navbar.removeClass('hidden');
}

function globalHandlePlayVideo(){
    if($videoContainer.get(0).readyState === 4 ){
        $videoContainer.get(0).play();
        $playVideo.toggleClass('hidden');
    }else{
            console.log('not ready');
    }
}

function globalHandlePauseVideo(){
    $(this).get(0).pause();
}

/**
 * @function changeSource changes the src of the global video player modal
 * @param {String} src URI of the video to play
 */
function changeSource(src) {
    $videoContainer.attr('src', src);
}

/**
 * @function handleOpenVideo changes the src of the global video player modal
 * and opens it
 * @param {String} src URI of the video to play
 */
function handleOpenVideo(src){
    changeSource(src);
    globalHandleShowVideo();
}

$showVideo.click(globalHandleShowVideo);

$exitBtn.click(globalHandleExitVideo);

$playVideo.click(globalHandlePlayVideo);

$videoContainer.click(globalHandlePauseVideo);


if($videoContainer && $videoContainer.get(0)){
    $videoContainer.get(0).onplaying = function(){
        $playVideo.addClass('hidden');
    }
    $videoContainer.get(0).onpause = function(){
        $playVideo.removeClass('hidden');
    }
}

/*--End of VidCTRLS---*/
/*--------------------*/

$emailSignup.click(function() {
    var
      form = $(this).parents('form:first'),
      result = $('#signup-result'),
      mcEmail = $('#MERGE0').val(),
      FNAME = $('#MERGE1').val(),
      LNAME = $('#MERGE2').val();

    $.ajax({
        type: "POST",
        url: '/wp-content/themes/sf-motors/scripts/newsletter-signup.php',
        data: JSON.stringify({
            email_address: mcEmail,
            status: 'subscribed',
            merge_fields: {
                FNAME: FNAME,
                LNAME: LNAME
            }
        }),
        dataType: 'json',
        contentType: 'application/json',
        success: function(data) {
            result.html('Thanks for signing up!');
        },
        error: function(err) {
            result.html('Sorry, something went wrong. Try again.');
        }
    });

    link = form.attr('action');
});

function hideLoader(){
    $('.loader').css('display', 'none');
}

/*-------------------*/
/*------Runtime------*/
$(window).load(function(){
    hideLoader();
    showFullpageElement();
    topNavIntro();
});

/* if loading takes a long time, or there is a resource error, show page after 6 seconds */
setTimeout(hideLoader, 6000);

