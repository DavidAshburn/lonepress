
<?php
	get_header();

	$issues = get_posts([
		'post_type' => 'issues'
	]);
?>
<div class="flex">
	<h1 class="nameplate">
		<?php the_title() ?>
	</h1>

	<?php
		foreach ( $issues as $issue ) { ?>
			<a href="<?php echo get_permalink($issue) ?>" class="flex gap-2">
				<div class="flex justify-center items-center">
					<p class="text-9xl text-gray-300 pr-4 pb-2 flex justify-end items-center w-20 md:w-40 font-ebgaramond">
						<?php

							$issue_id = $issue->ID;
							$issue_index = get_post_meta($issue_id, 'index', true);
							echo $issue_index;

						?>
					</p>
					<div class="bg-gradient-to-b from-slate-400 to-gray-50 w-1 h-3/5"></div>
					<div class="flex flex-col gap-2 justify-center pl-4 font-black text-white">
						<?php 

							$subtitle = get_post_meta($issue_id, 'subtitle', true);
							echo $subtitle;

						?>
					</div>
				</div>
			</a>
		<?php } ?>
</div>
<?php
	get_footer();
?>