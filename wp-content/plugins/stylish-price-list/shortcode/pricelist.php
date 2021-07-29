<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

//create shortcode 

add_shortcode('pricelist', 'spl_shortcode_pricelist');
function spl_shortcode_pricelist($atts, $content = null) {
    extract(shortcode_atts(array(
        "id" => ''

                    ), $atts));

    /* you can use following enqueue in a shortcode to load as required */

    wp_enqueue_style('spl-list-style');
    wp_enqueue_style('spl-bootstrap-min');
    wp_enqueue_script('spl-bootstrap-min');
    wp_enqueue_script('spl-pricelist-tabs');
    //wp_enqueue_script('spl-pricelist-jquery-wookmark');
    
    wp_enqueue_style('font-awwsone');
    ob_start();
    include dirname(__FILE__) . '/pricelist-frontend.php';
    return ob_get_clean();

}



function spl_js_css_enqueue_scripts($hook) {
    wp_register_script('spl-bootstrap-min', SPL_URL . 'assets/lib/bootstrap-3.3.5/dist/js/stylish-price-list-bootstrap.min.js', array('jquery'), STYLISH_PRICE_LIST_VERSION , true);
    wp_register_script('spl-pricelist-admin-core', SPL_URL . 'assets/js/pricelist-admin-core.js', array('jquery'), STYLISH_PRICE_LIST_VERSION , true);
    wp_register_script('spl-pricelist-jquery-wookmark', SPL_URL . 'assets/js/jquery.wookmark.js', array('jquery'), STYLISH_PRICE_LIST_VERSION , true);
    wp_register_script('spl-pricelist-admin', SPL_URL . 'assets/js/pricelist-admin.js', array('jquery', 'wp-color-picker', 'jquery-ui-sortable'), STYLISH_PRICE_LIST_VERSION , true);
    wp_register_style('spl-bootstrap-min', SPL_URL . 'assets/lib/bootstrap-3.3.5/dist/css/stylish-price-list-bootstrap.min.css', array(), STYLISH_PRICE_LIST_VERSION );
    wp_register_style('spl-list-style', SPL_URL . 'assets/css/style.css', array(), STYLISH_PRICE_LIST_VERSION );
    wp_register_style('font-awwsone', SPL_URL . 'assets/font-awesome/css/font-awesome.min.css', array(), STYLISH_PRICE_LIST_VERSION);
    wp_register_script('spl-pricelist-tabs', SPL_URL . 'assets/js/tabs.js', array('jquery'), STYLISH_PRICE_LIST_VERSION , true);
}



function spl_js_css_enqueue_scripts_admin($hook) {
    wp_register_script('spl-bootstrap-min', SPL_URL . 'assets/lib/bootstrap-3.3.5/dist/js/stylish-price-list-bootstrap.min.js', array('jquery'), STYLISH_PRICE_LIST_VERSION , true);
    wp_register_script('spl-pricelist-admin-core', SPL_URL . 'assets/js/pricelist-admin-core.js', array('jquery'), STYLISH_PRICE_LIST_VERSION , true);
    wp_register_script('spl-pricelist-jquery-wookmark', SPL_URL . 'assets/js/jquery.wookmark.js', array('jquery'), STYLISH_PRICE_LIST_VERSION , true);
    wp_register_script('spl-pricelist-admin', SPL_URL . 'assets/js/pricelist-admin.js', array('jquery', 'wp-color-picker', 'jquery-ui-sortable'), STYLISH_PRICE_LIST_VERSION , true);
//    wp_register_style('spl-bootstrap-min', SPL_URL . 'assets/lib/bootstrap-3.3.5/dist/css/stylish-price-list-bootstrap.min.css');
//    wp_register_style('spl-list-style', SPL_URL . 'assets/css/style.css');
    wp_register_style('font-awwsone', SPL_URL . 'assets/font-awesome/css/font-awesome.min.css', array(), STYLISH_PRICE_LIST_VERSION);
    wp_register_script('spl-pricelist-tabs', SPL_URL . 'assets/js/tabs.js', array('jquery'), STYLISH_PRICE_LIST_VERSION , true);
}

add_action('wp_enqueue_scripts', 'spl_js_css_enqueue_scripts');
add_action('admin_enqueue_scripts', 'spl_js_css_enqueue_scripts_admin');

function add_stylesheet_admin_spl($hook) 

{
	// call spl style to spl pages only
	if(((isset($_GET["page"])) && ($_GET["page"] == "spl-tabs")) || ((isset($_GET["page"])) && ($_GET["page"] == "spl-tabs-new")) || ((isset($_GET["page"])) && ($_GET["page"] == "spl-tabs-diagnostic")) || ((isset($_GET["page"])) && ($_GET["page"] == "stylish_price_list_help")) || ((isset($_GET["page"])) && ($_GET["page"] == "stylish_price_list_video")) || ((isset($_GET["page"])) && ($_GET["page"] == "stylish_price_list_settings"))){	
    wp_enqueue_style( 'spl-bootstrap-min', SPL_URL . 'assets/lib/bootstrap-3.3.5/dist/css/stylish-price-list-bootstrap.min.css', array(), STYLISH_PRICE_LIST_VERSION );
    wp_enqueue_style( 'spl-list-style', SPL_URL . 'assets/css/style.css', array(), STYLISH_PRICE_LIST_VERSION );
    wp_enqueue_style('spl-admin-style', SPL_URL . 'assets/css/admin-style.css', array(), STYLISH_PRICE_LIST_VERSION );
	}
}
add_action('admin_enqueue_scripts', 'add_stylesheet_admin_spl');