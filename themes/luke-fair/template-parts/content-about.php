<section id="about-me" class="section section-about">
    <div class="bio-container">
        <div class="wrapper">

            <p>As a creative in the audio industry, I have a technical and emotional</p>
            <p><em> obsession with sound.</em></p>
            <p>How should your music feel? <a class="about-link" href="<?php echo esc_url(site_url('/#contact-form'))?>"> Let's talk about it.</a></p>
        </div> <!-- end of inner wrapper -->
    </div> <!-- end of bio container-->
    <div class="testimonial-container">
        <div class="wrapper">
            <?php
$testimonials = new WP_Query(
    array(
            'post_type'=>'testimonial',
            'posts_per_page'=> 2
    )
);
while ($testimonials->have_posts()):
    $testimonials->the_post(); ?>
            <div class="testimonial">
                <img
                    src="<?php echo get_template_directory_uri(). '/images/testimonial.svg'; ?>">
                <?php
    echo '<span class="said-by">' . get_field('said_by') . '</span>';
    echo '<p class="test"><span>' . get_the_content() . '</span></p>'; ?>
            </div>
            <?php
endwhile ?>
        </div> <!-- end of wrapper -->
    </div> <!-- end of testimonial container -->
</section>