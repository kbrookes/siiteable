<div class="nav-compound nav-header">
    <div class="container">
        <div class="row justify-content-between <?php echo $headerColor; ?>">
            <div class="col-4 col-md-4 col-lg-3 d-flex align-items-center">
                <div class="navbar-brand mb-0 mr-0">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="style-svg">
                        <?php 
                           $custom_logo_id = get_theme_mod( 'custom_logo' );
                           $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                              ?>
                        <img class="img-fluid style-svg" src="<?php echo $image[0]; ?>" alt="">
                    </a>
                </div>
            </div>
            <div class="d-flex col-8 col-lg-9 justify-content-end align-items-center">
                <a href="/quote" class="btn-custom secondary font-weight-bold mr-md-4"><i class="fad fa-chevron-left"></i> REQUEST A QUOTE</a>
                <a href="https://linkedin.com/??" class="d-none d-md-flex text-white mr-4 nav-icon nav-icon__linkedin"><i class="fab fa-linkedin-in"></i></a>
                <a href="/contact" class="d-none d-md-flex text-white mr-4 nav-icon nav-icon__email"><i class="fad fa-envelope"></i></a>
                <a href="tel:0293323323" class="d-none d-md-flex text-white font-weight-bold nav-phone align-items-center"><i class="fad fa-phone-alt mr-md-1"></i><span class="d-none d-lg-inline"> 02 9332 3323</span></a>
                <button class="hamburger navbar-toggler navbar-toggler-right m-2 d-lg-none" onclick="this.classList.toggle('opened');this.setAttribute('aria-expanded', this.classList.contains('opened'))" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      <svg class="hamburger-icon" viewBox="0 0 100 100">
                        <path class="line line-1 hamburger-icon__stroke" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
                        <path class="line line-2 hamburger-icon__stroke" d="M 20,50 H 80" />
                        <path class="line line-3 hamburger-icon__stroke" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
                      </svg>
                </button>
            </div>
        </div>
    </div>
</div>
<nav id="main-nav" class="navbar navbar-compound navbar-expand-lg <?php echo $headerColor . ' ' . $headerBg . ' ' . $headerPosition . ' ' . $transparentForHero . ' ' . $headerType; ?> notScrolled">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarNav">
        <?php
        $args = array(
          'theme_location' => 'primary',
          'depth'      => 2,
          'container'  => false,
          'menu_class'     => 'navbar-nav',
          'walker'     => new Bootstrap_Walker_Nav_Menu()
          );
        if (has_nav_menu('primary')) {
          wp_nav_menu($args);
        }
        ?>
        <div class="d-flex d-md-none col align-items-center mb-4">
            <a href="/contact" class="text-primary mr-4 nav-icon nav-icon__email"><i class="fad fa-paper-plane"></i></a>
            <a href="tel:0293323323" class="text-primary font-weight-bold nav-phone"><i class="fad fa-phone-alt"></i> 02 9332 3323</a>
        </div>
      </div>

    </div>
</nav>