<?php get_header();?>
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
        <?php get_sidebar() ?>
    </div>
</main>

<div class="content_comments">
    <?php comments_template(); ?>
<!--    <div class="title_comments">Коментарии ()</div>-->
<!--        <div class="container_comm">-->
<!---->
<!--            <img src="" alt="" class="comm_cont">-->
<!---->
<!--            <div>-->
<!---->
<!--                <div class="name_comment">-->
<!--                        <div style="color:red">ADMIN</div>-->
<!---->
<!--                </div>-->
<!--                <div class="text_comm_cont"></div>-->
<!--                <div class="time_comm"></div>-->
<!--                    <a style="color: red;font-weight: 900;font-size: 12px;margin-top: 10px;" href="">Delete</a>-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--    <form style="margin-top: 65px;" action="/actionAddComment" class="from_comments" method="post">-->
<!---->
<!--        <h2 style="">, оставьте комментарий</h2>-->
<!---->
<!--            <div class="flex">-->
<!--                <img src="/project/img/" alt="" class="comm_cont">-->
<!--                <input type="text" name="text" placeholder="добавить коментарий" id="" class="text_comm" required>-->
<!--            </div>-->
<!---->
<!--            <input type="hidden" name="name" class="text_comm" value="">-->
<!--            <input type="hidden" name="img" value="" />-->
<!--            <input type="hidden" name="page_id" value="" />-->
<!--            <input type="submit" value="Отправить" class="sub_comm">-->
<!--    </form>-->
</div>



<?php get_footer()?>
