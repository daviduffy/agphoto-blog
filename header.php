<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php wp_title(); ?></title>
    <?php
      if ( isset($archive) || is_attachment() ) {

        echo "<meta name='robots' content='noindex'>
              <meta name='bub' content='this is an archive or attachment page'>";
      }
    ?>
    <?php wp_head(); ?>

  </head>

  <body <?php body_class(); ?> >

    <header class="row">
      <h1>Amy Galbraith Photography Blog</h1>
      <a href="<?php bloginfo('url'); ?>"><img id="header-logo" alt="logo for Amy Galbraith Photography" data-pin-no-hover="true" nopin="nopin" src="<?php header_image(); ?>"></a>

      <!-- menu test -->

      <a href="" class="nav-toggle"><span></span>Menu</a>
      <nav>
         <div class="navigation mobile-menu" role="complementary">
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Mobile Overlay Menu") ) : ?>
        <?php endif; ?>
        </div>
      </nav>

      <!-- end menu test -->

</header>