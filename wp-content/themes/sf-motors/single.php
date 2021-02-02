<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package SF_Motors
 */
$category = strtolower(get_the_category()[0]->name);

if($category == 'blog'){
  wp_enqueue_style( 'blog', get_template_directory_uri() . '/css/blog.css',false,'1.1','all'); /* add blog styling */
} elseif($category == 'press'){
  wp_enqueue_style( 'press', get_template_directory_uri() . '/css/newsroom.css',false,'1.1','all'); /* add press styling */
}
  get_header();

if($category =="blog"){ ?>

  <div class="post-hero">
    <div class="hero-wrapper">
      <?php echo get_the_post_thumbnail();?>
    </div>
  </div>
  <div class="container">

<?php }

if($category =="press"){ ?>

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
  <?php } ?>
  <div class="row">
    <div class="post-content col-xs-12 col-sm-8">
      <div class="post-header">
      <?php if($category == 'press'){  echo get_the_post_thumbnail();}?>

        <h1><?php
          echo ($category == 'blog' ? get_the_title() : the_title());
        ?>
        </h1>
        <h2><?php echo get_the_time('F j, Y');?></h2>
        <!-- INSERT SOCIAL SHARING LINKS AddThis plugin? -->
      </div> <!-- end post-header -->
      <div class="post-body">
        <?php
          echo get_post( )->post_content;
        ?>
      </div>  <!-- end post-body -->
    </div> <!-- end post-content -->

<?php
  get_template_part( 'template-parts/content-sidebar', $category );
?>

  </div> <!-- end row -->
</div> <!-- end container -->

<?php get_footer(); ?>
<script>
whenReadyMakeNavLight(false);
</script>