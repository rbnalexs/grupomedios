// EJEMPLO DE LOOP 1


<?php
		$contador = 1;
		$destacados = array();
		$args = array(
			'category_name' => 'destacado-home',
			'posts_per_page' => 6,
			'post_type' => array('post', 'en-vivo'),
			'order' => 'DESC'
		);
		$the_query = new WP_Query($args);
		if ($the_query -> have_posts())
		{
			while ($the_query -> have_posts())
			{
				$the_query -> the_post();
				array_push($destacados, get_the_ID());
				$categories = get_the_category();
				$k = 0;
				foreach($categories as $c)
				{
					if($c->slug=='destacado-home')
					{
						unset($categories[$k]);
					}
					$k++;
				}
				$categories = array_values($categories);
				$cat_name = $categories[0]->cat_name;
				$category_id = get_cat_ID($cat_name);
				$category_link = get_category_link($category_id);
				?>
				<div class="col-md-3 ModsP">
					<div class="notaImg">
						<a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url('large');?>" alt="<?php the_title(); ?>"/></a>
						<div class="TxtNotas">
							<span class="TitSeccion"><a href="<?php echo esc_url( $category_link ); ?>"><?php echo $cat_name; ?></a></span>
							<span class="TitNota"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
						</div>
					</div>
					<div class="TeaserNota">
						<span><?php echo get_the_excerpt(); ?></span>
					</div>
				</div>
				<?php
			}
		}	
		?>

//EJEMPLO LOOP 2

<?php
  $args = array(
    'order' => 'DESC',
    'post_type' => 'post',
    'category_name'    => 'estilo-de-vida',
    'posts_per_page' => 3,
    'post__not_in' => $postDestacados
  );
  $query = new WP_Query( $args );
  if ( $query->have_posts() ) 
  {
    while ( $query->have_posts() ) 
    {
      $query->the_post();
      array_push($postDestacados, get_the_ID());
      $post_id = get_the_ID();
      $post_author_id = get_post_field( 'post_author', $post_id );
      $author_url = get_author_posts_url( $post_author_id );
      $author    = get_the_author_meta( 'display_name', $post_author_id );
      $categories = get_the_category();
      ?>
      <div class="col-md-4 notaActualidad"><!--nota-->
       <span class="txtMarca estilo-de-vida"><a href="<?php echo $author_url ?>"> <i class="far fa-bookmark"></i> <?php echo $author;?></a></span><br>
       <div class="tiempoNota">
        <span><i class="far fa-clock"></i> <?php echo get_the_date('d M Y') ?></span>
        <span class="horario"><i class="fas fa-circle"></i> <?php the_time( 'g:i a' );?></span>
      </div>
      <span class="imgAct">
        <a href="<?php the_permalink(); ?>">
          <img class="lazy" data-src="<?php the_post_thumbnail_url('large');?>" alt="<?php the_title(); ?>" >
        </a>
      </span>
      <span class="tituloNota grande abajo">
       <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
     </span>
   </div><!--nota-->
   <?php
 }
}
wp_reset_postdata();
?>