<?php
/**
 * Plugin Name:       Comment Link
 * Plugin URI:        https://mahdivalipoor.ir/plugins/comment-link/
 * Description:       Displays a button under every comment to share it with others.
 * Version:           0.9.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Mahdi Valipoor
 * Author URI:        https://mahdivalipoor.ir/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 */

defined('ABSPATH') or die;

if (!class_exists('CommentLink')) {
    class CommentLink
    {
        public function __construct()
        {
            $this->addHooks();
        }

        private function addHooks()
        {
            add_action('wp_enqueue_scripts', array($this, 'enqueue'));
            add_filter('comment_text', array($this, 'filter'));
        }

        public function filter($comment)
        {
            echo '<div id="comment-';
            echo comment_ID();
            echo '">';
            echo $comment;
            echo '</div>';
            echo '<a style="cursor: pointer;" onclick="CommentLinkToClipboard(';
            echo comment_ID();
            echo ')"><i class="fa fa-share-alt-square" aria-hidden="true"></i></a>';
        }

        public function enqueue()
        {
            wp_enqueue_style('comment-link-icon', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
            wp_enqueue_script('comment-link-script', plugin_dir_url(__FILE__) . 'comment-link-script.js');

        }

    }

    $commentLink = new CommentLink;
}
