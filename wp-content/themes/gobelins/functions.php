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
            'slug' => 'evenement',
        )
    ));
});

/**
 * Scripts
 */
wp_enqueue_script('jquery');

show_admin_bar(false);