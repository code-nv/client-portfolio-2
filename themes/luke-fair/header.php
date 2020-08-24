    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- <meta http-equiv="refresh" content="5"> -->
        <!-- <title>Luke Fair</title> -->
        <?php wp_head(); ?>
    </head>

    <body>
        <section class="hero">
            <header id="home">
                <div class="wrapper">
                    <div class="header-image-container">
                        <img class="header-image"
                            src="<?php echo esc_url(get_theme_file_uri('/images/header-image.svg'))?>"
                            alt="Mastering meter">
                    </div>
                    <div class="title-container">
                        <h1 class="sr-only">Luke Fair: audio engineer, mix, master.</h1>
                        <h2 class="sr-only">audio engineer / mix / master</h2>
                        <img class="subtitle-image"
                            src="<?php echo esc_url(get_theme_file_uri('/images/title.svg'))?>"
                            alt="Luke Fair" aria-hidden="true">
                        <img class="subtitle-image"
                            src="<?php echo esc_url(get_theme_file_uri('/images/subtitle.svg'))?>"
                            alt="audio engineer / mix / master" aria-hidden="true">
                    </div>
                </div> <!-- end of wrapper -->
            </header>
            <aside>
                <nav>
                    <ul>
                        <li class="about-link">
                            <a
                                href="<?php echo esc_url(site_url('/#about-me'))?>">About</a>
                        </li>
                        <li class="work-link">
                            <a
                                href="<?php echo esc_url(site_url('/#work'))?>">Work</a>
                        </li>
                        <li class="contact-link">
                            <a
                                href="<?php echo esc_url(site_url('/#contact'))?>">Contact</a>
                        </li>
                    </ul>
                </nav>
            </aside>
            <a class="fixed-email"
                href="<?php echo esc_url(site_url('/#contact-form'))?>">
                <img src="<?php echo esc_url(get_theme_file_uri('/images/email.svg'))?>"
                    alt="click to email me directly"></a>
        </section>