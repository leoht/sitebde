<?php get_header(); ?>

    <div class="home_slider" >
        <?php $query = new WP_Query(array(
            'post_type' => array('event', 'post'),
            'order' => 'ASC',
            'meta_key' => 'event_date',
            'order_by' => 'meta_value',
            'posts_limit' => 3,
        ));
        $i = 1;

        while ($query->have_posts()) : 
            $query->the_post();


            $eventDate = get_post_meta($post->ID, 'event_date', true);
            $eventDate = new DateTime($eventDate);

            $isUnknownDate = get_post_meta($post->ID, 'unknown_date', true);

            $backgroundImageUrl = wp_get_attachment_image_src(
                                    get_post_meta($post->ID, 'background_image', true),
                                'full');

            $backgroundColor = get_post_meta($post->ID, 'background_color', true);

        ?>
            <div class="home_slider_item" data-item="<?php echo $i ?>" style="background-image: url(<?php echo $backgroundImageUrl[0]; ?>); background-color: <?php echo $backgroundColor ?>;
                        <?php if($i > 1): ?>left: <?php echo ($i-1)*100 ?>%; <?php endif ?> ">

                <div class="home_slider_item_container">
                    <div class="home_slider_item_content" >
                        <div class="date" >
                            <?php if (!$isUnknownDate) { ?>
                                <span class="day" ><?php echo $eventDate->format('d')  ?></span><br />
                                <span class="month" ><?php echo $eventDate->format('M')  ?></span><br />
                                <span class="year" ><?php echo $eventDate->format('Y')  ?></span>
                                <?php } else { ?>
                                    <span class="avenir-1" >coming</span><br />
                                    <span class="avenir-2" >really really</span><br />
                                    <span class="avenir-3" >soon</span>
                                <?php } ?>
                        </div>
                        <h1><a href="<?php echo get_permalink() ?>" ><?php echo get_the_title() ?></a></h1>

                        <p class="excerpt" >
                            <?php echo get_the_excerpt() ?>
                        </p>
                        
                    </div>
                </div>
            </div>
    <?php $i++;
        endwhile; wp_reset_postdata(); ?>

        <div class="slider_controls" >
            <div class="slider_controls_container" >
            <?php for ($j = 1 ; $j < $i; $j++) { ?>

                <img src="<?php bloginfo('template_url') ?>/images/slider-btn.png" class="slider_controls_button" data-slide="<?php echo $j ?>" />
            <?php } ?>
            </div>

            <div class="scroll" >

        </div>
        </div>
        
        <div class="home_button" >
            <a href="#" >adhérer (10 €)</a>
        </div>


    </div>

<div class="container" >

    <div class="home_news" id="news" >
        <?php

        $nbPosts = wp_count_posts('post')->publish + wp_count_posts('event')->publish;

        $posts_per_page = 6;

        $nbPages = ceil($nbPosts / $posts_per_page); 

        $page = isset($_GET['page']) && ($_GET['page'] > 0 && $_GET['page'] <= $nbPages) ? (int) $_GET['page'] : 1;

        $offset = ($page-1) * $posts_per_page;

        $query = new WP_Query(array(
                'post_type' => array('event', 'post', 'bon-plan'),
                'posts_per_page' => $posts_per_page,
                'offset' => $offset,
            ));

        

        $nextPage = $page+1;

        while ($query->have_posts()) :
            $query->the_post();


            $backgroundImageUrl = wp_get_attachment_image_src(
                                        get_post_meta($post->ID, 'background_image', true),
                                    'full');

            $date = new DateTime($post->post_date);

            $backgroundColor = get_post_meta($post->ID, 'background_color', true);
        ?>
            <div class="home_news_single" >
                <div class="home_news_single_image" style="background-color: <?php echo $backgroundColor ?>;" >
                    <img src="<?php echo $backgroundImageUrl[0] ?>" />
                </div>
                <div class="home_news_single_content" >
                    <div class="date" >
                        posté le<br /><br />
                        <span class="day" ><?php echo $date->format('d')  ?></span><br />
                        <span class="month" ><?php echo $date->format('M')  ?></span><br />
                        <span class="year" ><?php echo $date->format('Y')  ?></span>
                    </div>
                    <h1><a href="<?php echo get_permalink() ?>" ><?php echo get_the_title() ?></a>
                    <?php echo generate_post_tag($post->post_type) ?></h1>
                    <p>
                        <?php echo get_the_excerpt() ?>
                    </p>
                    <a href="<?php echo get_permalink() ?>" class="more" >voir en entier</a> 
                </div>
                

            </div>

            <div class="clear" ></div>

           
        <?php
        endwhile;
        wp_reset_postdata();

        ?>

            
    </div>

        <p class="pagination_links" >
            <?php echo gob_pagination($page, $nbPages) ?>
        </p>

<?php get_footer(); ?>