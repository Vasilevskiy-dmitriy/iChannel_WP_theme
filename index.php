<?php get_header();?>
<!--CONTENT-->

    <title>Information channel</title>

    <div class="container_strat">
        <div class="left_content">
            <div class="text_information">
                <h1 class="h1_inform">
                    <?php bloginfo('name'); ?>
                </h1>
                <div class="text_info">
                    <p style=" font-size:16px; margin-bottom: 10px;">Добро пожаловать </p>
                    <p>Информационный канал создан специально по инициативе лучших умов мира. Он явлет собой невероятный и абсолютный источник информации в СНГ, а вдальнейшем, и во всем мире !</p>
                </div>
            </div>
        </div>

        <div class="right_content">

            <div class="content_news_main">

                <div class="title_main">
                    Last news
                </div>

                <div class="container">
                    <?php while ( have_posts() ): the_post(); ?>

                        <div class="col">
                            <div class="time"><?php echo get_post_time('H:m') ?></div>

                            <div class="text_container">
                                <a style="color: black;" href="<?php  echo get_permalink() ?>">
                                    <div class="title_container"><?php the_title(); ?></div>
                                </a>
                                <div class="tags">
                                    <a href="" class="tegs">
                                        #<?php the_category(NULL) ?>
                                    </a>
                                    <div class="tegs" style="float: right;">

                                    </div>
                                </div>
                            </div>

                            <img src="" alt="" style="height: 100px; width:100px">

                        </div>

                    <?php endwhile; ?>
                </div>

            </div>

        </div>
    </div>


<?php get_footer();?>
