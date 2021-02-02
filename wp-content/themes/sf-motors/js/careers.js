var
    $hero = $(".hero"),
    $heroHeading = $("h1.sf-heading"),
    $watchFilm = $(".hero .cta-group h3"),
    $copyGroup = $(".hero .copy-group p"),
    $heroCTA = $(".hero .cta-button");

function heroIntro() {

    var heroTL = new TimelineMax();
    heroTL.from($hero, 1.0, {
      delay: 0,
      scale: 1.2,
      alpha: 0,
      ease: Power4.easeOut
    });
    heroTL.from($heroHeading, 1.5, {
      delay: .8,
      scale: 1.2,
      alpha: 0,
      ease: Power4.easeOut });
    heroTL.from($watchFilm, 1.5, {
      x: -250,
      alpha: 0,
      ease: Power4.easeOut }, '-=.6');
    heroTL.from($heroCTA, 1.3, {
      alpha: 0,
      ease: Power4.easeOut }, '-=.6');
    heroTL.from($copyGroup, 1.5, {
      delay: 0,
      scale: 1,
      alpha: 0,
      ease: Power4.easeOut });
}

$(window).load(heroIntro);
//sokonFullpage.setNoScroll();
sokonFullpage.setOptions({
  responsiveWidth: 770
});
sokonFullpage.start();