<?php
wp_reset_query();

$project = new WP_Query(array(
    'post_type' => 'project',
    'posts_per_page' => '12',
    'meta_key' => 'page_placement',
    'meta_type' => 'NUMERIC',
    'orderby' => 'meta_value',
    'order' => 'DESC'
));
?>
<section id="work" class="section section-work">
    <div class="wrapper">
        <h2>Selected Work</h2>
        <a class="work work-link"
            href="<?php echo esc_url(site_url('/#contact-form'))?>">contact
            me for more and unreleased work</a>
        <div class="work-grid">
            <?php
while ($project->have_posts()) {
    $project->the_post();
    $external_link = get_field('project_link');
    if (!$external_link) {
        $external_link = "#";
    } ?>
            <div class="project-container">
                <a href="<?php echo esc_url($external_link); ?>"
                    <?php
                    $external_link != '#' ? $link = 'target="_blank" rel="noopener noreferrer"' : $link = 'onclick="return false" class="no-link"';
    echo $link; ?>>
                    <i class=" link-icon fas fa-external-link-alt" aria-hidden="true"></i>
                    <?php the_post_thumbnail(); ?>
                    <div class="info">
                        <h4><?php the_title(); ?>
                        </h4>
                        <p> <?php echo strip_tags(get_the_category_list(' / ')); ?>
                        </p>
                    </div>
                </a>
            </div>
            <?php
}
?>
        </div>
    </div>
</section>