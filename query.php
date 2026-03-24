<?php
// WP_Query arguments
$args = array(
    'post_type'              => array('post'), // use any for any kind of post type, custom post type slug for custom post type
    'post_status'            => array('publish'), // Also support: pending, draft, auto-draft, future, private, inherit, trash, any
    'posts_per_page'         => -1, // use -1 for all post
    'order'                  => 'DESC', // Also support: ASC
    'orderby'                => 'date', // Also support: none, rand, id, title, slug, modified, parent, menu_order, comment_count
    'tax_query'                    => [
        'relation' => 'OR',
        [
            'relation' => 'AND',
            [
            'taxonomy' => 'category',
            'field' => 'slug',
            'terms' => ['cat-1'],
            'operator' => 'IN'
            ],
            [
            'taxonomy' => 'category',
            'field' => 'slug',
            'terms' => ['cat-2'],
            'operator' => 'IN'
            ]
        ],
        [
            'relation' => 'AND',
            [
            'taxonomy' => 'category',
            'field' => 'slug',
            'terms' => ['cat-2'],
            'operator' => 'IN'
            ],
            [
            'taxonomy' => 'category',
            'field' => 'slug',
            'terms' => ['cat-3'],
            'operator' => 'IN'
            ]
        ]
    ]
);

// The Query
$query = new WP_Query($args);
$i = 1; 

// The Loop 
if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
        // do something
        echo 'Title ' . $i . ': ' . get_the_title() . '<br>';
        $i++;
    }
} else {
    // no posts found
    echo 'No post found';
}

// Restore original Post Data
wp_reset_postdata();