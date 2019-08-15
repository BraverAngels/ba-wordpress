<?php
/**
 * Better Angels Primary Header
 */
?>

<style>
/* Mobile & Desktop Menu Common Styles */
.ba-primary-menu {
	font-family: "Nunito Sans", Karla;
	text-transform: uppercase;
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	-webkit-box-align: center;
			-ms-flex-align: center;
					align-items: center;
	-webkit-box-pack: justify;
			-ms-flex-pack: justify;
					justify-content: space-between;
}
.ba-primary-menu .ba-menu-logo {
	min-width: 220px;
	max-width: 220px;
}

/* Desktop Menu */
.ba-primary-menu-desktop {
	padding: 20px;
	border-bottom: 1px solid #D8D8D8;
}
.ba-primary-menu-desktop ul {
	background: #fff;
	list-style: none;
	margin: 0;
	padding-left: 0;
	width: 100%;
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	-ms-flex-wrap: wrap;
			flex-wrap: wrap;
	-webkit-box-align: center;
			-ms-flex-align: center;
					align-items: center;
	-webkit-box-pack: space-evenly;
			-ms-flex-pack: space-evenly;
					justify-content: space-evenly;
}
.ba-primary-menu-desktop li {
	display: block;
	float: left;
	padding: 13px 14px;
	position: relative;
	text-decoration: none;
	-webkit-transition-duration: 0.5s;
			 -o-transition-duration: 0.5s;
					transition-duration: 0.5s;
}
.ba-primary-menu-desktop li a {
	color: #231f20;
	padding: 0;
	font-size: 14px;
	font-weight: 700;
}
.ba-primary-menu-desktop li:hover,
.ba-primary-menu-desktop li:focus-within {
	cursor: pointer;
}
.ba-primary-menu-desktop li:focus-within a {
	outline: none;
}
.ba-primary-menu-desktop ul li ul {
	visibility: hidden;
	opacity: 0;
	min-width: 5rem;
	position: absolute;
	-webkit-transition: all 0.5s ease;
	-o-transition: all 0.5s ease;
	transition: all 0.5s ease;
	left: 0;
	display: none;
	z-index: 1;
}
.ba-primary-menu-desktop ul li:hover > ul,
.ba-primary-menu-desktop ul li:focus-within > ul,
.ba-primary-menu-desktop ul li ul:hover,
.ba-primary-menu-desktop ul li ul:focus {
	 visibility: visible;
	 opacity: 1;
	 display: block;
}
.ba-primary-menu-desktop ul li ul li {
	clear: both;
	width: 100%;
	border-bottom: 1px solid #a4a5a9;
	display: block;
	line-height: 1.2;
}
.ba-primary-menu-desktop .ba-dropdown-arrow{
	font-size: 16px;
	line-height: 1;
	padding: 10px 0 10px 10px;
	margin-top: -10px;
	margin-bottom: -10px;
}

/* Mobile Menu */
.ba-primary-menu-mobile {
	display: none;
	padding: 20px;
	border-bottom: 1px solid #D8D8D8;
}
.ba-mobile-menu-links li a {
	color: #231f20;
	padding: 0;
	font-size: 16px;
	font-weight: 700;
}
.ba-mobile-logo-container {
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	-webkit-box-align: center;
			-ms-flex-align: center;
					align-items: center;
}
.ba-mobile-menu-links {
	display: none;
	background: #fff;
	width: 100%;
}
.ba-mobile-menu-links ul {
	list-style: none;
}

/* Blue Background Menu with Social Icons, Login, Logout, etc. */
.ba-secondary-menu {
	background-color: #23356C;
	padding: 7px 20px;
	text-align: right;
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	-webkit-box-align: center;
			-ms-flex-align: center;
					align-items: center;
	-webkit-box-pack: end;
			-ms-flex-pack: end;
					justify-content: flex-end;
}
.ba-secondary-menu a {
	color: #fff;
	padding: 0px 7px;
	border-radius: 2px;
}
.ba-secondary-menu a:hover {
	color: #23356C;
	background-color: #fff;
}
.ba-secondary-menu a.ba-social-icon {
	color: #fff;
	font-size: 24px;
	width: 40px;
	height: 42px;
	text-align: center;
	display: inline-block;
}
.ba-secondary-menu a.ba-social-icon:hover {
	color: #23356C;
	background-color: #fff;
}

/* Call To Action Buttons ( Join Us / Donate ) */
.ba-cta-buttons {
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	-webkit-box-align: center;
			-ms-flex-align: center;
					align-items: center;
}
.ba-cta-button {
	font-size: 16px;
	font-weight: bold;
	text-transform: uppercase;
	border-radius: 7px 7px 7px 7px;
	padding: 10px 20px !important;
	display: inline-block;
	white-space: nowrap;
}
.ba-cta-button-white {
	color: #231f20 !important;
	background-color: #ffffff;
	border: 1px solid #231f20;
}
.ba-cta-button-red {
	color: #fff !important;
	background-color: #bc2f2c;
	border: 1px solid #bc2f2c;
	margin-left: 12px;
}

/* Hamburger Menu Toggle Button */
.ba-hamburger-buttons{
	width: 40px;
	height: 40px;
}
.ba-hamburger{
	cursor: pointer;
	border-radius: 3px;
	background-color: rgba(0,0,0,.05);
	color: #494c4f;
	height: 40px;
	width: 40px;
	padding: 4px 12px;

}
.ba-hamburger-open:after {
	content: "";
	display: block;
	width: 16px;
	height: 0;
	-webkit-box-shadow: 1px 10px 1px 1px #231f20,1px 16px 1px 1px #231f20,1px 22px 1px 1px #231f20;
	box-shadow: 0 10px 0 1px #231f20,0 16px 0 1px #231f20,0 22px 0 1px #231f20;
}
.ba-hamburger-close {
	color: #231f20;
	display: none;
	padding: 8px 11px;
	line-height: 0.8;
	font-size: 29px;
	display: none;
	width: 40px;
	height: 40px;
}

/* Intended to appear for screen readers but not appear visually */
.ba-screen-only{
	position: absolute;
	top: -10000em;
	width: 1px;
	height: 1px;
	margin: -1px;
	padding: 0;
	overflow: hidden;
	clip: rect(0,0,0,0);
	border: 0;
}

/* Mobile, Desktop breakpoints */
@media screen and (max-width: 1220px){
	.ba-primary-menu-desktop li  {
		padding: 0 4px;
	}
	.ba-primary-menu .ba-menu-logo {
		min-width: 200px;
		max-width: 200px;
	}
	.ba-primary-menu-desktop li a {
		font-size: 12px;
	}
	.ba-primary-menu-desktop .ba-dropdown-arrow{
		padding: 10px 0 10px 2px;
	}
	.ba-cta-button {
		font-size: 14px;
		padding: 10px !important;
	}
}
@media screen and (max-width: 768px){
	.ba-primary-menu-mobile {
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;
	}
	.ba-primary-menu-desktop {
		display: none;
	}
	.ba-secondary-menu-links{
		display: none;
	}
}
@media screen and (max-width: 480px){
	.ba-cta-button {
		font-size: 12px;
		padding: 6px !important;
	}
	.ba-primary-menu .ba-menu-logo {
		min-width: 130px;
		max-width: 130px;
	}
	.ba-primary-menu-mobile {
		padding: 20px 6px;
	}
}
</style>

<script>
$( document ).ready(function() {
	$open_button = $('.ba-hamburger-open');
	$close_button = $('.ba-hamburger-close');
	$mobile_menu = $('.ba-mobile-menu-links');

	$open_button.click(function(){
		$open_button.hide();
		$close_button.show();
		$mobile_menu.show();
	})

	$close_button.click(function(){
		$open_button.show();
		$close_button.hide();
		$mobile_menu.hide();
	})
});
</script>


<?php
function ba_logo_url() {
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
	return $image[0];
}

function ba_get_menu_array($menu_name) {
	$array_menu = wp_get_nav_menu_items($menu_name);
	$menu = array();
	foreach ($array_menu as $m) {
		if (empty($m->menu_item_parent)) {
			$menu[$m->ID] = array();
			$menu[$m->ID]['ID'] = $m->ID;
			$menu[$m->ID]['title'] = $m->title;
			$menu[$m->ID]['url'] = $m->url;
			$menu[$m->ID]['classname'] = 'ba-menu-item';
			$menu[$m->ID]['children'] = array();
		}
	}
	$submenu = array();
	foreach ($array_menu as $m) {
		if ($m->menu_item_parent) {
			$submenu[$m->ID] = array();
			$submenu[$m->ID]['ID'] = $m->ID;
			$submenu[$m->ID]['title'] = $m->title;
			$submenu[$m->ID]['url'] = $m->url;
			$submenu[$m->ID]['classname'] = 'ba-sub-menu-item';
			$menu[$m->menu_item_parent]['children'][$m->ID] = $submenu[$m->ID];
		}
	}
	return $menu;
}

function ba_get_menu_html($menu_array) {
	$html = "<ul class='ba-menu-container'>";

	foreach ($menu_array as $menu_item) {
		$has_children = !empty($menu_item['children']);
		$html .= "<li class='{$menu_item['classname']}' id='{$menu_item['ID']}'>";

		if($has_children) {
			$html .= "<a aria-haspopup='true' href='{$menu_item['url']}'>{$menu_item['title']}<span class='ba-dropdown-arrow'>&#9662;</span></a>";
			$html .= "<ul class='ba-sub-menu-container' aria-label='submenu'>";
			foreach ($menu_item['children'] as $sub_menu_item) {
				$html .= "<li class='{$sub_menu_item['classname']}' id='{$sub_menu_item['ID']}'>";
				$html .= "<a href='{$sub_menu_item['url']}'>{$sub_menu_item['title']}</a>";
				$html .= "</li>";
			}
			$html .= "</ul>";
		} else {
			$html .= "<a href='{$menu_item['url']}'>{$menu_item['title']}</a>";
		}
		$html .= "</li>";
	}
	$html .= "</ul>";
	return $html;
}
?>

<nav role="navigation" class="ba-secondary-menu">
	<div class="ba-secondary-menu-links">
		<?php if( is_user_logged_in() ): ?>
			<a href="<?php echo wp_logout_url(); ?>">Logout</a>
		<?php else: ?>
			<a href="<?php echo esc_url(home_url('/login')) ?>">Member Login</a>
		<?php endif; ?>

		<a href="https://teespring.com/stores/better-angels-merchandise">
			Shop
		</a>
		<a href="<?php echo esc_url(home_url('/events')) ?>">
			Find an Event
		</a>
	</div>
	<div class="ba-secondary-menu-social-buttons">
		<a class="ba-social-icon" href="https://www.facebook.com/BetterAngelsUSA/" target="_blank">
			<span class="ba-screen-only">Facebook</span>
			<i class="fa fa-facebook"></i>
		</a>
		<a class="ba-social-icon" href="https://twitter.com/BetterAngelsUSA" target="_blank">
			<span class="ba-screen-only">Twitter</span>
			<i class="fa fa-twitter"></i>
		</a>
		<a class="ba-social-icon" href="https://www.instagram.com/betterangelsusa/"  target="_blank">
		<span class="ba-screen-only">Instagram</span>
			<i class="fa fa-instagram"></i>
		</a>
		<a class="ba-social-icon" href="https://www.youtube.com/channel/UCtlZ4t6aS4rAJoPyYD9DGLA" target="_blank">
			<span class="ba-screen-only">Youtube</span>
			<i class="fa fa-youtube"></i>
		</a>
	</div>
</nav>

<nav role="navigation" class="ba-primary-menu ba-primary-menu-desktop">
	<a class="ba-menu-item ba-menu-logo" href="<?php echo esc_url(home_url('/')) ?>">
		<img src="<?php echo ba_logo_url() ?>" />
	</a>
	<?php echo ba_get_menu_html(ba_get_menu_array('Primary')); ?>
	<div class="ba-cta-buttons">
		<a class="ba-cta-button ba-cta-button-white" href="<?php echo home_url("/donate?utm_source=website&utm_medium=donate&utm_campaign=upper_right"); ?>">
			Donate
		</a>
		<a class="ba-cta-button ba-cta-button-red" href="<?php echo home_url("/join?utm_source=website&utm_medium=join&utm_campaign=upper_right"); ?>">
			Join Us
		</a>
	</div>
</nav>

<nav role="navigation" class="ba-primary-menu ba-primary-menu-mobile">
	<div class="ba-mobile-logo-container">
		<a class="ba-menu-item ba-menu-logo" href="<?php echo esc_url(home_url('/')) ?>">
			<img src="<?php echo ba_logo_url() ?>" />
		</a>
		<div class="ba-cta-buttons">
			<a class="ba-cta-button ba-cta-button-white" href="<?php echo home_url("/donate?utm_source=website&utm_medium=donate&utm_campaign=upper_right"); ?>">
				Donate
			</a>
			<a class="ba-cta-button ba-cta-button-red" href="<?php echo home_url("/join?utm_source=website&utm_medium=join&utm_campaign=upper_right"); ?>">
				Join Us
			</a>
		</div>
	</div>
	<div class="ba-hamburger-buttons">
		<div class="ba-hamburger ba-hamburger-open"></div>
		<div class="ba-hamburger ba-hamburger-close">&times;</div>
	</div>
</nav>
<div class="ba-mobile-menu-links">
	<ul>
		<li>
			<?php if( is_user_logged_in() ): ?>
				<a href="<?php echo wp_logout_url(); ?>">Logout</a>
			<?php else: ?>
				<a href="<?php echo esc_url(home_url('/login')) ?>">Member Login</a>
			<?php endif; ?>
		</li>
		<li>
			<a href="https://teespring.com/stores/better-angels-merchandise">
				Shop
			</a>
		</li>
		<li>
			<a href="<?php echo esc_url(home_url('/events')) ?>">
				Find an Event
			</a>
		</li>
	</ul>

	<?php echo ba_get_menu_html(ba_get_menu_array('Primary')); ?>
</div>
