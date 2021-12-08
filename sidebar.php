<?php $the_query = new WP_Query( 'posts_per_page=10' ); ?>
<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
<div class="col_n_c">
    <div class="time_rec"><?php the_time("H:i"); ?></div>
    <a style="color: black;" href="<?php the_permalink(); ?>">
        <div class="title_rec"><?php the_title(); ?></div>
    </a>
</div>
<?php endwhile; wp_reset_postdata(); ?>
