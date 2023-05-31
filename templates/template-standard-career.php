<?php
	$copy = get_field('general_copy', $id);

?>

<div class="general-career career-post--col1 col-12">
	<div>
		<p class="h5 oat-blue">Location: <span class="oat-dark_gray"><?php echo $location; ?></span></p>
		<p class="h5 oat-blue">Position: <span class="oat-dark_gray"><?php echo $position; ?></span></p>
		<p class="h5 oat-blue">Job Type: <span class="oat-dark_gray"><?php echo $job_type; ?></span></p>
	</div>
	<div class="general-career-copy">
		<?php echo $copy; ?>
	</div>
</div>