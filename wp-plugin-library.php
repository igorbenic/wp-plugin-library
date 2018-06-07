<?php

/**
 * Plugin Name: Library to be used for other Plugins
 * Description: If activated separately, it will load.
 */

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

if ( ! defined( 'Plugin_Library_Loaded' ) ) {
    add_action( 'init', function(){
        $plugin = new Plugin_Library();
        $plugin->load();
         
    });
}