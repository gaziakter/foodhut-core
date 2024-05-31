<?php 

// get all category 
function post_cat($category = 'category'){
    $categories = get_categories( array(
        'taxonomy' => $category,
        'orderby' => 'name',
        'order'   => 'ASC',
    ) );
    $cat_list = [];
    foreach($categories as $cat){
        $cat_list[$cat->slug] = $cat->name;
    }
    return $cat_list;
}

// get all post 
function get_all_post($post_type_name = 'post'){
    $posts = get_posts( array(
        'post_type' => $post_type_name,
        'orderby' => 'name',
        'order'   => 'ASC'
    ) );
    $posts_list = [];
    foreach($posts as $post){
        $posts_list[$post->ID] = $post->post_title;
    }
    return $posts_list;
}

// get cat slug and name 
function harry_get_cat_data($categories = [],$delimeter = ' ',$term = 'slug'){
    $slugs = [];
    foreach($categories as $cat){
        if ($term == 'slug'){
           array_push($slugs, $cat->slug);
        }
        if ($term == 'name'){
            $slugs[] =  $cat->name;
        }
    }
    return implode($delimeter, $slugs);
}


// Enqueue scripts
function google_maps_widget_scripts() {
    wp_enqueue_script( 'google-maps-api', 'https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY', array(), null, true );
    wp_enqueue_script( 'google-maps-widget', plugins_url( '/assets/js/google-maps-widget.js', __FILE__ ), array('jquery', 'google-maps-api'), null, true );
}
add_action( 'wp_enqueue_scripts', 'google_maps_widget_scripts' );