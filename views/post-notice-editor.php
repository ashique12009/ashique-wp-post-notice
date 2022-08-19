<p>Enter you notice:</p>
<textarea id="ashique-admin-post-notice-editor" name="ashique-admin-post-notice-editor">
    <?php echo get_post_meta(get_the_ID(), 'ashique-post-notice', true); ?>
</textarea>
<?php wp_nonce_field('ashique-post-notice-save', 'ashique-post-notice-nonce'); ?>