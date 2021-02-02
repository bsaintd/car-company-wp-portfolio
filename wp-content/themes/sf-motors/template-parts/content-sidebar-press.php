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
  <h6 class="headline">PREVIOUS ARTICLES</h5>
<?php
    /* display latest "blog" posts (3) with pagination in the blog sidebar */
    // init variables to compensate for pagination with offset (not showing most recent post)
    $sb_current_page = get_query_var('paged');
    $sb_current_page = max( 1, $sb_current_page );
    $sb_per_page = 10;
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
      'category_name' => 'press',
      'posts_per_page' => $sb_per_page,
      'paged' => $sb_current_page,
      'offset' => $sb_offset, // Starts with the second most recent post.
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
      <div class="sidebar-post-content">
        <h3>
            <a href="<?php echo get_the_permalink(); ?>">
            <?php echo get_the_title();?></a>
        </h3>
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
            'prev_text' => '« PREV',
            'next_text' => 'NEXT »',
          )
        );
        ?>
      </div>
      <hr/>
      <div class="press-timeline">
          <h3 class="headline">Company Timeline</h3>
          <h4>March, 2018</h4>
          <p></p>
          <h4></h4>
          <p>SF Motors Unveils Advanced Intelligent Electric Vehicle Technology to Accelerate Global Access to EVs</p>
          <h4></h4>
          <p>SF Motors begins testing autonomous technology on the open roads with state-issued Autonomous Vehicle Testing Permit</p>
          <h4>December, 2017</h4>
          <p></p>
          <h4></h4>
          <p>SF Motors received Autonomous Vehicle Testing Permit from the California DMV, allowing us to test autonomous technology on the open road</p>
          <h4></h4>
          <p>SF Motors parent company forms 3 Billion RMB joint venture with Junyue Sharing and Chongqing Share Industry Investments to invest in electric vehicle development</p>
          <h4>November, 2017</h4>
          <p></p>
          <h4></h4>
          <p>SF Motors receives $7.5 million tax credit from State of California</p>
          <h4></h4>
          <p>SF Motors closes acquisition of the AM General manufacturing plant in Mishawaka, Indiana</p>
          <h4>October, 2017</h4>
          <p></p>
          <h4></h4>
          <p>SF Motors acquires InEVit Inc., an EV battery modularization startup headed by industry trailblazer and Tesla co-founder, Martin Eberhard</p>
          <h4>September, 2017</h4>
          <p></p>
          <h4></h4>
          <p>SF Motors parent company granted permission by Chinese Government to issue convertible bond worth up to 1.5 Billion RMB for SF Motors</p>
          <h4>August, 2017</h4>
          <p></p>
          <h4></h4>
          <p>SF Motors hosts first University of Michigan-Sokon Autonomous Driving Seminar</p>
          <h4>July, 2017</h4>
          <p></p>
          <h4></h4>
          <p>SF Motors establishes intelligent driving research center in Beijing</p>
          <h4></h4>
          <p>SF Motors hosts first Global Partnership Meeting at its headquarters in Silicon Valley</p>
          <h4>June, 2017</h4>
          <p></p>
          <h4></h4>
          <p>SF Motors announces plans to acquire commercial automotive assembly plant in Mishawaka, Indiana</p>
          <h4>April, 2017</h4>
          <p></p>
          <h4></h4>
          <p>Parent Company of SF Motors and University of Michigan announce plans to establish Michigan-Sokon Research Center</p>
          <h4>March, 2017</h4>
          <p></p>
          <h4></h4>
          <p>SF Motors’ opens headquarters in Silicon Valley</p>
          <h4>January, 2017</h4>
          <p></p>
          <h4></h4>
          <p>Parent company of SF Motors (Sokon Industry Group) granted production permit from Chinese Government to produce electric vehicles</p>
          <h4>September, 2016</h4>
          <p></p>
          <h4></h4>
          <p>Tesla Co-founder Martin Eberhard joins SF Motors as Strategic Advisor</p>
          <h4>January 28, 2016</h4>
          <p></p>
          <h4></h4>
          <p>SF Motors founded in Silicon Valley, California</p>
      </div>
    </div> <!-- end press-sidebar -->
    <?php
    endif;

    /* restore original post data */
    wp_reset_postdata();
?>