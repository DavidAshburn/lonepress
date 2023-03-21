<?php
	get_header();
?>

<div class="flex">
	<div class="flex flex-col w-[90vw]">
		<?php
		  	if( have_posts() ){
		  		while( have_posts() ){
		  			the_post();
		  			$current_post = get_post();
		  			$terms = get_the_terms( $current_post, 'artist');
		  			get_template_part('template-parts/artist', 'single');
		  		}
		  	}
		?>
	</div>
	<div class="nameplate">
		<?php 
			
			$artist_name = $terms[0]->name;
			$firstlast = explode(" ", $artist_name);

			$first_name = strtolower($firstlast[0]);
			$last_name = strtoupper($firstlast[1]);

			echo $first_name . " . " . $last_name;

		?>
	</div>
</div>
	get_footer();
?>