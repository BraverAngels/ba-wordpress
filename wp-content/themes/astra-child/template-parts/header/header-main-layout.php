<?php
/**
 * Better Angels override for Primary Header
 *
 * Adds the Join Us and Donate buttons.
 * Adds custom css to:
 * - Reduce logo size proportional to device width
 * - Hide the Join Us and Donate buttons on mobile
 * - Include the Join Us And Donate buttons in hamburger menu
 */

?>
<style>
.ba-menu-container .main-header-container {
	/* flex-wrap: nowrap; */
}

/* Call to action buttons */
.ba-menu-container .cta-buttons {
	display: flex;
	white-space: nowrap;
	align-items: center;
}
.ba-menu-container .cta-buttons a {
	font-size: 16px;
	font-weight: bold;
	text-transform: uppercase;
	border-radius: 7px 7px 7px 7px;
	padding: 10px 20px;
	display: inline-block;
}
/* small device widths, buttons will reduce in size */
.ast-header-break-point .ba-menu-container .cta-buttons a {
	font-size: 12px;
	padding: 8px 14px;
}
.ba-menu-container .cta-buttons .cta-button-white {
	color: #231f20;
	background-color: #ffffff;
	border: 1px solid #231f20;
	margin: 0 18px 0 18px;
}
.ba-menu-container .cta-buttons .cta-button-red {
	color: #fff;
	background-color: #bc2f2c;
	border: 1px solid #bc2f2c;
}

/* small device widths, logo will scale down in width */
.ast-header-break-point .site-header .main-header-bar-wrap .ba-menu-container .site-branding {
	flex: 0 0 50%;
}
.ba-menu-container .site-branding  {
	flex: 0 1 200px;
}
</style>

<div class="main-header-bar-wrap ba-menu-container">
	<div <?php echo astra_attr( 'main-header-bar' ); ?>>
		<?php astra_main_header_bar_top(); ?>
		<div class="ast-container">
			<div class="ast-flex main-header-container">
				<?php astra_masthead_content(); ?>
				<div class="cta-buttons">
				  <a class="cta-button-white" href="<?php echo home_url("/donate?utm_source=website&utm_medium=donate&utm_campaign=upper_right"); ?>">
				    Donate
				  </a>
				  <a class="cta-button-red" href="<?php echo home_url("/join?utm_source=website&utm_medium=join&utm_campaign=upper_right"); ?>">
				    Join Us
				  </a>
				</div>
			</div><!-- Main Header Container -->
		</div><!-- ast-row -->
		<?php astra_main_header_bar_bottom(); ?>
	</div> <!-- Main Header Bar -->
</div> <!-- Main Header Bar Wrap -->
