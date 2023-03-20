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
	<div class="poetname">
	</div>
</div>
		<?php
	get_footer();
?>