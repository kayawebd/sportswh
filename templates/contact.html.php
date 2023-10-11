<div class="contactPage-background" id="contactPage">
    <div class="siteWrapper">
        <!-- css: FormStyle  js:formValidation -->
        <h1 class="sr-only">Sports warehouse contact page</h1>
        <div class="contactPage">
            <section class="contactDetails">
                <h2 class="title">
                    Contact us
                </h2>
                <address>
                    <ul>
                        <li class="phone"><a href="tel:+61299887766"><i class="fa-solid fa-phone"></i> 02 1234 5678</a></li>
                        <li class="email"><a href="mailto:info@sportswarehouse.com"><i class="fa-solid fa-envelope"></i> info@sportswarehouse.com</a></li>
                        <li class="address"><a href="https://www.google.com/maps/place/Sydney+NSW/@-33.8482439,150.9319747,10z/data=!3m1!4b1!4m6!3m5!1s0x6b129838f39a743f:0x3017d681632a850!8m2!3d-33.8688197!4d151.2092955!16zL20vMDZ5NTc?entry=ttu" target="_blank"><i class="fa-sharp fa-solid fa-location-dot"></i> 123 Sports Rd Sydney NSW 1000</a></li>
                    </ul>
                </address>
                <div class="socialMedia">
                    <a href="https://www.facebook.com/" target="_blank"><span class="social-icon"><i class="fa-brands fa-facebook-f "></i></span>
                        <p>Facebook</p>
                    </a>
                    <a href="https://twitter.com/" target="_blank"><span class="social-icon"><i class="fa-brands fa-twitter "></i></span>
                        <p>Twitter</p>
                    </a>
                    <a href="https://mail.google.com/" target="_blank"><span class="social-icon"><i class="fa-solid fa-paper-plane "></i></span>
                        <p>Other</p>
                    </a>
                </div>
            </section>

            <div class="formStyle contactForm">
                <form id="contactForm" name="contactForm" action="sendEmail.php" method="post">
                    <h2 class="sr-only">
                        message
                    </h2>

                    <div class="inputsContainer">
                        <div class="inputs">
                            <!-- <label class="input-label" for="name">Name</label> -->
                            <input type="text" id="name" name="name" placeholder="Name">
                        </div>
                        <small></small>
                    </div>

                    <div class="inputsContainer">
                        <div class="inputs">
                            <!-- <label class="input-label" for="email">Email</label> -->
                            <input type="text" id="email" name="email" placeholder="Email">
                        </div>
                        <small></small>
                    </div>

                    <div class="inputsContainer message">
                        <div class="inputs">
                            <!-- <label class="input-label" for="message">Message</label> -->
                            <textarea name="message" id="message" cols="20" rows="8" placeholder="Message"></textarea>
                            <div id="charCount"></div>
                        </div>
                        <small></small>
                    </div>


                    <div class="form__buttonWrapper">
                        <button type="submit" id="submitContactForm" class="form__submitButton" name="submit">
                            <span>Submit</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>