<?php
/**
 * Template Name: Blog
 *
 * This is the template that displays the latest blog post
 * with a sidebar to find other blog posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SF_Motors
 */
wp_enqueue_style( 'blog', get_template_directory_uri() . '/css/blog.css',false,'1.1','all'); /* add blog styling */

get_header();

/* display latest "blog" post in main section of blog */
$post_cat_arg = array(
  'category_name' => 'blog',
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
    <div class="post-hero">
      <div class="hero-wrapper">
        <?php echo get_the_post_thumbnail();?>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="post-content col-xs-12 col-sm-8">
          <div class="post-header">
            <h1><?php echo get_the_title();?></h1>
            <h2><?php echo get_the_time('F j, Y');?></h2>
            <!-- INSERT SOCIAL SHARING LINKS AddThis plugin? -->
          </div> <!-- end post-header -->
          <div class="post-body">
            <?php echo get_the_content();?>
          </div> <!-- end post-body -->
        </div> <!-- end post-content -->

<?php
  }
  wp_reset_postdata();  /* restore original post data */
}
  $category = 'blog';
	get_template_part( 'template-parts/content-sidebar', $category );
?>

  </div> <!-- end row -->
</div> <!-- end container -->

<?php get_footer();