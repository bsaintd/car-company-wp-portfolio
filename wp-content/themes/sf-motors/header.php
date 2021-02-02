<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SF_Motors
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- <title>{{title}}</title> -->
    <!-- <meta name="description" content="{{description}}"> -->
    <!-- <meta name="keywords" content="{{keywords}}"> -->
    <meta name="author" content="SF Motors">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="/wp-content/themes/sf-motors/css/lib/bootstrap.3.3.7.min.css">
	<!-- CSS for FulLPage.js -->
	<link rel="stylesheet" type="text/css" href="/wp-content/themes/sf-motors/css/lib/jquery.fullpage.2.9.6.css">
	<!-- Global CSS -->
    <link rel="stylesheet" type="text/css" href="/wp-content/themes/sf-motors/css/global.css">
    <link rel="icon" href="/favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">



	<?php wp_head(); ?>
	<script type="application/ld+json">
    {
    "@context": "https://schema.org",
    "@type": "Organization",
    "url": "https://sfmotors.com",
    "name": "SF Motors Inc.",
    "sameAs": [
        "https://www.facebook.com/SFMotorsGlobal",
        "https://www.instagram.com/sfmotorsglobal/",
        "https://www.youtube.com/channel/UCYJRbf--a5zgmITRpHVM1xA",
        "https://www.linkedin.com/company/sf-motors/",
        "https://twitter.com/SFMotorsInc",
        "https://en.wikipedia.org/wiki/SF_Motors"
    ]
    }
    </script>
<!-- Google Tag Manager -->
	<!-- <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-N43G55N');</script> -->
<!-- End Google Tag Manager -->
</head>

<body <?php body_class(); ?>>
<div class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'sf-motors' ); ?></a>
    <header id="masthead" class="site-header">
        <nav id="site-navigation" class="main-navigation navbar navbar-expand-xs navbar-overlay fixed-top" role="navigation">
            <div class="col-md-5 text-left main-navbar-lg-display">
            <!-- LEFT MAIN MENU -->
            <?php
                wp_nav_menu( array(
                    'theme_location' => 'menu-1',
                    'menu_id'        => 'primary-menu',
                    'container'       => 'div',
                    'container_id'    => '',
                    'echo'            => true,
                    'fallback_cb'     => 'wp_page_menu',
                    'before'          => '<li class="nav-item">',
                    'after'           => '</li>',
                    'link_before'     => '',
                    'link_after'      => '',
                    'items_wrap'      => '<ul class="navbar-nav main-navbar flex-row">%3$s</ul>',
                    'depth'           => 0,
                    'walker'          => ''
                        ) );
                ?>
            </div>
            <!-- CENTER MAIN MENU -->
            <div class="col-xs-7 col-md-2">
                <a id="navLogo" class="navbar-brand" href="/" style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);"><img src="/wp-content/uploads/global/nav/SF_Motors_Logo_NavBar_Dark_Blue.png" alt="SF Motors Logo" class="text-center navbar-logo"></a>
                <span class="sr-only">(current)</span>
            </div>
            <!-- HAMBURGER MAIN MENU -->
            <div class="col-xs-5 text-right">
                <div class="navbar-toggler" id="navbar-toggler" style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">
                    <input class="toggle-check" type="checkbox" autocomplete="off" aria-label="Hamburger Menu">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
            </div>
            <hr id="nav-hr" class="nav-hr" style="transform: matrix(1, 0, 0, 1, 0, 0);">
            <div id="vehicles-subnav" class=" hidden">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/vehicles/#sf7">SF7</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/vehicles/#sf5">SF5</a>
                </li>
                </ul>
            </div>
            <div class="dropdown-nav dsktp-hb-menu" id="navmenu-toggle">
                <?php // desktop hamburger menu nav
                    wp_nav_menu( array(
                        'menu'           => 'Desktop Hamburger',
                        'menu_id'        => 'mobile-menu',
                        'container'       => 'div',
                        'echo'            => true,
                        'fallback_cb'     => 'false',
                        'link_before'     => '',
                        'link_after'      => '',
                        'items_wrap'      => '<ul class="navbar-nav">%3$s</ul>',
                        'depth'           => 0,
                        'walker'          => ''
                    ) );
                ?>
                <!-- END Main TopNav Items Desktop Only -->
            </div>
            <div class="dropdown-nav mobile-hb-menu" id="navmenu-toggle">
                <?php // mobile nav
                    wp_nav_menu( array(
                        'menu'           => 'Mobile Expanded',
                        'menu_id'        => 'mobile-menu',
                        'container'       => 'div',
                        'echo'            => true,
                        'fallback_cb'     => 'false',
                        'link_before'     => '',
                        'link_after'      => '',
                        'items_wrap'      => '<ul class="navbar-nav">%3$s</ul>',
                        'depth'           => 0,
                        'walker'          => ''
                    ) );
                ?>
                <!-- END Main TopNav Items Mobile and Tablet Only -->
            </div>
        </nav>
    </header><!-- #masthead -->

	<div id="content" class="site-content">
