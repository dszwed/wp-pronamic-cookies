<?php

function is_pronamic_cookies_section_accepted( $name ) {
    if( isset( $_COOKIE['pcl_section_' . $name] ) )
        return true;
    else
        return false;
}

function unset_pronamic_cookies_section( $name ) {
    setcookie( 'pcl_section_' . $name, time()-3600 );
}

function pcl_button( $name, $description = null ) { ?>
    <a href='#' class='pronamic_csection_show_button'><?php echo __( 'Accept cookie', 'pronamic-cookies' ); ?></a>
    <div class="pronamic_csection_modal">
        <h2><?php echo ucfirst( $name ); ?></h2>
        <a href="#" class="jCloseModal pronamic_csection_modal_close">&times;</a>
        <?php if ( $description ) : ?>
        <div class="pronamic_csection_modal_content">
            <?php if ( get_option( 'pronamic_cookie_link' ) ): ?>
                <a target="_blank" href="<?php echo esc_url( get_option( 'pronamic_cookie_link' ) ); ?>">
                    <?php echo $description; ?>
                </a>
            <?php else: ?>
                <?php echo $description; ?>
            <?php endif;?>
        </div>
        <?php endif;?>
        <div class="pronamic_csection_modal_footer">
            <a href="#" class="pronamic_csection_button pronamic_csection_button_green jAcceptCookie" data-name="<?php echo $name; ?>"><?php _e( 'Accept cookie', 'pronamic-cookies' ); ?></a>
            <a href="#" class="pronamic_csection_button pronamic_csection_button_red jCloseModal"><?php _e( 'Decline cookie', 'pronamic-cookies' ); ?></a>
        </div>
    </div>
<?php }