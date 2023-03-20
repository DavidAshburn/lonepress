<div class="flex">
	<div class="flex flex-col w-full sm:w-[90vw] ml-2">
		<div class="h-[2vh] sm:h-[5vh] bg-black"></div>
		<div class="artbox">
			<?php the_post_thumbnail('medium_large', ['class' => 'artpiece'] ) ?>
		</div>
		<div class="flex justify-end gap-4 items-center px-5 h-[10vh] bg-black items-center">
			<p class="font-inter font-extrabold text-3xl text-white text-end mt-12"><?php the_title() ?></p>
		</div>
	</div>

</div>