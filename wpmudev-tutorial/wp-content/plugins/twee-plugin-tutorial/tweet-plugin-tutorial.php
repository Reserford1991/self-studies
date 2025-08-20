<?php

/**
* Plugin Name: Tweet Plugin Tutorial
* Plugin URI: http://danielpataki.com
* Description: This plugin adds a simple tweet link below posts.
* Version: 1.0.0
* Author: Daniel Pataki
* Author URI: http://danielpataki.com
* License: GPL2
*/



function tweet_link( $content ) {
    $url = 'https://twitter.com/intent/tweet';
    $url .= '?url=' . get_permalink();

    $account = get_option( 'twitter_account' );
    if( !empty( $account ) ) {
        $url .= '&via=' . $account;
    }

    return $content . '<p><a href="' . $url . '">Tweet about this</a></p>';
}
add_action( 'the_content', 'tweet_link' );


add_action('admin_menu', 'tweetlink_settings_menu');

function tweetlink_settings_menu() {
    add_menu_page('Tweet Link Settings', 'Tweet Link', 'manage_options', 'tweetlink-settings', 'tweetlink_settings_page', 'dashicons-twitter');
}

function tweetlink_settings_page() {
    ?>
    <div class="wrap">
        <h2>Tweet Link Settings</h2>

        <form method="post" action="options.php">
            <?php settings_fields( 'tweetlink_settings' ); ?>
            <?php do_settings_sections( 'tweetlink_settings' ); ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Twitter Account</th>
                    <td><input type="text" name="twitter_account" value="<?php echo esc_attr( get_option('twitter_account') ); ?>" /></td>
                </tr>
            </table>

            <?php submit_button(); ?>

        </form>
    </div>

    <?php
}

add_action( 'admin_init', 'tweetlink_settings' );

function tweetlink_settings() {
    register_setting( 'tweetlink_settings', 'twitter_account' );
}


