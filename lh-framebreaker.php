<?php
/*
Plugin Name: LH Framebreaker
Plugin URI: https://lhero.org/portfolio/lh-framebreaker/
Description: This Framebreaker will prevent your website being caught in some other websites frame.
Version: 1.03
Author: Peter Shaw
Author URI: https://shawfactor.com
*/


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if (!class_exists('LH_Framebreaker_plugin')) {


class LH_Framebreaker_plugin {
    
    var $namespace = 'lh_framebreaker';

private static $instance;

 /**
     * Helper function for registering and enqueueing scripts and styles.
     *
     * @name    The    ID to register with WordPress
     * @file_path        The path to the actual file
     * @is_script        Optional argument for if the incoming file_path is a JavaScript source file.
     */
    private function load_file( $name, $file_path, $is_script = false, $deps = array(), $in_footer = true, $atts = array() ) {
        $url  = plugins_url( $file_path, __FILE__ );
        $file = plugin_dir_path( __FILE__ ) . $file_path;
        if ( file_exists( $file ) ) {
            if ( $is_script ) {
                wp_register_script( $name, $url, $deps, filemtime($file), $in_footer ); 
                wp_enqueue_script( $name );
            }
            else {
                wp_register_style( $name, $url, $deps, filemtime($file) );
                wp_enqueue_style( $name );
            } // end if
        } // end if
	  
	  if (isset($atts) and is_array($atts) and isset($is_script)){
		
		
  $atts = array_filter($atts);

if (!empty($atts)) {

  $this->script_atts[$name] = $atts; 
  
}

		  
	 add_filter( 'script_loader_tag', function ( $tag, $handle ) {
	   

	   
if (isset($this->script_atts[$handle][0]) and !empty($this->script_atts[$handle][0])){
  
$atts = $this->script_atts[$handle];

$implode = implode(" ", $atts);
  
unset($this->script_atts[$handle]);

return str_replace( ' src', ' '.$implode.' src', $tag );

unset($atts);
usent($implode);

		 

	 } else {
	   
 return $tag;	   
	   
	   
	 }
	

}, 10, 2 );
 

	
	  
	}
		
    } // end load_file

private function detect_customizer() {
    // Globalize
    global $wp_customize;
    // If $wp_customize is set, return

if ( isset( $wp_customize ) ) {

return true;

} else {

return false;


}

}



private function register_scripts_and_styles() {

if ((!$this->detect_customizer()) and !is_admin()){
    
    // include the lh_framebreaker-script library
$this->load_file( 'lh_framebreaker-script', '/scripts/lh-framebreaker.js',  true, array(), true, array('defer="defer"','async="async"'));




}
}


public function general_init() {
  
          // Load JavaScript and stylesheets
        $this->register_scripts_and_styles();
  
  

}


    /**
     * Gets an instance of our plugin.
     *
     * using the singleton pattern
     */
    public static function get_instance(){
        if (null === self::$instance) {
            self::$instance = new self();
        }
 
        return self::$instance;
    }

    
    


public function __construct() {

    
    //register required styles and scripts
add_action('init', array($this,"general_init"));

}


}

$lh_framebreaker_instance = LH_Framebreaker_plugin::get_instance();

}


?>