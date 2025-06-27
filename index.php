<?php

/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */

get_header(); ?>


<div class="container"><!--contenedor-->

  <div class="skin-container"><!--skin contenedor-->

    <div class="publicidad margin">
      <span class="aP">PUBLICIDAD</span>
      <div class="leader">
        <img src="<?php echo get_template_directory_uri(); ?>/images/leader.jpg">
      </div>
    </div>


    <!--inicio home-->

    <div class="modHome"><!--mod home-->

      <?php
      $args = array(
        'category_name' => 'destacado-home',
        'posts_per_page' => 3,
        'post_type' => array('post', 'en-vivo'),
        'order' => 'DESC'
      );
      $the_query = new WP_Query($args);
      $i = 0;

      if ($the_query->have_posts()) :
      ?>

        <div class="col-md-8 notasPrin"><!--notas principales-->

          <?php
          while ($the_query->have_posts()) : $the_query->the_post();
            $categories = get_the_category();
            // Eliminamos la categoría 'destacado-home'
            foreach ($categories as $k => $c) {
              if ($c->slug == 'destacado-home') {
                unset($categories[$k]);
              }
            }
            $categories = array_values($categories);
            if (!empty($categories)) {
              $cat_name = $categories[0]->cat_name;
              $cat_link = get_category_link($categories[0]->term_id);
            } else {
              $cat_name = 'Sin categoría';
              $cat_link = '#';
            }

            // Formatos según la posición del post
            if ($i == 0) :
          ?>
              <div class="notaSobre">
                <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url('large'); ?>"></a>
                <span class="etiquetaCat"><a href="<?php echo esc_url($cat_link); ?>"><?php echo esc_html($cat_name); ?></a></span>
                <span class="titNPrin"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
              </div>
            <?php
            elseif ($i == 1) :
            ?>
              <div class="notaLarga">
                <span class="imgLarga"><a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url('medium_large'); ?>"></a></span>
                <div class="infoLarga">
                  <span class="etiquetaCat izq"><a href="<?php echo esc_url($cat_link); ?>"><?php echo esc_html($cat_name); ?></a></span>
                  <span class="titSecundario"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
                  <span class="teaserNPrin"><?php echo get_the_excerpt(); ?></span>
                </div>
              </div>
        </div><!--notas principales-->

      <?php
            elseif ($i == 2) :
      ?>
        <div class="col-md-4 notasPrin"><!--notas principales-->
          <span class="imgCuadro"><a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url('large'); ?>"></a></span>
          <div class="infoCuadro">
            <span class="etiquetaCat amarilla"><a href="<?php echo esc_url($cat_link); ?>"><?php echo esc_html($cat_name); ?></a></span>
            <span class="titNPrin chico"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
            <span class="teaserNPrin negro"><?php echo get_the_excerpt(); ?></span>
          </div>
        </div><!--notas principales-->

  <?php
            endif;
            $i++;
          endwhile;
          wp_reset_postdata();
        endif;
  ?>

    </div><!--mod home-->



    <?php
    // <!--mod-home__federal-->
    $categoria_slug = 'federal';
    $categoria_obj = get_category_by_slug($categoria_slug);

    if ($categoria_obj) {
      $categoria_nombre = $categoria_obj->name;
      $categoria_link = get_category_link($categoria_obj->term_id);

      // Consulta de 3 posts recientes de esa categoría
      $args = array(
        'posts_per_page' => 3,
        'category_name' => $categoria_slug
      );
      $query = new WP_Query($args);
    ?>

      <div class="modHome"><!--mod home-->

        <div class="seccionHome">
          <span><strong><?php echo esc_html($categoria_nombre); ?></strong>
            <i class="fas fa-grip-lines-vertical"></i>
            <a href="<?php echo esc_url($categoria_link); ?>">Ver más notas</a></span>
        </div>

        <?php if ($query->have_posts()) :
          while ($query->have_posts()) : $query->the_post(); ?>
            <div class="notaGris">
              <span class="imgRecorte">
                <?php if (has_post_thumbnail()) : ?>
                  <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>">
                <?php else : ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/images/fotoRelleno.jpg" alt="Imagen genérica">
                <?php endif; ?>
              </span>
              <span class="titSecundario centro">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </span>
            </div>
        <?php endwhile;
          wp_reset_postdata();
        endif; ?>

        <div class="boxHome">
          <img src="<?php echo get_template_directory_uri(); ?>/images/box.jpg" alt="Box">
        </div>

      </div><!--mod home-->
    <?php } ?>




    <?php
    // <!--mod-home__cdmx-->
    $categoria_slug = 'cdmx';
    $categoria_obj = get_category_by_slug($categoria_slug);

    if ($categoria_obj) {
      $categoria_nombre = $categoria_obj->name;
      $categoria_link = get_category_link($categoria_obj->term_id);

      // Consulta de los 5 posts más recientes de la categoría
      $args = array(
        'posts_per_page' => 5,
        'category_name' => $categoria_slug
      );
      $query = new WP_Query($args);
    ?>

      <div class="modHome"><!--mod home-->

        <div class="seccionHome">
          <span>
            <strong><?php echo esc_html($categoria_nombre); ?></strong>
            <i class="fas fa-grip-lines-vertical"></i>
            <a href="<?php echo esc_url($categoria_link); ?>">Ver más notas</a>
          </span>
        </div>

        <?php
        $i = 0;
        if ($query->have_posts()) :
          while ($query->have_posts()) : $query->the_post();
            $i++;
            if ($i <= 2) :
        ?>
              <div class="col-md-6 notaDoble"><!--notas principales-->
                <div class="notaSobre doble">
                  <a href="<?php the_permalink(); ?>">
                    <?php if (has_post_thumbnail()) : ?>
                      <?php the_post_thumbnail('large'); ?>
                    <?php else : ?>
                      <img src="<?php echo get_template_directory_uri(); ?>/images/fotoRelleno2.jpg" alt="Imagen genérica">
                    <?php endif; ?>
                  </a>
                  <span class="etiquetaCat"><a href="<?php echo esc_url($categoria_link); ?>"><?php echo esc_html($categoria_nombre); ?></a></span>
                  <span class="titNPrin sobre"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
                </div>
                <span class="teaserNPrin sobre"><?php echo get_the_excerpt(); ?></span>
              </div>
            <?php
            else :
            ?>
              <div class="col-md-4 nG">
                <div class="notaGris transparente">
                  <span class="imgRecorte grande">
                    <?php if (has_post_thumbnail()) : ?>
                      <?php the_post_thumbnail('large'); ?>
                    <?php else : ?>
                      <img src="<?php echo get_template_directory_uri(); ?>/images/fotoRelleno.jpg" alt="Imagen genérica">
                    <?php endif; ?>
                  </span>
                  <span class="etiquetaCat amarilla centro"><a href="<?php echo esc_url($categoria_link); ?>"><?php echo esc_html($categoria_nombre); ?></a></span>
                  <span class="titSecundario centro"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
                </div>
              </div>
        <?php
            endif;
          endwhile;
          wp_reset_postdata();
        endif;
        ?>

      </div><!--mod home-->

    <?php } ?>


    <?php
    // <!--mod-home__estados-->
    $categoria_slug = 'estados';
    $categoria_obj = get_category_by_slug($categoria_slug);

    if ($categoria_obj) {
      $categoria_nombre = $categoria_obj->name;
      $categoria_link = get_category_link($categoria_obj->term_id);

      // Obtener las 4 entradas más recientes
      $args = array(
        'posts_per_page' => 4,
        'category_name'  => $categoria_slug
      );
      $query = new WP_Query($args);
    ?>

      <div class="modHome"><!--mod home-->

        <div class="seccionHome">
          <span>
            <strong><?php echo esc_html($categoria_nombre); ?></strong>
            <i class="fas fa-grip-lines-vertical"></i>
            <a href="<?php echo esc_url($categoria_link); ?>">Ver más notas</a>
          </span>
        </div>

        <?php if ($query->have_posts()) :
          while ($query->have_posts()) : $query->the_post(); ?>
            <div class="col-md-3 nG">
              <div class="notaGris azul">
                <span class="imgRecorte largo">
                  <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('medium'); ?>
                  <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/fotoRelleno.jpg" alt="Imagen genérica">
                  <?php endif; ?>
                </span>
                <span class="titSecundario blanco centro">
                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </span>
              </div>
            </div>
        <?php endwhile;
          wp_reset_postdata();
        endif; ?>

      </div><!--mod home-->

    <?php } ?>


    <?php
    // <!--mod-home__camaras-->
    $categoria_slug = 'camaras';
    $categoria_obj = get_category_by_slug($categoria_slug);

    if ($categoria_obj) {
      $categoria_nombre = $categoria_obj->name;
      $categoria_link = get_category_link($categoria_obj->term_id);

      // Consulta de las 3 publicaciones más recientes
      $args = array(
        'posts_per_page' => 3,
        'category_name'  => $categoria_slug
      );
      $query = new WP_Query($args);
    ?>

      <div class="modHome"><!--mod home-->

        <div class="seccionHome">
          <span>
            <strong><?php echo esc_html($categoria_nombre); ?></strong>
            <i class="fas fa-grip-lines-vertical"></i>
            <a href="<?php echo esc_url($categoria_link); ?>">Ver más notas</a>
          </span>
        </div>

        <?php if ($query->have_posts()) :
          while ($query->have_posts()) : $query->the_post(); ?>
            <div class="col-md-4 nG">
              <div class="notaGris transparente">
                <span class="imgNg">
                  <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('medium'); ?>
                  <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/fotoRelleno.jpg" alt="Imagen genérica">
                  <?php endif; ?>
                </span>
                <span class="etiquetaCat amarilla">
                  <a href="<?php echo esc_url($categoria_link); ?>"><?php echo esc_html($categoria_nombre); ?></a>
                </span>
                <span class="titSecundario izquierda">
                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </span>
                <span class="teaserNPrin negro izquierda">
                  <?php echo get_the_excerpt(); ?>
                </span>
              </div>
            </div>
        <?php endwhile;
          wp_reset_postdata();
        endif; ?>

      </div><!--mod home-->

    <?php } ?>



    <?php
    // <!--mod-home__opinion-->
    $categoria_slug = 'opinion';
    $categoria_obj = get_category_by_slug($categoria_slug);

    if ($categoria_obj) {
      $categoria_nombre = $categoria_obj->name;
      $categoria_link = get_category_link($categoria_obj->term_id);

      // Obtener las 3 entradas más recientes de la categoría
      $args = array(
        'posts_per_page' => 3,
        'category_name'  => $categoria_slug
      );
      $query = new WP_Query($args);
    ?>

      <div class="modHome">

        <div class="seccionHome">
          <span>
            <strong><?php echo esc_html($categoria_nombre); ?></strong>
            <i class="fas fa-grip-lines-vertical"></i>
            <a href="<?php echo esc_url($categoria_link); ?>">Ver más notas</a>
          </span>
        </div>

        <?php if ($query->have_posts()) :
          $i = 0;
          $posts_array = array();
          while ($query->have_posts()) : $query->the_post();
            $posts_array[] = array(
              'title' => get_the_title(),
              'link' => get_permalink(),
              'thumb' => has_post_thumbnail() ? get_the_post_thumbnail(null, 'full') : '<img src="' . get_template_directory_uri() . '/images/fotoRelleno.jpg" alt="Imagen genérica">',
            );
          endwhile;
          wp_reset_postdata();
        ?>

          <div class="col-md-6 notaDoble sm">
            <div class="notaSobre doble sm">
              <a href="<?php echo esc_url($posts_array[0]['link']); ?>">
                <?php echo $posts_array[0]['thumb']; ?>
              </a>
              <span class="etiquetaCat"><a href="<?php echo esc_url($categoria_link); ?>"><?php echo esc_html($categoria_nombre); ?></a></span>
              <span class="titNPrin sobre"><a href="<?php echo esc_url($posts_array[0]['link']); ?>"><?php echo esc_html($posts_array[0]['title']); ?></a></span>
            </div>
          </div>

          <div class="col-md-6 notaDoble sm">
            <?php for ($j = 1; $j < count($posts_array); $j++) : ?>
              <div class="notaChicaLado">
                <div class="col-md-6 imgLado">
                  <?php echo $posts_array[$j]['thumb']; ?>
                </div>
                <div class="col-md-6 txtLado">
                  <span class="etiquetaCat amarilla"><a href="<?php echo esc_url($categoria_link); ?>"><?php echo esc_html($categoria_nombre); ?></a></span>
                  <span class="titSecundario izquierda chico"><a href="<?php echo esc_url($posts_array[$j]['link']); ?>"><?php echo esc_html($posts_array[$j]['title']); ?></a></span>
                </div>
              </div>
            <?php endfor; ?>
          </div>

        <?php endif; ?>

      </div><!--mod home-->

    <?php } ?>



    <?php get_footer(); ?>