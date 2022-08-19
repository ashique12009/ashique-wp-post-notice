<?php 
class Frontend_Assets
{
    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'enqueue_styles']);
    }

    public function enqueue_styles()
    {
        wp_enqueue_style(
            'ashique-post-notice-frontend-style', 
            ASHIQUE_WP_POST_NOTICE_URL . '/assets/css/public-style.css', 
            [], 
            ASHIQUE_WP_POST_NOTICE_VERSION
        );

        wp_enqueue_script(
            'ashique-post-notice-frontend-script', 
            ASHIQUE_WP_POST_NOTICE_URL . '/assets/js/public-script.js', 
            ['jquery'], 
            ASHIQUE_WP_POST_NOTICE_VERSION, 
            true 
        );
    }
}
