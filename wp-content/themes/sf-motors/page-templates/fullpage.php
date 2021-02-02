<?php
/**
 * Template Name: Fullpage
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SF_Motors
 */

/**
 * Need to set this global so that the footer can remove
 * some markup and render properly for a fullpage setup
 */
$GLOBALS['isFullpage'] = true;
$title = str_replace(" ", "_", strtolower(get_the_title()));
wp_enqueue_style( $title, get_template_directory_uri() . '\/css/'. $title .'.css',false,'1.1','all');
get_header();
the_post();
?>
<style>
@keyframes pulse {
  0% {
    opacity: 1;
  }
  50% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}
.loader img{
    animation: pulse 2s infinite;
}
</style>
<div class="loader" style="position: fixed; height: 100vh; width: 100vw; z-index: 9999; background-color: #000">
    <p style="position:absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);"><img src="/wp-content/uploads/global/nav/SF_Motors_Logo_NavBar_white.png" style="width: 15vmax; height: auto;" alt="SF Motors"></p>
</div>
<div id="video-player-panel" class="">
  <div class="video-wrapper">
    <div class="exit-btn" style="background-image: url('/wp-content/uploads/global/SF-Motors-X-Out-Button.png');">
    </div>
    <div class="play-btn" style="background-image: url('/wp-content/uploads/global/SF-Motors-Vehicles-Page-Hero-White-Play-Button.png');">
    </div>
    <video src playsinline="true"></video>
  </div>
</div>
<div id="fullpage" role="main">
<?php
the_content();
get_footer();

