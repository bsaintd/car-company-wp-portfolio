<?php
/**
 * Template part for displaying page blog-sidebar in blog and press templates
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SF_Motors
 */

?>
<div class="blog-sidebar col-xs-12 col-sm-4 ">
    <h2>FILTER ARTICLES</h2>
    <h5>DATE</h5>
    <select name="display-order" onchange="document.location.href=this.options[this.selectedIndex].value;">
      <option value="<?php echo esc_url( home_url( '/' ) ); ?>/category/blog/?order=DESC">Most Recent</option>
      <option value="<?php echo esc_url( home_url( '/' ) ); ?>/category/blog/?order=ASC">Oldest</option>
    </select>

    <!-- Monthy Sort -->
    <select name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">
      <option value=""><?php esc_attr( _e( 'Select Month', 'textdomain' ) ); ?></option>
      <?php wp_get_archives( array( 'type' => 'monthly', 'format' => 'option', 'show_post_count' => 1 ) ); ?>
    </select>
    <h5>TAGS</h5>
<?php
    $tags = get_tags();
    $html = '<div class="post_tags">';
    foreach ( $tags as $tag ) {
        $tag_link = get_tag_link( $tag->term_id );
        $html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='tag-block'>";
        $html .= "{$tag->name}</a>";
    }
    $html .= '</div>';
    echo $html;
?>
    <h5>MORE FROM SF MOTORS</h5>
<?php
    /* display latest "blog" posts (3) with pagination in the blog sidebar */
    // init variables to compensate for pagination with offset (not showing most recent post)
    $sb_current_page = get_query_var('paged');
    $sb_current_page = max( 1, $sb_current_page );
    $sb_per_page = 4;
    $sb_offset_start = 1;
    $sb_offset = ( $sb_current_page - 1 ) * $sb_per_page + $sb_offset_start;
    $sb_search_query = '';
    $sb_display_order = 'DESC';

    // if info entered into search field, change value
    if ( isset( $_REQUEST[ 'search' ] ) ):
        $sb_search_query = $_REQUEST[ 'search' ];
        $sb_display_order = $_REQUEST[ 'display-order' ];
        $sb_current_page = $paged;
        $sb_offset = 0;
    endif;

    $post_cat_sb_arg = array(
        's' => $sb_search_query,
        // 'post_type' => $_REQUEST[ 'post_type' ],
        'category_name' => 'blog',
        'posts_per_page' => $sb_per_page,
        'paged' => $sb_current_page,
        // 'offset' => $sb_offset, // Starts with the second most recent post.
        'orderby' => 'date',  // Makes sure the posts are sorted by date.
        'order' => $sb_display_order,  // And that the most recent ones come first.
        'post__not_in' => array($post->ID),
    );

    $query_post_sb_cat = new WP_Query( $post_cat_sb_arg );

    // manually count the number of pages, because we used a custom OFFSET (i.e.
    // other than 0), so we can't simply use $query_post_sb_cat->max_num_pages or even
    // $query_post_sb_cat->found_posts without extra work/calculation.
    $sb_total_rows = max( 0, $query_post_sb_cat->found_posts - $sb_offset_start );
    $sb_total_pages = ceil( $sb_total_rows / $sb_per_page );

    // loop through results
    if ( $query_post_sb_cat->have_posts() ):
    while ( $query_post_sb_cat->have_posts() ):
         $query_post_sb_cat->the_post();
    ?>
    <div class="sidebar-posts">
    <div class="sidebar-post-img">
        <div class="sidebar-image-wrapper">
            <?php echo get_the_post_thumbnail();?>
        </div>
    </div>
    <div class="sidebar-post-content">
        <h3><a href="<?php echo get_the_permalink(); ?>">
            <?php echo get_the_title();?></a></h3>
        <hr>
        <h5><?php echo get_the_time('F j, Y');?></h5>
        <a href="<?php echo get_the_permalink(); ?>" class="read-more-link">Read More</a>
    </div>
</div>

<?php endwhile;?>

    <div class="sb-pagination">
    <?php
    echo paginate_links(
        array(
        'total'   => $sb_total_pages,
        'current' => $sb_current_page,
        'type' => 'list',
        'prev_text' => '«',
        'next_text' => '»',
        )
    );
    ?>
    </div>
</div> <!-- end blog-sidebar -->
    <?php
        endif;

        /* restore original post data */
        wp_reset_postdata();
    ?>