"use strict";

/*------------------------*/

/*   Technology Page      */

/*------------------------*/
var $hero = $(".hero"),
    $heading = $("h1.sf-heading"),
    $heroText = $(".hero .copy-group h3"),
    $heroBtn = $(".hero .cta-button");

function heroIntro() {
  var heroTL = new TimelineMax();
  heroTL.from($hero, 1.0, {
    delay: 0,
    scale: 1.2,
    alpha: 0,
    ease: Power4.easeOut
  });
  heroTL.from($heading, 1.5, {
    delay: .8,
    scale: 1.2,
    alpha: 0,
    ease: Power4.easeOut
  });
  heroTL.from($heroText, 1.5, {
    x: -250,
    alpha: 0,
    ease: Power4.easeOut
  }, '-=.6');
  heroTL.from($heroBtn, 1.3, {
    alpha: 0,
    ease: Power4.easeOut
  }, '-=.6');
}
/**
 * @description Section animation closures
 */


function initializeAnimation(_ref) {
  var APPEND_TO = _ref.APPEND_TO,
      NAMESPACE = _ref.NAMESPACE,
      FILENAME_TEMPLATE = _ref.FILENAME_TEMPLATE,
      INDEX_PATTERN = _ref.INDEX_PATTERN,
      TOTAL_FRAMES = _ref.TOTAL_FRAMES,
      _ref$FPS = _ref.FPS,
      FPS = _ref$FPS === void 0 ? 24 : _ref$FPS;
  // Initialize array for Create DOM elements
  var $animationFrames = new Array(TOTAL_FRAMES);
  var frameDuration = Math.round(1000 / FPS);

  function createAnimationFrameElements() {
    $(APPEND_TO).append('<div class="animation-container ' + NAMESPACE + '"></div>');

    for (var i = 0; i < TOTAL_FRAMES; i++) {
      var number = i < 10 ? '0' + i.toString() : i.toString();
      var filename = FILENAME_TEMPLATE.replace(INDEX_PATTERN, number);
      $(APPEND_TO + " .animation-container." + NAMESPACE).append('<div class="animation-frame frame-' + i +'" style="background-image: url(\'' + filename + '\')"></div>');
      $animationFrames[i] = $(APPEND_TO + " ." + NAMESPACE + " .frame-" + i);
    }
  }

  function initializeAnimationLoop() {
    var nextFrame = 0;

    function showNextFrame() {
      var previousFrame = (TOTAL_FRAMES - 1 + nextFrame) % TOTAL_FRAMES;
      $animationFrames[previousFrame].css('opacity', 0);
      $animationFrames[nextFrame].css('opacity', 1);
      nextFrame++;
      nextFrame = nextFrame % TOTAL_FRAMES;
    }

    setInterval(showNextFrame, frameDuration);
  }

  createAnimationFrameElements();
  initializeAnimationLoop();
}
/**
 * @description the execution of animations and scripts begins here.
 */

/**
 * @description Desktop animations
 */


initializeAnimation({
  APPEND_TO: '.section-1',
  NAMESPACE: 'desktop',
  FILENAME_TEMPLATE: '/wp-content/uploads/technology-page/smart-chassis-animation/Smart_Chassis_v10_000[INDEX].jpg',
  INDEX_PATTERN: '[INDEX]',
  TOTAL_FRAMES: 61
});
initializeAnimation({
  APPEND_TO: '.section-2',
  NAMESPACE: 'desktop',
  FILENAME_TEMPLATE: '/wp-content/uploads/technology-page/intelligent-driving-animation/intelligent_driving_000[INDEX].jpg',
  INDEX_PATTERN: '[INDEX]',
  TOTAL_FRAMES: 61
});
/**
 * @description Mobile animations
 */

initializeAnimation({
  APPEND_TO: '.section-1',
  NAMESPACE: 'mobile',
  FILENAME_TEMPLATE: '/wp-content/uploads/technology-page/smart-chassis-animation-mobile/smart_chassis_mobile_[INDEX].jpg',
  INDEX_PATTERN: '[INDEX]',
  TOTAL_FRAMES: 61
});
initializeAnimation({
  APPEND_TO: '.section-2',
  NAMESPACE: 'mobile',
  FILENAME_TEMPLATE: '/wp-content/uploads/technology-page/intelligent-driving-animation-mobile/intelligent_driving_mobile_[INDEX].jpg',
  INDEX_PATTERN: '[INDEX]',
  TOTAL_FRAMES: 61
});
/**
 * @description kicks off a simple animation of the text in the hero
 */

$(window).load(heroIntro);
/**
 * @description uncomment for for Cypress testing
 */
// sokonFullpage.setNoScroll();

/**
 * @description initialization for FullpageJS
 */

sokonFullpage.start();