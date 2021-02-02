<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SF_Motors
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <div class="row">
    <div class="post-content">
	<div class="sidebar-posts">
      <div class="sidebar-post-img">
        <div class="sidebar-image-wrapper">
          <?php echo get_the_post_thumbnail();?>
        </div>
      </div>
		<h3>
			<a href="<?php echo get_the_permalink(); ?>">
			<?php echo get_the_title();?></a>
		</h3>
		<h4><?php echo get_the_time('F j, Y');?></h4>

		<?php sf_motors_entry_footer(); ?>

		<h6>
			<a href="<?php echo get_the_permalink(); ?>" class="read-more-link">Read More</a>
		</h6>
	</div>

	<footer class="entry-footer">
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
