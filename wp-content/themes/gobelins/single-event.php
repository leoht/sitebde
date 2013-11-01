<?php get_header() ?>

<div class="container-single" >
    <?php
        $eventDate = get_post_meta($post->ID, 'event_date', true);
        $eventDate = new DateTime($eventDate);

        $isUnknownDate = get_post_meta($post->ID, 'unknown_date', true);

        $backgroundImageUrl = wp_get_attachment_image_src(
                                get_post_meta($post->ID, 'background_image', true),
                            'full');

        $backgroundColor = get_post_meta($post->ID, 'background_color', true);

    ?>

    <div class="single" style="background-image: url(<?php echo $backgroundImageUrl[0]; ?>); background-color: <?php echo $backgroundColor ?>;" >

        <div class="single_infos" >
            <?php 
                $isUnknownPrice = get_post_meta($post->ID, 'unknown_price', true);
                $price = get_post_meta($post->ID, 'price', true);
                $guestPrice = get_post_meta($post->ID, 'price_guest', true);

                if (!$isUnknownPrice) {
                    if ($price > 0) {
                        ?>
                        <div class="prix" ><?php echo $price ?> €</div>
                        <div class="prix-info" >adhérents</div>

                        <?php if ($guestPrice > 0) { ?>
                        <div class="prix" ><?php echo $guestPrice ?> €</div>
                        <div class="prix-info" >non-adhérents</div>
                        <?php }
                    } else {
                        ?>
                        <div class="prix" >Gratuit</div>
                        <?php
                    }
                }
            ?>

            <div class="date" >
                <?php if (!$isUnknownDate) { ?>
                    Le <?php echo $eventDate->format('d/m/Y') ?>
                <?php } else { ?>
                    Coming soon
                <?php } ?>
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