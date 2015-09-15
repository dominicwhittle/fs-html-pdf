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

$mpdf=new mPDF();

$mpdf->WriteHTML('<p>Hallo World</p>');

$mpdf->Output();
exit;
