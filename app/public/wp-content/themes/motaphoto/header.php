<!doctype html>
<html <?php language_attributes(); ?>>

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
       <meta name="viewport" content="width=device-width, initial-scale=1" />
       <title>Nathalie Mota</title>
       <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    
    <?php wp_body_open(); ?>
       <header class="header">
              <div class="header__logo header__logo__desktop" <?php if ( function_exists( 'the_custom_logo' ) ) {
              the_custom_logo(); } ?> </div> 
              <div class="header__burger" onclick="openMenu()">
                                   <svg xmlns="http://www.w3.org/2000/svg" width="28" height="19" viewBox="0 0 28 19"
                                          fill="none">
                                          <path d="M0.856708 1.71342H26.5586C27.0315 1.71342 27.4153 1.32957 27.4153 0.856708C27.4153 0.383774 27.0314 0 26.5586 0H0.856708C0.383845 0 0 0.383774 0 0.856708C0 1.32964 0.383845 1.71342 0.856708 1.71342Z"
                                                 fill="black" />
                                          <path d="M26.5586 8.56738H0.856708C0.383774 8.56738 0 8.95123 0 9.42409C0 9.89695 0.383845 10.2808 0.856708 10.2808H26.5586C27.0315 10.2808 27.4153 9.89695 27.4153 9.42409C27.4153 8.95123 27.0315 8.56738 26.5586 8.56738Z"
                                                 fill="black" />
                                          <path d="M26.5586 17.1345H0.856708C0.383774 17.1345 0 17.5184 0 17.9912C0 18.4642 0.383845 18.8479 0.856708 18.8479H26.5586C27.0315 18.8479 27.4153 18.4641 27.4153 17.9912C27.4154 17.5183 27.0315 17.1345 26.5586 17.1345Z"
                                                 fill="black" />
                                   </svg>
              </div>
              <nav class="header__nav">
                     <div class="header__nav__mobile">
                            <div class="header__logo header__nav__logo" <?php if ( function_exists( 'the_custom_logo' ) ) {
                            the_custom_logo(); } ?> </div> 
                            <div class="header__nav__icone__closed" onclick="closeMenu()">
                                   <svg xmlns="http://www.w3.org/2000/svg" width="22" height="19" viewBox="0 0 22 19"
                                          fill="none">
                                          <path d="M20.1905 0.734096L0.860267 16.9341C0.504576 17.2322 0.45818 17.7625 0.756595 18.1177C1.05505 18.4729 1.58593 18.5192 1.94157 18.2212L21.2718 2.02116C21.6275 1.72307 21.6739 1.19284 21.3755 0.83764C21.0771 0.482341 20.5462 0.436002 20.1905 0.734096Z"
                                          fill="black" />
                                          <path d="M0.644737 1.94409L19.9778 18.1465C20.3335 18.4447 20.8641 18.3986 21.1622 18.0439C21.4602 17.6891 21.4134 17.1592 21.0577 16.8611L1.72462 0.65872C1.36893 0.360628 0.838326 0.406552 0.540259 0.761338C0.242191 1.11612 0.289047 1.646 0.644737 1.94409Z"
                                          fill="black" />
                                   </svg>
                            </div>
                     </div>
                     <?php
                     if ( has_nav_menu( 'header-menu' ) ) : ?>
                                          <?php 
                     wp_nav_menu ( array (
                     'theme_location' => 'header-menu' ,
                     'menu_class' => 'header__nav__menu', 
                     'container' => false,
                     ) ); ?>
                                          <?php endif;
                     ?>
              </nav>
       </header>

       <main>