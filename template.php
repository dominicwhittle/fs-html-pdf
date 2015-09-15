<?php

function template_html( $content = array() ){
ob_start();

?>

<!-- # Define header -->
<!--mpdf
<htmlpageheader name="header">
<table width="100%" style="border-bottom: 1px solid #000000; vertical-align: bottom; font-family: serif; font-size: 9pt; color: #000088;"><tr>
<td width="33%">Left header p <span style="font-size:14pt;">{PAGENO}</span></td>
<td width="33%" align="center"><img src="sunset.jpg" width="126px" /></td>
<td width="33%" style="text-align: right;"><span style="font-weight: bold;">myHTMLHeader1</span></td>
</tr></table>
</htmlpageheader>
mpdf-->

<!-- # Apply header -->
<!--mpdf
<sethtmlpageheader name="header" page="O" value="on" show-this-page="1" />
mpdf-->
<h1><?= $content->title ?: 'Title' ?></h1>
  
  
  
<?
return ob_get_clean();
}
