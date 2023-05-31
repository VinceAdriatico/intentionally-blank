<?php //Template Name: Map Test 
	get_template_part('header'); ?>

<section class="rangemap ">
	<div class="container-fluid">
		<div class="row align-items-center">
			<div class="map--container d-flex justify-content-center col-md-12">
				<?php get_template_part( 'images/map', 'airports'); ?>
				<div class="map-options-selectors">
					<h2 class="h4"><?php the_title(); ?> range map</h2>
					<p class="map_discalimer">
						<?php the_field('rm_how_to_use'); ?>
					</p>
					<label><img src="https://omniaircraftsales.com/wp-content/uploads/2018/10/user-plus.svg" alt="">Cabin<button class="trigger-tooltipcabin">i</button><div id="tooltipcabin"><div class="tooltip-inner"><?php the_field('rm_cabin_tooltip'); ?></div></div></label>
					<select id="cabin_selector">
						<option id="fuel" value="fuel" selected="selected">Full fuel</option>
						<option id="cabin" value="cabin">Full cabin</option>
					</select>
					<label><img src="https://omniaircraftsales.com/wp-content/uploads/2018/10/wind.svg" alt="">Wind factor (knots)<button class="trigger-tooltipwind">i</button><div id="tooltipwind"><div class="tooltip-inner"><?php the_field('rm_wind_tooltip'); ?></div></div></label>
					<select id="wind_selector">
						<option id="nowind" value="nowind" selected="selected">No wind</option>
						<option id="low" value="low">Low</option>
						<option id="medium" value="medium">Medium</option>
						<option id="high" value="high">High</option>
					</select>
					<p class="map_discalimer">
						<?php the_field('rm_disclaimer'); ?>  
					</p>
				</div>
			</div>
		</div>
	</div>
</section>

<?php include( locate_template( 'footer.php', false, false ) ); ?>
