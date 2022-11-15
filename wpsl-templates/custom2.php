<?php 
global $wpsl_settings, $wpsl;

$output         = $this->get_custom_css(); 
$autoload_class = ( !$wpsl_settings['autoload'] ) ? 'class="wpsl-not-loaded"' : '';
$output .= '<div id="wpsl-wrap" class="wpsl-store-below">' . "\r\n";

$output .= '<div class="wpsl-combine-container">' . "\r\n"; //wpsl-combine-container
$output .= '<div class="wpsl-combine-inner">' . "\r\n"; //wpsl-combine-inner
$output .= "\t" . '<div class="wpsl-search wpsl-clearfix ' . $this->get_css_classes() . '">' . "\r\n";
$output .= get_field('search_content');
$output .= "\t\t" . '<div id="wpsl-search-wrap">' . "\r\n";
$output .= "\t\t\t" . '<form autocomplete="off">' . "\r\n";
if( is_page('checkout-change-location') ) {
    $output .= "\t\t\t" . '<h3>Start YOUR SEARCH Here</h3>' . "\r\n";
}
else {
    $output .= "\t\t\t" . '<h1>STD Testing Near You</h1>' . "\r\n";
}
if( is_page('std-testing-near-you') ) {
    $output .= "\t\t\t" . "<p>Are you looking for a clinic where you can get fast and private tests for STD? You've come to the right place.</p>" . "\r\n";
}
$output .= "\t\t\t" . '<div class="wpsl-input-combine">' . "\r\n";
$output .= "\t\t\t" . '<div class="wpsl-input">' . "\r\n";

if( isset( $_GET['zip_search'] ) ) {
    $output .= "\t\t\t\t" . '<input id="wpsl-search-input" type="text" value="' . $_GET['zip_search'] . '" name="wpsl-search-input" placeholder="Enter ZIP Code" aria-required="true" />' . "\r\n";
}
else {
$output .= "\t\t\t\t" . '<input id="wpsl-search-input" type="text" value="' . apply_filters( 'wpsl_search_input', '' ) . '" name="wpsl-search-input" placeholder="Enter ZIP Code" aria-required="true" />' . "\r\n";
}

$output .= "\t\t\t" . '</div>' . "\r\n";

if ( $wpsl_settings['radius_dropdown'] || $wpsl_settings['results_dropdown']  ) {
    $output .= "\t\t\t" . '<div class="wpsl-select-wrap">' . "\r\n";

    if ( $wpsl_settings['radius_dropdown'] ) {
        $output .= "\t\t\t\t" . '<div id="wpsl-radius">' . "\r\n";
        $output .= "\t\t\t\t\t" . '<label for="wpsl-radius-dropdown">' . esc_html( $wpsl->i18n->get_translation( 'radius_label', __( 'Search radius', 'wpsl' ) ) ) . '</label>' . "\r\n";
        $output .= "\t\t\t\t\t" . '<select id="wpsl-radius-dropdown" class="wpsl-dropdown" name="wpsl-radius">' . "\r\n";
        $output .= "\t\t\t\t\t\t" . $this->get_dropdown_list( 'search_radius' ) . "\r\n";
        $output .= "\t\t\t\t\t" . '</select>' . "\r\n";
        $output .= "\t\t\t\t" . '</div>' . "\r\n";
    }

    if ( $wpsl_settings['results_dropdown'] ) {
        $output .= "\t\t\t\t" . '<div id="wpsl-results">' . "\r\n";
        $output .= "\t\t\t\t\t" . '<label for="wpsl-results-dropdown">' . esc_html( $wpsl->i18n->get_translation( 'results_label', __( 'Results', 'wpsl' ) ) ) . '</label>' . "\r\n";
        $output .= "\t\t\t\t\t" . '<select id="wpsl-results-dropdown" class="wpsl-dropdown" name="wpsl-results">' . "\r\n";
        $output .= "\t\t\t\t\t\t" . $this->get_dropdown_list( 'max_results' ) . "\r\n";
        $output .= "\t\t\t\t\t" . '</select>' . "\r\n";
        $output .= "\t\t\t\t" . '</div>' . "\r\n";
    }
    
    $output .= "\t\t\t" . '</div>' . "\r\n";
}

if ( $this->use_category_filter() ) {
    $output .= $this->create_category_filter();
}
 
$output .= "\t\t\t\t" . '<div class="wpsl-search-btn-wrap"><button id="wpsl-search-btn"><i class="fa fa-search" aria-hidden="true"></i></button></div>' . "\r\n";
$output .= "\t\t" . '</div>' . "\r\n"; // Input combine
$output .= "\t\t" . '</form>' . "\r\n";
$output .= "\t\t" . '</div>' . "\r\n";
$output .= "\t" . '</div>' . "\r\n";

$output .= "\t" . '<div id="wpsl-result-list">' . "\r\n";
$output .= "\t\t" . '<div id="wpsl-stores" '. $autoload_class .'>' . "\r\n";
$output .= "\t\t\t" . '<ul><li class="default">Please Enter your zip code above and press Search icon to see results here.</li></ul>' . "\r\n";
$output .= "\t\t" . '</div>' . "\r\n";
$output .= "\t" . '</div>' . "\r\n";
$output .= '</div>' . "\r\n"; //wpsl-inner
$output .= '</div>' . "\r\n"; //wpsl-combine-container
    
if ( $wpsl_settings['reset_map'] ) { 
    $output .= "\t" . '<div class="wpsl-gmap-wrap">' . "\r\n";
    $output .= "\t\t" . '<div id="wpsl-gmap" class="wpsl-gmap-canvas"></div>' . "\r\n";
    $output .= "\t" . '</div>' . "\r\n";
} else {
    $output .= "\t" . '<div id="wpsl-gmap" class="wpsl-gmap-canvas"></div>' . "\r\n";
}




$output .= '</div>' . "\r\n";


return $output;
?>