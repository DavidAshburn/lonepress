<div class="flex flex-col gap-1">
	<header class="">
		<div class="mb-3">
			<span class=""><?php the_date() ?></span>
		</div>
	</header>

	<?php
		the_post_thumbnail('medium');
		the_content();

	?>
</div>