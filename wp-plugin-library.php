<?php

/**
 * Plugin Name: Library to be used for other Plugins
 * Description: If activated separately, it will load.
 */

if ( class_exists( 'Plugin_Library' ) ) {
    return;
}

class Plugin_Library {

    public function load() {
        define( 'Plugin_Library_Loaded', true );
        add_filter( 'bloginfo', array( $this, 'change_title' ), 10, 2 );
    }

    public function change_title( $title, $show ) {
        if ( 'name' === $show ) {
            return 'Changed through Library';
        }

        return $title;
    }
}


add_action( 'init', function(){
    if ( ! defined( 'Plugin_Library_Loaded' ) ) {
        $plugin = new Plugin_Library();
        $plugin->load();
    }
});
