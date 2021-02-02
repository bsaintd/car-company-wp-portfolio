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

/** add page specific styles */
$title = str_replace(" ", "_", strtolower(get_the_title()));
wp_enqueue_style( $title, get_template_directory_uri() . '\/css/'. $title .'.css',false,'1.0','all');

/**
 * Need to set this global so that the footer can remove
 * some markup and render properly for a fullpage setup
 */
get_header();
the_post();
?>
    <div class="container legal-page-content" role="main">
        <div class="row">
          <!-- Start of auxillary nav component -->
          <section class="aux-nav col-xs-12" id="util-nav">
              <div class="aux-nav-links">
                  <div class="aux-nav-title">
                      <div id="aux-nav-text"><?php echo the_title()?></div>
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
              </div>
          </section>
          <!-- End of auxillary nav component -->
        </div>
        <section class="container">
<?php
the_content();
?>
</section>
</div>

<?php
get_footer();