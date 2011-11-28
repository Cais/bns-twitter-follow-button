<?php
/*
Plugin Name: BNS Twitter Follow Button
Plugin URI: http://buynowshop.com/plugins/bns-tfbutton
Description: Based on the (JavaScript) Twitter Follow Button (https://twitter.com/about/resources/followbutton) featuring all of the functionality offered including language support.
Version: 0.3
Author: Edward Caissie
Author URI: http://edwardcaissie.com/
License: GNU General Public License v2
License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/

/**
 * BNS Twitter Follow Button
 *
 * Based on the (JavaScript) Twitter Follow Button
 * (https://twitter.com/about/resources/followbutton) featuring all of the
 * functionality offered including language support.
 *
 * @package     BNS_Twitter_Follow_Button
 * @link        http://buynowshop.com/plugins/bns-twitter-follow-button/
 * @link        https://github.com/Cais/bns-twitter-follow-button/
 * @link        http://wordpress.org/extend/plugins/bns-twitter-follow-button/
 * @version     0.3
 * @author      Edward Caissie <edward.caissie@gmail.com>
 * @copyright   Copyright (c) 2011, Edward Caissie
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License version 2, as published by the
 * Free Software Foundation.
 *
 * You may NOT assume that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details
 *
 * You should have received a copy of the GNU General Public License along with
 * this program; if not, write to:
 *
 *      Free Software Foundation, Inc.
 *      51 Franklin St, Fifth Floor
 *      Boston, MA  02110-1301  USA
 *
 * The license for this software can also likely be found here:
 * http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Last revised November 28, 2011
 */

/* Function that registers our widget. */
function load_bns_tfbutton_widget() {
        register_widget( 'BNS_TFButton_Widget' );
}
add_action( 'widgets_init', 'load_bns_tfbutton_widget' );

class BNS_TFButton_Widget extends WP_Widget {
        function BNS_TFButton_Widget() {
                /** Widget settings. */
                $widget_ops = array( 'classname' => 'bns-tfbutton', 'description' => __( 'Twitter Follow Button' ) );
                /** Widget control settings. */
                $control_ops = array( 'width' => 200, 'height' => 200, 'id_base' => 'bns-tfbutton' );
                /** Create the widget. */
                $this->WP_Widget( 'bns-tfbutton', 'BNS Twitter Follow Button', $widget_ops, $control_ops );
        }

        function widget( $args, $instance ) {
                extract( $args );
                /** User-selected settings. */
                /**
                 * @todo Finish all available settings
                 */
                $title        = apply_filters('widget_title', $instance['title'] );
                $twitter_name = $instance['twitter_name'];
                $show_count   = $instance['show_count']; /* Followers count display */
                $button       = $instance['button']; // Button color
                $text_color   = $instance['text_color']; // Text color
                $link_color   = $instance['link_color']; // Link color
                $lang         = $instance['lang']; // Language - default: English
                $width        = $instance['width']; // Width
                $align        = $instance['align']; // Alignment

                /** @var $before_widget string - defined by theme */
                echo $before_widget;

                /** Title of widget (before and after defined by themes) */
                if ( $title )
                    echo $before_title . $title . $after_title;

                /** Display stuff based on widget settings */
                ?>

                <a href="http://twitter.com/<?php echo $twitter_name; ?>" class="twitter-follow-button" data-show-count=<?php !$show_count ? printf( '"false"' ) : printf( '"true"' ); ?> data-button=<?php !$button ? printf( '"blue"' ) : printf( '"grey"' ); ?> data-text-color="<?php echo $text_color; ?>" data-link-color="<?php echo $link_color; ?>" data-width=<?php printf( $width ); ?> data-align=<?php !$align ? printf( '"left"' ) : printf( '"right"' ); ?> data-lang="<?php printf( $lang ); ?>" >Follow @<?php echo $twitter_name; ?></a>
                <script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
                <?php

                /** After widget (defined by themes). */
                echo $after_widget;
        }

        function update( $new_instance, $old_instance ) {
                $instance = $old_instance;
                /** Strip tags (if needed) and update the widget settings */
                $instance['title']        = strip_tags( $new_instance['title'] );
                $instance['twitter_name'] = strip_tags( $new_instance['twitter_name'] );
                $instance['show_count']   = $new_instance['show_count'];
                $instance['button']       = $new_instance['button'];
                $instance['text_color']   = $new_instance['text_color'];
                $instance['link_color']   = $new_instance['link_color'];
                $instance['lang']         = $new_instance['lang'];
                $instance['width']        = $new_instance['width'];
                $instance['align']        = $new_instance['align'];

                return $instance;
        }

        function form( $instance ) {
                /** Set default widget settings */
                $defaults = array(
                                'title'         => __( 'Twitter Follow Button' ),
                                'twitter_name'  => '',
                                'show_count'    => false,
                                'button'        => false, // Blue
                                'text_color'    => '186487', // Default blue pallette. The default Grey color would be white (#ffffff); leave empty.
                                'link_color'    => '',
                                'lang'          => '', // Default - English
                                'width'         => '300px',
                                'align'         => ''
                );
                $instance = wp_parse_args( (array) $instance, $defaults );
                ?>

                <p>
                    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:'); ?></label>
                    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
                </p>

                <p>
                    <label for="<?php echo $this->get_field_id( 'twitter_name' ); ?>"><?php _e('Twitter Name:'); ?></label>
                    <input class="widefat" id="<?php echo $this->get_field_id( 'twitter_name' ); ?>" name="<?php echo $this->get_field_name( 'twitter_name' ); ?>" value="<?php echo $instance['twitter_name']; ?>" />
                </p>

                <p>
                    <input class="checkbox" type="checkbox" <?php checked( (bool) $instance['button'], true ); ?> id="<?php echo $this->get_field_id( 'button' ); ?>" name="<?php echo $this->get_field_name( 'button' ); ?>" />
                    <label for="<?php echo $this->get_field_id( 'button' ); ?>"><?php _e('Grey button? (default: Blue)'); ?></label>
                </p>

                <p>
                    <label for="<?php echo $this->get_field_id( 'link_color' ); ?>"><?php _e('Link Color: #'); ?></label>
                    <input class="widefat" id="<?php echo $this->get_field_id( 'link_color' ); ?>" name="<?php echo $this->get_field_name( 'link_color' ); ?>" value="<?php echo $instance['link_color']; ?>" />
                </p>

                <p>
                    <input class="checkbox" type="checkbox" <?php checked( (bool) $instance['show_count'], true ); ?> id="<?php echo $this->get_field_id( 'show_count' ); ?>" name="<?php echo $this->get_field_name( 'show_count' ); ?>" />
                    <label for="<?php echo $this->get_field_id( 'show_count' ); ?>"><?php _e('Show Follower Count?'); ?></label>
                </p>

                <p>
                    <label for="<?php echo $this->get_field_id( 'text_color' ); ?>"><?php _e('Text Color: #'); ?></label>
                    <input class="widefat" id="<?php echo $this->get_field_id( 'text_color' ); ?>" name="<?php echo $this->get_field_name( 'text_color' ); ?>" value="<?php echo $instance['text_color']; ?>" />
                </p>

                <p>
                    <input class="checkbox" type="checkbox" <?php checked( (bool) $instance['align'], true ); ?> id="<?php echo $this->get_field_id( 'align' ); ?>" name="<?php echo $this->get_field_name( 'align' ); ?>" />
                    <label for="<?php echo $this->get_field_id( 'align' ); ?>"><?php _e('Align right? (default: left)'); ?></label>
                </p>

                <p>
                    <label for="<?php echo $this->get_field_id( 'width' ); ?>"><?php _e('Width (in pixels of percentage):'); ?></label>
                    <input class="widefat" id="<?php echo $this->get_field_id( 'width' ); ?>" name="<?php echo $this->get_field_name( 'width' ); ?>" value="<?php echo $instance['width']; ?>" />
                    <label>NB: Must be set in pixels to right align.</label>
                </p>

                <p>
                    <label for="<?php echo $this->get_field_id( 'lang' ); ?>"><?php _e('Language (as the two letter ISO-639-1 language code.):'); ?></label>
                    <select id="<?php echo $this->get_field_id( 'lang' ); ?>" name="<?php echo $this->get_field_name( 'lang' ); ?>" class="widefat">
                        <option <?php selected( 'en', $instance['lang'], true ); ?>>en</option>
                        <option <?php selected( 'fr', $instance['lang'], true ); ?>>fr</option>
                        <option <?php selected( 'de', $instance['lang'], true ); ?>>de</option>
                        <option <?php selected( 'it', $instance['lang'], true ); ?>>it</option>
                        <option <?php selected( 'es', $instance['lang'], true ); ?>>es</option>
                        <option <?php selected( 'ko', $instance['lang'], true ); ?>>ko</option>
                        <option <?php selected( 'ja', $instance['lang'], true ); ?>>ja</option>
                    </select>
                </p>
        <?php }
}
/** Add shortcode from post: */
function bns_tfbutton_shortcode ($atts) {
        /** Start capture */
        ob_start();
        /** Using the_widget() to make a plugin template tag */ ?>
        <div class="bns-tfbutton-shortcode">
            <?php
            the_widget(
                    'BNS_TFButton_Widget',
                    $instance = shortcode_atts( array(
                                                     'title'         => __(''),
                                                     'twitter_name'  => '', // No @ symbol needed
                                                     'show_count'    => false,
                                                     'button'        => false, // Blue
                                                     'text_color'    => '186487', // No # symbol needed
                                                     'link_color'    => '',
                                                     'lang'          => '', // default: English
                                                     'width'         => '300px',
                                                     'align'         => '', // Left aligned
                                                ), $atts ),
                    $args = array (
                                'before_widget'   => '',
                                'before_title'    => '',
                                'after_title'     => '',
                                'after_widget'    => ''
                                    )
                    ); ?>
        </div><!-- .bns-ftbutton-shortcode -->
        <?php $bns_tfbutton_output = ob_get_contents(); /* Captured output */
        ob_end_clean(); /* Stop capture */

        return $bns_tfbutton_output;
}
add_shortcode( 'bns_tfbutton', 'bns_tfbutton_shortcode' );
/** Shortcode end */
?>