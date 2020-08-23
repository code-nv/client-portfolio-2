<?php get_header(); 
get_template_part('template-parts/content','banner');
?>
<main>
<?php 
get_template_part('template-parts/content','about');
get_template_part('template-parts/content','work');
get_template_part('template-parts/content','contact')?>
</main>
<?php get_footer();
