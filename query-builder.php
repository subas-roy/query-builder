<?php 
/**
* Plugin Name: Query Builder
* Description: A custom Query Builder plugin boilerplate for WordPress.
* Version: 1.0.0
* Author: Subas Roy
* Text Domain: query-builder
*/
if (!defined('ABSPATH')) {
    exit;
}

class Query_Builder {
    public function __construct() {
        add_action('plugins_loaded', [$this, 'let_the_journey_began']);
    }

    public function let_the_journey_began() {
        add_shortcode('query_builder', [$this, 'query_builder_shortcode']);
    }

    function query_builder_shortcode() {
        ob_start();
        include_once 'query.php';
        return ob_get_clean();
    }
}
new Query_Builder();