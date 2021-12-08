<?php get_header();?>

    <title><?php bloginfo('name')?></title>
    <main>
        <div class="news">
            <div class="title_main"><?php echo get_search_query(); ?></div>
            <div class="container">
                <?php while ( have_posts() ): the_post(); ?>
                    <div class="col">
                        <div class="time"><?php echo get_post_time('H:m') ?></div>
                        <div class="text_container">
                            <a style="color: black;" href="<?php the_permalink();?>"> <div class="title_container"><?php the_title() ?></div></a>
                            <a style="color: black;" href="<?php the_permalink();?>"><?php echo kama_excerpt( [ 'maxchar'=>100 ] ); ?></a>
                            <div class="tags">
                                <a href="" class="tegs"> #<?php the_category(", \n"); ?></a>
                            </div>
                        </div>
                        <img src="" alt="" style="height: 100px; width:100px">
                    </div>

                <?php endwhile; ?>

            </div>
    </main>


<?php get_footer()?>