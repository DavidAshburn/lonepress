<?php
	get_header();
?>

<div class= "flex">
	<div class="nameplate">
		<?php
			the_title();
		?>
	</div>
	<div class="text-white font-inter pt-14 pl-12 max-w-[60rem]">
		<?php
			the_content();
		?>
	</div>
</div>
<?php
	get_footer();
?>
