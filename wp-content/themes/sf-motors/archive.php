<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SF_Motors
 */
wp_enqueue_style( 'blog', get_template_directory_uri() . '/css/blog.css',false,'1.1','all');
get_header();
?>
<div class="post-hero">
  <div class="hero-wrapper">
    <?php echo get_the_post_thumbnail();?>
  </div>
</div>

<div class="container">
	<div class="post-content col-md-8 col-md-offset-2" style="position:relative;z-index:100;">
		<?php if ( have_posts() ) : ?>

		<div class="post-header">
		  <?php
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="archive-description">', '</div>' );
			?>
      	</div> <!-- end post-header -->
      	<div class="post-body">
		<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', get_post_type() );
				?>
				<hr>
				<?php
			endwhile;
				the_posts_navigation();
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
		?>
	</div> <!-- end post-content -->
</div> <!-- end container -->

<?php
get_footer();
