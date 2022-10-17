<?php get_template_part( 'template-parts/404/header', '404' ) ?>
    <div class="error-wrapper">
        <div class="error">
            <p class="error__text animate__animated animate__rollIn">Oops! Page not found <br>
                <a class="error__link" href="<?php echo home_url( '/' ) ?>">
                    Go to the main page ->
                </a>
            </p>
            <p class="error__error animate__animated animate__rollIn">404</p>
        </div>
    </div>
<?php get_template_part( 'template-parts/404/footer', '404' ) ?>