<?php

add_filter('tc_fp_block_display', 'content_before_fp');

function content_before_fp($html) {
	$before_fp ='<p id="content_before_fp">Solvent Studios is a dynamic design studio creating cutting edge products in the realms of 
	game design, music, 3d art production and model fabrication. Featuring a blended mix of young yet experienced 
	artisans and seasoned IT professionals at the top of their careers – Solvent Studios provides the best possible array 
	of assets available to bring your project to a more than successful completion.</p> <hr /> 
	<p id="fp_intro">Check out our current projects!</p>'; //Put your HTML inside this var
	return $before_fp.$html;
}

add_filter('tc_credits_display', 'my_custom_credits');
function my_custom_credits(){ 
	$credits = 'We Love You';
	$newline_credits = '';
	return 
	'<div class="span4 credits">
    	<p>
    	&copy; '.esc_attr( date( 'Y' ) ).' <a href="'.esc_url( home_url() ).'" title="'.esc_attr(get_bloginfo()).'
    	" rel="bookmark">'.esc_attr(get_bloginfo()).'</a> &middot; '.($credits ? $credits : 'Designed by <a href="http://www.themesandco.com/">Themes &amp; Co</a>').' &middot;'
    	.($newline_credits ? '<br />&middot; '.$newline_credits.' &middot;' : '').
    	'</p>        
    </div>';
}

?>