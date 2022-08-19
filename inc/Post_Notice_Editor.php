<?php 
class Post_Notice_Editor 
{
    public function __construct()
    {
        add_action('add_meta_boxes', [$this, 'add_meta_box']);
    }

    public function add_meta_box()
    {
        add_meta_box(
            'ashique-post-notice-editor',
            'Post Notice',
            [$this, 'post_notice_display'],
            'post',
            'normal',
            'high'
        );
    }

    public function post_notice_display()
    {
        require_once ASHIQUE_WP_POST_NOTICE_PATH . '/views/post-notice-editor.php';
    }
}