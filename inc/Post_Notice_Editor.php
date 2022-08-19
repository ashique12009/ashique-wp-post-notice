<?php 
class Post_Notice_Editor 
{
    public function __construct()
    {
        add_action('add_meta_boxes', [$this, 'add_meta_box']);
        add_action('save_post', [$this, 'save_post_notice']);
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

    public function save_post_notice($post_id)
    {
        if ($this->user_can_save($post_id)) {
            return;
        }

        if ((isset($_POST['ashique-post-notice-nonce']) && wp_verify_nonce('ashique-post-notice-nonce', 'ashique-post-notice-save'))) {
            return;
        }

        $post_notice = strip_tags($_POST['ashique-admin-post-notice-editor']);
        update_post_meta($post_id, 'ashique-post-notice', $post_notice);
    }

    public function user_can_save($post_id)
    {
        $is_autosave = wp_is_post_autosave($post_id);
        $is_revision = wp_is_post_revision($post_id);

        return ($is_autosave || $is_revision);
    }
}