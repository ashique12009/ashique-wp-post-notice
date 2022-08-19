<?php 
class Post_Notice_Display
{
    public function __construct()
    {
        add_filter('the_content', [$this, 'display_notice']);
    }

    public function display_notice($content)
    {
        $notice = get_post_meta(get_the_ID(), 'ashique-post-notice', true);

        $notice_html = '';
        
        if ($notice != '') {
            $notice_html = '<div id="ashique-post-notice">';
            $notice_html .= $notice;
            $notice_html .= '</div>';
        }

        return $notice_html . $content;
    }
}
