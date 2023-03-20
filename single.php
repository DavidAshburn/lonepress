<?php
	get_header();
?>    
    <p class="text-white">single</p>
	<?php
	  	if( have_posts() ){
	  		while( have_posts() ){

	  			the_post();

	  			//not sure how to get the post type yet
	  			get_template_part('template-parts/content', 'article');

	  		}
	  	}
	?>
	    
<?php
get_footer();
?>