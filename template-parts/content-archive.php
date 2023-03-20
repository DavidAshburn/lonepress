
<div class="flex flex-col">
    	
    <img class="mr-3 invisible md:visible" src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="image">
    <div class="flex flex-col gap-1">
	    <h3 class="mb-1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	    <div class="mb-1"><span class=""><?php the_date(); ?></span>
	    	<span class=""><a href="#"><?php comments_number(); ?></a></span>
	  	</div>
	    <?php
			the_excerpt();
		?>
	    <a class="" href="<?php the_permalink(); ?>">Read more &rarr;</a>
    </div>
</div>
