<?php 
	$copy1 = get_field('copy_column_1', $id);
	$copy2 = get_field('copy_column_2', $id);
?>

<div class="career-post--col1 col-lg-6 col-12">
	<div class="col-lg-12 col-md-6 col-12">
		<p class="h5 oat-blue">Location: <span class="oat-dark_gray"><?php echo $location; ?></span></p>
		<p class="h5 oat-blue">Position: <span class="oat-dark_gray"><?php echo $position; ?></span></p>
		<p class="h5 oat-blue">Job Type: <span class="oat-dark_gray"><?php echo $job_type; ?></span></p>
	</div>
	<div class="col-lg-12 col-md-6 col-12">
		<?php echo $copy1; ?>
	</div>
</div>
<div class="career-post--col2 col-lg-6 col-12">
	<?php echo $copy2; ?>
</div>