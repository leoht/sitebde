<?php

function gob_pagination($page, $nbPages)
{
    if ($page > 1) { ?>
    <a class="next_page" href="<?php bloginfo('url') ?>?page=<?php echo $page-1 ?>" >&lt; Précédent</a>
    <?php } ?>
    <?php if ($page > 1 && $page < $nbPages) { ?>
     -
    <?php } ?>
    <?php if ($page < $nbPages) { ?>    
    <a class="next_page" href="<?php bloginfo('url') ?>?page=<?php echo $page+1 ?>" >Suivant &gt;</a>
    <?php } 
}


function generate_post_tag($type)
{
    $tag = '<br />';

    switch ($type) {
        case 'event':
            $tag .= '<span class="event-tag" >évènement</span>';
            break;
        case 'bon-plan':
            $tag .= '<span class="bonplan-tag" >bon plan !</span>';
            break;
    }

    return $tag;
}

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