var
    $hero = $("#hero"),
    $heading = $("h1.sf-heading"),
    $text = $("#video-player-text"),
    $play = $("#video-player-btn");

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
        ease: Power4.easeOut });
    heroTL.from($text, 1.5, {
        x: -250,
        alpha: 0,
        ease: Power4.easeOut }, '-=.6');
    heroTL.from($play, 1.3, {
        alpha: 0,
        ease: Power4.easeOut }, '-=.6');
}


/**
 * @description Map accordion
 */
$('.mobile-accordion ul li a').click(function(e) {
    e.preventDefault();

  var $this = $(this);
  $('#section-3').removeClass('expanded')
  $('#section-3 .caret').removeClass('up')

  if ($this.next().hasClass('show')) {
      $this.next().removeClass('show');
      $this.find('.caret').removeClass('up');
      $this.next().slideUp(350);
  } else {
      $this.parent().parent().find('li .inner').removeClass('show');
      $this.parent().parent().find('li .inner').slideUp(350);
      $this.next().slideToggle(350);
      $this.next().toggleClass('show');
      $this.find('.caret').addClass('up');
      $('#section-3').addClass('expanded')
  }
});

/*------Runtime------*/
$(window).load(heroIntro);
/* set this for testing*/
//sokonFullpage.setNoScroll();
sokonFullpage.start();

