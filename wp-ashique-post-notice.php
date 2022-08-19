<?php 
/**
 * Plugin Name:       A basic post notice plugin
 * Plugin URI:        https://ashique12009.blogspot.com/
 * Description:       A basic post notice plugin.
 * Version:           1.0.0
 * Author:            Khandoker Ashique Mahamud
 * Author URI:        https://ashique12009.blogspot.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       wp-ashique-post-notice
 * Domain Path:       /languages
 */

// If this file called directly, abort
if (!defined('WPINC')) {
    die;
}

final class WP_Ashique_Post_Notice {

    const version = '1.0.0';

    public function __construct()
    {
        $this->define_constants();

        add_action('plugins_loaded', [$this, 'initialize_plugin']);
    }

    /**
     * Define all necessary constants
     */
    public function define_constants()
    {
        define('ASHIQUE_WP_POST_NOTICE_VERSION', self::version);
        define('ASHIQUE_WP_POST_NOTICE_FILE', __FILE__);
        define('ASHIQUE_WP_POST_NOTICE_PATH', __DIR__);
        define('ASHIQUE_WP_POST_NOTICE_URL', plugins_url('', ASHIQUE_WP_POST_NOTICE_FILE));
        define('ASHIQUE_WP_POST_NOTICE_ASSETS', ASHIQUE_WP_POST_NOTICE_URL . '/assets');
    }

    /**
     * Initializes necessary classes and functions
     */
    public function initialize_plugin()
    {
        if (is_admin()) {
            require_once ASHIQUE_WP_POST_NOTICE_PATH . '/inc/Admin_Assets.php';
            new Admin_Assets();
            require_once ASHIQUE_WP_POST_NOTICE_PATH . '/inc/Post_Notice_Editor.php';
            new Post_Notice_Editor();
        }
        else {
            require_once ASHIQUE_WP_POST_NOTICE_PATH . '/inc/Frontend_Assets.php';
            new Frontend_Assets();
            require_once ASHIQUE_WP_POST_NOTICE_PATH . '/inc/Post_Notice_Display.php';
            new Post_Notice_Display();
        }
    }

    /**
     * Initializes a singleton instance
     */
    public static function init()
    {
        static $instance = false;
        if (!$instance) {
            $instance = new self();
        }

        return $instance;
    }

}

// Start plugin
WP_Ashique_Post_Notice::init();