<?php
/**
Author: Rakesh Mistry
Description: Rotary Theme Wordpress Functions
Version: 0.1
 */


/**
 * Display Member Duties in the Event Calendar, provides parameter option to display duties in a table or description list.
 * @param bool|false $dlist
 */
function display_duties($dlist=false)
{

    $event_id = get_the_ID();

    $data = get_post_meta($event_id);

    $filter_keys = array_filter(array_keys($data), function ($k) {
        return $k[0] != '_';
    });

    $duties_list = array_intersect_key($data, array_flip($filter_keys));

    if($dlist){

        foreach ($duties_list as $key => $value) {

            echo '<dt>' . $key . '</dt>';
            echo '<dd><abbr class="tribe-events-abbr updated published dtstart">' . $value[0] . '</abbr></dd>';
        }

    }else{

        echo '<div class="tribe-events-event-meta-duties"><h4>Club Duties</h4><table><thead><tr><th>Club Duty</th><th>Member</th></tr></thead><tbody>';

        foreach ($duties_list as $key => $value) {

            echo '<tr><td>' . $key . '&nbsp;</td><td>'. $value[0] . '&nbsp;</td></tr>';
        }

        echo '</tbody></table></div>';

    }

}

/**
 * Get a List of Duties inside post loop for Events Calendar
 * @return array
 */
function get_duties(){

    $event_id = get_the_ID();

    $data = get_post_meta($event_id);

    $filter_keys = array_filter(array_keys($data), function ($k) {
        return $k[0] != '_';
    });

    $duties_list = array_intersect_key($data, array_flip($filter_keys));

    return $duties_list;
}

/**
 * Format Event Display Time
 * @param $start_time_date - Timestamp
 * @param $finish_time_date - Timestamp
 */
function display_event_date_time($start_time_date, $finish_time_date)
{

    echo '<span class="date">' . date("l j F Y", strtotime($start_time_date)) . '</span><br>';
    echo '<span class="time">' . date("g:i a", strtotime($start_time_date)) . ' - ' . date("g:i a", strtotime($finish_time_date)) . '</span>';

}


/**
 * Modify Excerpt Post Length
 * @param $length
 * @return int
 */
function custom_excerpt_length($length)
{

    return 50;
}

add_filter('excerpt_length', 'custom_excerpt_length', 999);

add_filter( "the_excerpt", "add_class_to_excerpt" );

/**
 * Add custom class to post excerpts
 * @param $excerpt
 * @return mixed
 */
function add_class_to_excerpt( $excerpt ) {
    return str_replace('<p', '<p class="excerpt clearfix"', $excerpt);
}

/**
 * Modify Excerpt Post Link
 * @param $more
 * @return string
 */
function new_excerpt_more($more) {
    global $post;
    return '...<a class="btn btn-default read-more-project" href="'. get_permalink($post->ID) . '">read more</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

add_action('after_setup_theme', 'remove_parent_theme_features', 10 );


/**
 * Creates Rotary Widget for displaying projects on home page
 */
function rotary_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'sparkling' ),
        'id'            => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'id'            => 'home-widget-1',
        'name'          => esc_html__( 'Homepage Widget 1', 'sparkling' ),
        'description'   => esc_html__( 'Displays on the Home Page', 'sparkling' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="page-header"><h2 class="rotary-heading">',
        'after_title'   => '</h2></div>',
    ));

    register_sidebar(array(
        'id'            => 'home-widget-2',
        'name'          => esc_html__( 'Homepage Widget 2', 'sparkling' ),
        'description'   => esc_html__( 'Displays on the Home Page', 'sparkling' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="page-header"><h2 class="rotary-heading">',
        'after_title'   => '</h2></div>',
    ));

    register_sidebar(array(
        'id'            => 'home-widget-3',
        'name'          =>  esc_html__( 'Homepage Widget 3', 'sparkling' ),
        'description'   =>  esc_html__( 'Displays on the Home Page', 'sparkling' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widgettitle">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'id'            => 'footer-widget-1',
        'name'          =>  esc_html__( 'Footer Widget 1', 'sparkling' ),
        'description'   =>  esc_html__( 'Used for footer widget area', 'sparkling' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widgettitle">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'id'            => 'footer-widget-2',
        'name'          =>  esc_html__( 'Footer Widget 2', 'sparkling' ),
        'description'   =>  esc_html__( 'Used for footer widget area', 'sparkling' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widgettitle">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'id'            => 'footer-widget-3',
        'name'          =>  esc_html__( 'Footer Widget 3', 'sparkling' ),
        'description'   =>  esc_html__( 'Used for footer widget area', 'sparkling' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widgettitle">',
        'after_title'   => '</h3>',
    ));

    register_widget( 'sparkling_social_widget' );
    register_widget( 'sparkling_popular_posts' );
    register_widget( 'sparkling_categories' );
}





