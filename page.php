<?php
	get_header();
?>    
	<p>page</p>
    
	<article class="px-3 py-5">
	  <?php
	  	if( have_posts() ){
	  		while( have_posts() ){

	  			the_post();

	  			//not sure how to get the post type yet
	  			get_template_part('template-parts/content', 'page');

	  		}
	  	}
	  ?>
  </article>
	    
<?php
get_footer();
?>