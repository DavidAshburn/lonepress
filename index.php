<?php
	get_header();
?>    
    <p>index</p>
	<article class="px-3 py-5">
	  <?php
	  	if( have_posts() ){
	  		while( have_posts() ){

	  			the_post();

	  		}
	  	}

	  	the_posts_pagination();
	  ?>
  </article>

	    
<?php
get_footer();
?>