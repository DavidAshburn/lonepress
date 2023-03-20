<?php
	get_header();
?>

<div class="flex">
	<div class="flex flex-col w-[90vw]">
		<p>taxonomy</p>
		<?php
		  	if( have_posts() ){
		  		while( have_posts() ){
		  			the_post();

		  			get_template_part('template-parts/poet', 'archive');
		  		}
		  	}
		?>
	</div>
	<div class="poetname text-white">
		<?php 
			$terms = get_terms([
				'taxonomy' => 'poet',
				'hide_empty' => false
			]);
			$poet_name = $terms[0]->name;
			$firstlast = explode(" ", $poet_name);

			$first_name = strtolower($firstlast[0]);
			$last_name = strtoupper($firstlast[1]);

			echo $first_name . " . " . $last_name;

		?>
	</div>
</div>
	get_footer();
?>