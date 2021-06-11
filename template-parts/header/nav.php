<nav id="main-nav" class="navbar <?php echo $headerColor . ' ' . $headerBg . ' ' . $headerPosition . ' ' . $transparentForHero . ' ' . $headerType; ?> notScrolled nav-type__fullscreen">
    <div class="container">
        <div class="navbar-brand mb-0">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="style-svg">
                <?php 
                   $custom_logo_id = get_theme_mod( 'custom_logo' );
                   $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                      ?>
                <img class="img-fluid style-svg" src="<?php echo $image[0]; ?>" alt="">
            </a>
        </div>
        <div class="nav-content d-flex align-items-center">
            <a href="/contact" class="btn-custom primary">CONTACT</a>
            <button class="hamburger navbar-toggler navbar-toggler-right" onclick="this.classList.toggle('opened');this.setAttribute('aria-expanded', this.classList.contains('opened'))" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <svg class="hamburger-icon" viewBox="0 0 100 100">
                    <path class="line line-1 hamburger-icon__stroke" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
                    <path class="line line-2 hamburger-icon__stroke" d="M 20,50 H 80" />
                    <path class="line line-3 hamburger-icon__stroke" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
                  </svg>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarNav">
            <?php
            $args = array(
              'theme_location' => 'primary',
              'depth'      => 2,
              'container'  => false,
              'menu_class'     => 'navbar-nav ml-auto',
              'walker'     => new Bootstrap_Walker_Nav_Menu()
              );
            if (has_nav_menu('primary')) {
              wp_nav_menu($args);
            }
            ?>
        </div>
    </div>
</nav>