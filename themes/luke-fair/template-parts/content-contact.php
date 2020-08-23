<section id="contact" class="section section-contact">
    <div class="contact-card">
        <div class="wrapper">
            <div class="contact-container">
            <h3>Luke Fair</h3> <a href="https://www.instagram.com/lukefair/" target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram" aria-hidden="true"></i><span class="sr-only">instagram link</span></a>
            <p>Audio Engineer based near Toronto, Ontario.</p>
            <a class="email-link" href="mailto:luke.r.fair@gmail.com" target="_blank" rel="noopener noreferrer">luke.r.fair@gmail.com</a>
            </div>
        </div>
        <img src="<?php echo get_template_directory_uri(). '/images/portrait.png'; ?>">
    </div>
    <div class="contact-form">
        <div class="wrapper">
            <h2 id="contact-form" >Contact Me</h2>
            <form  action="https://formspree.io/myynanll" method="POST" name="contact_form">
                <label for="email" class="sr-only">email</label>
                <input type="email" name="email" id="email" placeholder="email">
                <label for="message" class="sr-only">message</label>
                <textarea name="message" id="message" placeholder="message"></textarea>
                <input class="submit" type="submit" value="Send it">
            </form>
        </div>
    </div>
</section>