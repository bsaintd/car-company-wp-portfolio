<?php
/**
 * Template Name: SubNav
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
wp_enqueue_style( 'career_board', get_template_directory_uri() . '/css/career_board.css',false,'1.1','all'); /* add blog styling */

get_header();
the_post();
?>
<div class="container legal-page-content" role="main">
	<div class="row">
		<!-- Start of auxillary nav component -->
		<section class="aux-nav col-xs-12" id="util-nav">
				<div class="aux-nav-links">
						<div class="aux-nav-title">
								<div id="aux-nav-text">Not Found</div>
						</div>
						</div>
				</div>
		</section>
		<!-- End of auxillary nav component -->
	</div>
	<section class="container">
		<div id="careers-main" class="main-content-area" style="height:50vh;">
			<p>
			The page you are looking for either doesn't exist or isn't at this location.
			</p>
		</div>
	</section>
</div>

<?php
get_footer();
?>
<script>
	whenReadyMakeNavLight(true);
</script>