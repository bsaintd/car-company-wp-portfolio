<?php
/**
 * Template Name: Press
 *
 * This is the template that displays the latest press post
 * with a sidebar to find other press posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SF_Motors
 */
wp_enqueue_style( 'newsroom', get_template_directory_uri() . '/css/newsroom.css',false,'1.1','all'); /* add press styling */

get_header();

/* display latest "blog" post in main section of blog */
$post_cat_arg = array(
  'category_name' => 'press',
  'showposts' => '1',
  'orderby' => 'date',
  'order' => 'DESC',
);
/* define blog post query */
$query_post_cat = new WP_Query( $post_cat_arg );

if ( $query_post_cat->have_posts() ) {
  while ( $query_post_cat->have_posts() ) {
    $query_post_cat->the_post();
?>

  </div> <!-- end row -->
</div> <!-- end container -->

<div class="container legal-page-content" role="main">
  <div class="row">
    <section class="aux-nav col-xs-12" id="util-nav">
      <div class="aux-nav-links">
        <div class="aux-nav-title">
          <div id="aux-nav-text">Newsroom</div>
        </div>
        <!-- AUX MENU -->
          <?php
            wp_nav_menu( array(
            'menu'           => 'Aux Menu',
            'menu_id'        => 'aux-menu',
            'container'       => 'div',
            'echo'            => true,
            'fallback_cb'     => 'true',
            'before'          => '<div class="aux-nav-link">',
            'after'           => '</div>',
            'items_wrap'      => '<div class="aux-nav-link-container">%3$s</div>',
            'depth'           => 0,
            'walker'          => ''
            ) );
          ?>
      </div>
    </section>
  </div>
  <div class="row">
    <section class="container">
      <div class="row">
        <div class="post-content col-xs-12 col-sm-8">
          <h6 class="headline">Featured</h6>
          <?php echo get_the_post_thumbnail();?>
          <div class="post-header">
            <h3><?php echo the_title()?><h3>
          </div>
          <div class="post-body">
            <?php echo get_the_content();?>
          </div> <!-- end post-body -->
          <div class="press-kit">
              <p>Download our press kit: <br> <a href="https://d288wnbr8pn8n1.cloudfront.net/presskit/sfmotors_press_kit.zip" class="press-kit-download">⇩ Press Kit</a></p>
          </div>
          </div>
        <?php
          }
          wp_reset_postdata(); /* restore original post data */
        }
          $category = 'press';
          get_template_part( 'template-parts/content-sidebar', $category );
        ?>

      </section>
    </div>
<?php
get_footer();
?>
<script>
 jQuery(document).ready(function() {
    var $body = jQuery('body');
    $body.addClass('auxnav-invert');
  });
</script>
<?php
