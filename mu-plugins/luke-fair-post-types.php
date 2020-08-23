<?php
function luke_fair_post_types()
{
    // Location Post Type
    register_post_type('testimonial', array(
        'capability_type'=> 'testimonial',
        'public' => true,
        'map_meta_cap'=>true,
        'supports' =>(array(
            'title','editor'
        )),
        'has_archive' => false,
        'labels'=> array(
            'name'=>'Testimonials',
            'add_new_item'=>'Add New Testimonial',
            'edit_item'=>'Edit Testimonials',
            'all_items'=>'All Testimonials',
            'singular_name'=>'Testimonial'
        ),
        'menu_icon'=> 'dashicons-format-quote',
    ));

    register_post_type('project', array(
        'public' => true,
        'capability_type'=> 'project',
        'map_meta_cap'=>true,
        'supports' =>(array(
            'title','editor','excerpt', 'thumbnail',
        )),
        'taxonomies'  => array( 'category' ),
        'has_archive' => false,
        'rewrite' => array('slug'=>'projects'),
        'labels'=> array(
            'name'=>'Projects',
            'add_new_item'=>'Add New Project',
            'edit_item'=>'Edit Projects',
            'all_items'=>'All Projects',
            'singular_name'=>'Project'
        ),
        'menu_icon'=> 'dashicons-format-audio',
    ));
}

add_action('init', 'luke_fair_post_types');

