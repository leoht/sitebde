<?php


add_action('init', function () {
   register_post_type('event', array(
        'labels' => array(
            'name' => 'Evènements',
            'singular_name' => 'Evenènement',
            'add_new_item' => 'Ajouter un évènement',
            'new_item' => 'Nouvel évènement',
        ),
        'public' => true,
        'rewrite' => array(
            'slug' => 'evenements',
        )
    ));
});

add_action('init', function () {
   register_post_type('bon-plan', array(
        'labels' => array(
            'name' => 'Bons plans',
            'singular_name' => 'Bon plan',
            'add_new_item' => 'Ajouter un bon plan',
            'new_item' => 'Nouveau bon plan',
        ),
        'public' => true,
        'rewrite' => array(
            'slug' => 'bons-plans',
        )
    ));
});


/**
 * Scripts
 */
wp_enqueue_script('jquery');

show_admin_bar(false);