<section class="aircraft--slider">
	<div class="container-90">
		<div class="row will_animate">
			<div class="col-md-12">
			<?php 
			
			$args = array(
				'post_type' => 'aircraft',
				'posts_per_page' => 3,
				'meta_query' => array(
				    array(
				      'key' => 'ac_featured',
				      'value' => '1',
				      'compare' => '==' // not really needed, this is the default
				    )
				  )
			);	

			$the_query = new WP_Query( $args ); ?>
			
			<?php if ( $the_query->have_posts() ) : ?>
			<h2 class="fade_in_up" style="margin-bottom: 1em; margin-top: 2em; color: #15173f; text-align: center;">Featured Aircraft</h2>
			<div class="featured-aircrafts">				
				<?php $i=1; ?>			
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<?php
					$img = get_field('ac_main_image');
					$manufacturer = get_field('ac_manufacturer');
					$model = get_field('ac_model');
					$nnumber = get_field('ac_n_number');
					$serialnumber = get_field('ac_serial_number');
					$year = get_field('ac_year');
					$hours = get_field('ac_hours');
					$landings = get_field('ac_landings');					
				?>
				<div class="asa_aircraft" asa-tab-index="<?php echo $i; ?>">
					<div class="asa_thumbnail" style="background-image: url(<?php echo $img['url']; ?>);" >
						<a href="<?php echo the_permalink(); ?>">
				
						</a>
					</div>
					<div class="asa_padded">
						<?php if(!get_field('ac_sold')): ?>
						<a href="<?php echo the_permalink(); ?>">
						<?php endif; ?>
						<div class="asa_title">
							<h2 class="h3"><?php echo $manufacturer; ?><br><?php echo $model; ?></h2>
				<p><?php echo '<span>Reg: <strong>' . $nnumber .'</strong></span><span>S/N: <strong>'. $serialnumber .'</strong></span><span>Year: <strong>'. $year . '</strong></span>'; ?></p>
						</div>
						<ul class="asa_highlights">
							<?php
							if( have_rows('ac_highlights') ):
							    while ( have_rows('ac_highlights') ) : the_row();
							?>							
							    <li><img src="https://omniaircraftsales.com/wp-content/uploads/2018/11/OAS-Bullet.svg" alt="" /><span><?php the_sub_field('ac_bullet'); ?></span></li>							
							<?php 
							    endwhile;					
							endif;					
							?>
						</ul>
						<div class="asa_info">
							<div class="asa_stat">
								<?php if(get_field('ac_sold')): ?>
									<span class="asa_stat_sold oas-red">Sold</span>
								<?php else: ?>
									<span class="asa_stat_num oas-blue"><?php echo $hours; ?></span>
									<span class="asa_stat_label">Hours</span>
								<?php endif; ?>
							</div>
							<div class="asa_stat">
								<?php if(get_field('ac_sold')): ?>
									<a href="/inventory#allaircrafts" class="btn-light">See all aircraft</a>
								<?php else: ?>
									<span class="asa_stat_num"><?php echo $landings; ?></span>
									<span class="asa_stat_label">Cycles</span>
								<?php endif; ?>
							</div>
						</div>
						<?php if(!get_field('ac_sold')): ?>
						</a>
						<?php endif; ?>
					</div>
				</div>
				<?php $i++; ?>	
				<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
			<div class="prev_ac_btn">
				<img src="https://omniaircraftsales.com/wp-content/uploads/2018/11/chevron-left.svg" alt="" />
			</div>
			<div class="next_ac_btn">
				<img src="https://omniaircraftsales.com/wp-content/uploads/2018/11/chevron-right.svg" alt="" />
			</div>
			</div>
			<div class="all-aircraft">
				<a href="/inventory" class="btn-light">View all aircraft</a> 
			</div>			
			<?php endif; ?>
			
			</div>
		</div>	
	</div>	
</section>

