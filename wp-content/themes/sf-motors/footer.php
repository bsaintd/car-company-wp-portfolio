<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SF_Motors
 */
?>

<?php if(!$GLOBALS['isFullpage']) { ?>
</div><!-- #content -->';
<?php } ?>

	<!-- Start of footer component -->
	<section class="section fp-auto-height {{light}}">
		<div class="footer hidden-xs">
			<div class="container">
			<div class="row newsletter">
				<p id="signup-result"></p>
				<div class="col-sm-4 cta">
				<h4 class="">NEWSLETTER SIGNUP</h4>
				<div class="col-sm-offset-2 cta-sub-text">Be the first to receive the latest SF Motors news.</div>
				</div>
				<div id="newsletter-signup">
				<input type="hidden" name="u" value="b3468e5734064a04a470a96a5">
				<input type="hidden" name="id" value="c3a73e4a5a">
				<input type="hidden" name="orig-lang" value="1">

				<div class="input-button">
					<input type="email" aria-label="Email Address Input" autocapitalize="off" autocorrect="off" name="MERGE0" id="MERGE0" size="25" class="mc-nl-email" placeholder="EMAIL ADDRESS">
					<br/>
					<input type="text" aria-label="First Name Input" autocapitalize="on" autocorrect="off" name="MERGE1" id="MERGE1" size="25" class="mc-nl-name" placeholder="FIRST NAME">
					<input type="text" aria-label="Last Name Input" autocapitalize="on" autocorrect="off" name="MERGE2" id="MERGE2" size="25" class="mc-nl-name last-name"
					placeholder="LAST NAME">
					<button id="email-signup" value="Signup Now" class="button">Signup Now</button>
				</div>
				</div>
			</div>
			</div>
			<div class="links">
				<div class="copy-right">© <?php echo date("Y");?> SF Motors. All rights reserved.</div>
				<div class="footer-links">
				<!-- FOOTER MENU -->
				<?php
					wp_nav_menu( array(
						'menu'           => 'Footer Menu',
						'menu_id'        => 'secondary-menu',
						'container'       => 'div',
						'echo'            => true,
						'fallback_cb'     => 'false',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '<div class="footer-links">%3$s</div>',
						'depth'           => 0,
						'walker'          => ''
							) );
						?>
				<!-- // FOOTER MENU -->
				</div>
				<div class="social-links">
				<a class="social-youtube" href="https://www.youtube.com/channel/UCYJRbf--a5zgmITRpHVM1xA" rel="noopener">
					<img style="display: inline;" alt="sfmotors youtube channel" src=" /wp-content/themes/sf-motors/img/social/youtube.png" />
				</a>
				<a class="social-facebook" href="https://www.facebook.com/SFMotorsGlobal" rel="noopener">
					<img style="display: inline;"alt="sfmotors facebook business profile"  src="/wp-content/themes/sf-motors/img/social/facebook.png" />
				</a>
				<a class="social-instagram" href="https://www.instagram.com/sfmotorsglobal" rel="noopener">
					<img style="display: inline;" alt="sfmotors instagram profile" src=" /wp-content/themes/sf-motors/img/social/instagram.png" />
				</a>
				<a class="social-twitter" href="https://twitter.com/SFMotorsInc" rel="noopener">
					<img style="display: inline;" alt="sfmotors twitter channel" src=" /wp-content/themes/sf-motors/img/social/twitter.png" />
				</a>
				</div>
			</div>
	<!-- end container -->
	</div> <!-- end footer -->
	<div class="footer-mobile hidden-lg hidden-md hidden-sm">
		<div class="container">
			<div class="col-xs-12">
				<a class="footer-img" href="#"><img src="/wp-content/uploads/global/nav/SF_Motors_Logo_NavBar_Dark_Blue.png" alt="SF Motors"></a>
				<div class="footer-links">
				<!-- FOOTER MENU -->
				<?php
					wp_nav_menu( array(
						'menu'           => 'Footer Menu',
						'menu_id'        => 'secondary-menu',
						'container'       => 'div',
						'echo'            => true,
						'fallback_cb'     => 'false',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '<div class="col-sm-4 footer-links"><ul>%3$s</ul></div>',
						'depth'           => 0,
						'walker'          => ''
							) );
						?>
				<!-- // FOOTER MENU -->
				</div>
				<div class="social-links">
					<a class="social-youtube"  href="https://www.youtube.com/channel/UCYJRbf--a5zgmITRpHVM1xA" rel="noopener">
					<img style="display: inline;" alt="sfmotors youtube channel" src=" /wp-content/themes/sf-motors/img/social/youtube.png" />
					</a>
					<a class="social-facebook"  href="https://www.facebook.com/SFMotorsGlobal" rel="noopener">
					<img style="display: inline;" alt="sfmotors facebook business profile" src="/wp-content/themes/sf-motors/img/social/facebook.png" />
					</a>
					<a class="social-instagram"  href="https://www.instagram.com/sfmotorsglobal" rel="noopener">
					<img style="display: inline;" alt="sfmotors instagram profile" src=" /wp-content/themes/sf-motors/img/social/instagram.png" />
					</a>
					<a class="social-twitter"  href="https://twitter.com/SFMotorsInc" rel="noopener">
					<img style="display: inline;" alt="sfmotors twitter profile" src=" /wp-content/themes/sf-motors/img/social/twitter.png" />
					</a>
				</div>
				<div class="copy-right">© <?php echo date("Y");?> SF Motors. All rights reserved.</div>
			</div>
		</div>
	</div> <!-- end footer-mobile -->
	</section>
	<?php if($GLOBALS['isFullpage']) { ?>
		</div><!-- #fullpage -->
		<div id="hidden-elements" class="hidden"></div>
	<?php }  ?>
</div><!-- #page -->
<!-- JS Libraries -->
<script type="text/javascript" src="/wp-content/themes/sf-motors/js/lib/jquery.min.js"></script>
<script type="text/javascript" src="/wp-content/themes/sf-motors/js/lib/TweenMax.min.js"></script>
<script type="text/javascript" src="/wp-content/themes/sf-motors/js/lib/ScrollMagic.min.js"></script>
<script type="text/javascript" src="/wp-content/themes/sf-motors/js/lib/animation.gsap.js"></script>
<script type="text/javascript" src="/wp-content/themes/sf-motors/js/lib/jquery.fullpage.js"></script>
<!-- Custom JS -->
<script type="text/javascript" src="/wp-content/themes/sf-motors/js/fullpage.js"></script>
<script type="text/javascript" src="/wp-content/themes/sf-motors/js/global.js"></script>
<script type="text/javascript" src="/wp-content/themes/sf-motors/js/auxnav.js"></script>
<?php
	$title = str_replace(" ", "_", strtolower(get_the_title()));
	echo ('<script type="text/javascript" src="/wp-content/themes/sf-motors/js/' . $title . '.js"></script>');
	wp_footer(); ?>
</body>
</html>
