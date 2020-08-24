<footer>
    <a href="https://www.nickreyno.com" target="_blank" rel="noopener noreferrer">© 2020 Created by  Nick Reyno</a>
    <button class="hamburger-button">
                <span class="span span-one"></span>
                <span class="span span-two"></span>
                <span class="span span-three"></span>
            </button>
            <nav class="hamburger-nav">
                <div class="wrapper">
                    <h2><a class="home-hamburger-link"
                                href="<?php echo esc_url(site_url('/#'))?>"><span>Luke</span> Fair</a></h2>
                    <button class="hamburger-close"><i class="fas fa-times" aria-hidden="true"></i><span class="sr-only">close menu</span></button>
                    <ul>
                        <li class="about-link-hamburger">
                            <a
                                href="<?php echo esc_url(site_url('/#about-me'))?>">About</a>
                        </li>
                        <li class="work-link-hamburger">
                            <a
                                href="<?php echo esc_url(site_url('/#work'))?>">Work</a>
                        </li>
                        <li class="contact-link-hamburger">
                            <a
                                href="<?php echo esc_url(site_url('/#contact'))?>">Contact</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="hamburger-dimmer"></div>
</footer>
<?php
wp_footer();
?>
</body>
</html>