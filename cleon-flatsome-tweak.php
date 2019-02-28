<?php
/**
 * @package cleon_flatsome_tweak
 * @version 1.0.0 beta
 */
/*
Plugin Name: Cleon Flatsome Tweak
Plugin URI: http://cleon.vn
Description: Chỉ chừng đó thôi
Author: Lê Duy Quang
Version: 1.0.1
Author URI: http://leduyquang.com
*/

/**Remove MENU */
function cleon_remove_flatsome_menu() {
    remove_menu_page( 'flatsome-panel' );
    remove_submenu_page( 'themes.php', 'tgmpa-install-plugins' );
}
add_action( 'admin_menu', 'cleon_remove_flatsome_menu', 999 );

/**Remove Child menu on topbar */
function cleon_remove_flatsome_barmenu($wp_admin_bar) {
	
    $wp_admin_bar->remove_node('flatsome_panel_license');
    $wp_admin_bar->remove_node('flatsome_panel_support');
    $wp_admin_bar->remove_node('flatsome_panel_changelog');
    $wp_admin_bar->remove_node('flatsome_panel_setup_wizard');
}
add_action('admin_bar_menu', 'cleon_remove_flatsome_barmenu', 999);

/**Remove text */
function cleon_hide_flatsome_text() { 
    ?>
        <style type="text/css">
            .flatsome-panel .wrap.about-wrap::before {
                content: 'Vui lòng lựa chọn cấu hình hoặc tùy biến theo link sổ xuống!';
                posision: relative;
                width: 100%;
            }
            .flatsome-panel .wrap.about-wrap > * {
                position: relative;
                left: -999999px;
            }
        </style>  
    <?php }
add_action( 'admin_head', 'cleon_hide_flatsome_text' );