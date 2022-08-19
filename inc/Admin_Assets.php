<?php 
class Admin_Assets
{
    public function __construct()
    {
        add_action('admin_enqueue_scripts', [$this, 'enqueue_styles']);
    }

    public function enqueue_styles()
    {
        wp_enqueue_style(
            'ashique-post-notice-style', 
            ASHIQUE_WP_POST_NOTICE_URL . '/assets/css/admin-style.css', 
            [], 
            ASHIQUE_WP_POST_NOTICE_VERSION
        );

        wp_enqueue_script(
            'ashique-post-notice-script', 
            ASHIQUE_WP_POST_NOTICE_URL . '/assets/js/admin-script.js', 
            ['jquery'], 
            ASHIQUE_WP_POST_NOTICE_VERSION, 
            true 
        );
    }
}
