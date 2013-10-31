<?php get_header() ?>

<div class="container-single" >
    <?php
        $eventDate = get_post_meta($post->ID, 'event_date', true);
        $eventDate = new DateTime($eventDate);

        $backgroundImageUrl = wp_get_attachment_image_src(
                                get_post_meta($post->ID, 'background_image', true),
                            'full');

        $backgroundColor = get_post_meta($post->ID, 'background_color', true);

    ?>

    <div class="single" style="background-image: url(<?php echo $backgroundImageUrl[0]; ?>); background-color: <?php echo $backgroundColor ?>;" >

        <div class="single_infos" >
            <?php 
                $price = get_post_meta($post->ID, 'price', true);
                if ($price > 0) {
                    ?>
                    <div class="prix" ><?php echo $price ?> €</div>
                    <?php
                } else {
                    ?>
                    <div class="prix" >Gratuit</div>
                    <?php
                }
            ?>

            <div class="date" >
                Le <?php echo $eventDate->format('Y/m/d') ?>
            </div>
            
        </div>

        <div class="single_content" >
            <h1><?php echo get_the_title() ?></h1>

            <?php the_content() ?>

            <p>
                <a href="<?php bloginfo('url') ?>" class="home">Retour à la home</a>
            </p>
        </div>
    </div>
<?php get_footer() ?>