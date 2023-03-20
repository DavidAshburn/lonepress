<?php
	get_header();
?>
<div class="flex">
	<div class="flex flex-col w-[90vw]">
	<?php

  	if( have_posts() ){
  		while( have_posts() ){

  			the_post();

  			$lone_post_type = get_post_type();
  			if( $lone_post_type == 'poems') {

  				get_template_part('template-parts/poet', 'single');

  			} elseif( $lone_post_type == 'art') {

  				get_template_part('template-parts/artist', 'single');
  			}
  		}
  	}
	?>
	</div>
	<div class="nameplate">
		<?php 
			if( $lone_post_type == 'poems') {

				$terms = get_terms([
				'taxonomy' => 'poet',
				'hide_empty' => false
				]);
  				
  			} elseif( $lone_post_type == 'art') {

  				$terms = get_terms([
				'taxonomy' => 'artist',
				'hide_empty' => false
				]);
  			}
			
			$full_name = $terms[0]->name;
			$firstlast = explode(" ", $full_name);

			$first_name = strtolower($firstlast[0]);
			$last_name = strtoupper($firstlast[1]);

			echo $first_name . " . " . $last_name;

		?>
	</div>
</div> 
<?php
get_footer();
?>