<?php
/* Template Name: Single Page template */

    get_header();
?>
<h4>Benefits of joining the&nbsp;team</h4>
<hr class="short-divider">
<section class="grid-wrap icon-grid-block">

    <div class="grid-wrap">
        <?php echo do_shortcode("[benefits-list]"); ?>
    </div>
</section>

<?php get_footer(); ?>