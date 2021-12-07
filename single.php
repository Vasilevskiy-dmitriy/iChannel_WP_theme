<?php get_header();?>
<?php get_sidebar() ?>
<?php
$arr_cat = get_the_category(NULL);
$arr_cat = $arr_cat[0];

$arr_link = $arr_cat->slug;
$arr_cat = $arr_cat->name;
?>

<main style="display: flex;">

    <div class="container_news">
        <?php while ( have_posts() ): the_post(); ?>
        <div class="title_news"><?php the_title() ?></div>

        <div style="margin:20px 0; display:flex;">
            <a href="/category/<?php echo $arr_link?>" class="tegs" style="background: gray;color: black;font-weight: 900;padding: 3px 10px;">
                #<?=$arr_cat?>
            </a>
            <div style="background: gray;color: black;font-weight: 900;padding: 3px 3px 3px 0;">/</div>
            <div style="background:gray;color:white;font-weight: 100;padding: 3px 10px 0 0;" class="time_news">
                <?php echo get_post_time('Y-M-d H:m') ?>
            </div>
        </div>

        <div class="text_news"><?php the_content(); ?></div>
        <?php endwhile; ?>
    </div>

    <div class="container_news_recomend">

<!--            <div class="col_n_c">-->
<!--                <div class="time_rec"></div>-->
<!--                <a style="color: black;" href="">-->
<!--                    <div class="title_rec"></div>-->
<!--                </a>-->
<!--            </div>-->
    </div>

</main>

<?php get_footer()?>
