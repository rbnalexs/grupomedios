<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <title><?php wp_title('&raquo;', 'true', 'right'); ?><?php bloginfo('name'); ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@100;200;300;400;500;600&family=Oxygen:wght@300;400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.min.css">
  <?php wp_head(); ?>
</head>

<body>

  <header <?php body_class('header2020'); ?>>
    <div class="progress-container">
      <div class="progress-bar" id="myBar"></div>
    </div>
    <div class="headerSitio2020"><!--header sitio-->
      <div class="navBars2020">
        <span class="nV2020">
          <i class="fas fa-bars"></i>
        </span>
        <img src="<?php echo get_template_directory_uri(); ?>/images/logoRumbo2021.png" alt="Logo Rumbo 2021">
      </div>
      <div class="categoriasHeader2020">
        <?php
        $menu_items = wp_get_nav_menu_items('header-menu');
        if ($menu_items) {
          $count = count($menu_items);
          $i = 0;
          foreach ($menu_items as $item) {
            $i++;
            echo '<span><a href="' . esc_url($item->url) . '">' . esc_html($item->title) . '</a>';
            if ($i < $count) {
              echo '<strong>l</strong>';
            }
            echo '</span>';
          }
        }
        ?>
      </div>
      <div class="buscMobile2020">
        <span><i class="fas fa-search"></i></span>
      </div>
      <div class="buscador2020">
        <div class="envolventeMobile"><!--solo se ve en mobile-->
          <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
            <input type="text" name="s" placeholder="Buscar...">
            <button><i class="fas fa-search"></i></button>
          </form>
          <div class="cerrarBuscadorMobile2020">
            <i class="far fa-times-circle"></i>
          </div>
        </div><!--solo se ve en mobile-->
      </div>


      <div class="menuCategorias2020"><!--menu categorias-->
        <div class="swipe">
          <button id="slideLeft" type="button"><i class="fas fa-angle-left"></i></button>
        </div>
        <div class="catBarra2020" id="container">
          <?php
          $menu_items = wp_get_nav_menu_items('main-menu');
          if ($menu_items) {
            foreach ($menu_items as $item) {
              echo '<span><a href="' . esc_url($item->url) . '">' . esc_html($item->title) . '</a></span>';
            }
          }
          ?>
        </div>
        <div class="swipe">
          <button id="slideRight" type="button"><i class="fas fa-angle-right"></i></button>
        </div>
        <div class="linTapar"></div>
      </div><!--menu categorias-->

    </div><!--header sitio-->
    <div class="menuDesplegado animated slideInDown"><!--menu desplegado-->
      <div class="closeNavBars"><i class="fas fa-times"></i></div>
      <div class="container-fluid menuDes">

        <nav>
          <div class="col-md-12 menuCat">
            <?php
            wp_nav_menu(array(
              'theme_location' => 'main-menu',
              'container' => false,
              'menu_class' => '', 
              'items_wrap' => '<ul>%3$s</ul>',
              'link_before' => '<strong>',
              'link_after' => '</strong>',
              'depth' => 1,
              'fallback_cb' => false
            ));
            ?>
          </div>
        </nav>
      </div>
      <div class="barraRedes">
        <span class="rS face">
          <a href="#"><i class="fab fa-facebook"></i></a>
        </span>
        <span class="rS twit">
          <a href="#"><i class="fab fa-twitter-square"></i></a>
        </span>
        <span class="rS insta">
          <a href="#"><i class="fab fa-linkedin-in"></i></a>
        </span>
        <span class="rS yt">
          <a href="#"><i class="fab fa-youtube"></i></a>
        </span>
        <span class="rS yt">
          <a href="#"><i class="fab fa-instagram"></i></a>
        </span>
      </div>
    </div><!--menu desplegado-->
    <!--este modulo va arriba de dond abre class="menuDesplegado-->
  </header><!--fin nuevo header 2020-->