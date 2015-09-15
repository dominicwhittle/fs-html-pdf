<?php
/*
Plugin Name: F^2 HTML->PDF
Plugin URI: http://futuresquared.com.au/
Description: 
Version: 1.0
Author: DBone
Author URI: http://futuresquared.com.au/
License: PRIVATE
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

// $dir = plugin_dir_url( __FILE__ );
include_once( 'mpdf60/mpdf.php' );


// 
add_filter('query_vars', 'add_query_vars');
function add_query_vars($vars){
  $vars[] = '__api';
  $vars[] = 'pdf';
  return $vars;
}

// 
add_action('init', 'add_endpoint');
function add_endpoint(){
  add_rewrite_rule('^api/pdf/?([0-9]+)?/?', 'index.php?__api=1&post_id=$matches[1]', 'top');
}

//
add_action('parse_request', 'sniff_requests');
function sniff_requests(){
  global $wp;
  if ( isset($wp->query_vars['__api'] ) ){
    handle_request();
    
    die();
    // exit;
  }
}



function handle_request(){
  
  $mpdf=new mPDF();
  
  $html = '<p>Hallo World</p>';
  $html = file_get_contents( plugin_dir_url( __FILE__ ) . 'example.html');

  $mpdf->WriteHTML($html);

  $mpdf->Output();
  exit;
    
	// global $wp;
	// $pugs = $wp->query_vars['html'];
	// if(!$pugs)
	// 	$this->send_response('Please tell us how many pugs to send.');
	// 
	// $pugs = file_get_contents($this->api.$pugs);
	// if($pugs)
	// 	$this->send_response('200 OK', json_decode($pugs));
	// else
	// 	$this->send_response('Something went wrong with the pug bomb factory');
}
