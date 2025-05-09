<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo( 'name' ); ?> | <?php bloginfo( 'description' ); ?></title>
    <?php wp_head(); ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuToggle = document.getElementById('menu-toggle');
        const mainMenu = document.getElementById('expanded-main-menu');
        
        function toggleMenu() {
          const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
          mainMenu.classList.toggle('show');
          menuToggle.setAttribute('aria-expanded', String(!isExpanded));
        }

        menuToggle.addEventListener('click', toggleMenu);

        menuToggle.addEventListener('keydown', function (e) {
          if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            toggleMenu();
          }
        })
    });

    window.addEventListener('scroll', function () {
      console.log('scrolled')
      const mainMenu = document.getElementById('expanded-main-menu');
        if (mainMenu.classList.contains('show')) {
        mainMenu.classList.remove('show');
      }
    });
    </script>

</head>
<body <?php body_class(); ?>>
<header>
  <!-- Minimized Menu -->
  <nav>
      <img id="nav-logo" src="<?php my_theme_asset_url_e( '/assets/logos/CH_logo-print_white.png' ); ?>" alt="Cooper Hewitt Logo">
      <div class="minimized-menu">
        <h4 id="menu-title">MENU</h4>
        <svg id="menu-toggle" tabindex="0" aria-haspopup="true" aria-controls="sort-by" aria-expanded="false" width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g clip-path="url(#ffffffclip0_429_11066)"> <path d="M3 6.00092H21M3 12.0009H21M3 18.0009H21" stroke="#ffffff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path> </g> <defs> <clipPath id="clip0_429_11066"> <rect width="24" height="24" fill="white" transform="translate(0 0.000915527)"></rect> </clipPath> </defs> </g></svg>
      </div>
    </nav>
    <!-- Main Menu that will appear as dropdown -->
    <div id="expanded-main-menu" class="main-menu">
      <img id="expanded-nav-logo" src="<?php my_theme_asset_url_e( '/assets/logos/CH_logo-print_white.png' ); ?>" alt="Cooper Hewitt Logo">
        <?php
        wp_nav_menu([
            'theme_location' => 'primary',
            'container' => false,
            'menu_class' => 'menu-list'
        ]);
        ?>
    </div>
</header>

