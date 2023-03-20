<?php
	get_header();

	$artists = get_terms([
		'taxonomy' => 'artist',
		'hide_empty' => false,
	]);
?>  


<div class="flex">
	<div class="nameplate">
		art
	</div>
	<div class="w-full flex flex-col font-inter text-white gap-8 py-4 pl-4 md:py-20 md:pl-20 pr-0">

		<div class="bg-gradient-to-r from-slate-400 to-gray-50 w-full h-1"></div>

		<?php 

			foreach ($artists as $artist) {

				$full_name = $artist->name;
				$firstlast = explode(" ", $full_name);

				$first_name = strtolower($firstlast[0]);
				$last_name = strtoupper($firstlast[1]);
				?>
					<a href="www.google.com" class="flex gap-2">
						<p class="flex items-center justify-end w-20 md:w-40 text-slate-300"><?php echo $first_name ?></p>
						<div class="bg-gradient-to-b from-slate-400 to-gray-50 w-1 h-12"></div>
						<p class="flex items-center font-black"><?php echo $last_name ?></p>
					</a>
				<?php
			}

		?>

	</div>

</div>


<?php
	get_footer();
?>