<?php 
	$args = array(
		'post_type' => 'aircraft',
		'posts_per_page' => -1,
		'order' 	=> 'DESC',
		'meta_query' => array(
				array(
				    'key' => 'ac_sold',
				    'value' => '0',
				    'compare' => '==' 
				),
				array(
				    'key' => 'ac_acquired_copy',
				    'value' => '0',
				    'compare' => '==' 
				),
				array(
				    'key' => 'ac_current_acquisition',
				    'value' => '0',
				    'compare' => '==' 
				)
		)
	);
	$the_query = new WP_Query($args);
?>

<section id="for-sale-inventory">
	<h2>Aircraft for sale</h2>	
</section>
<section id="allaircrafts" class="aircraft_grid_filters">
	<!--<div class="aircraft_manufacturer">
		<label>Manufacturer</label>
	</div>-->
	
	<div class="aircraft_sorters">
		<label>Sort by</label>
		<button data-sort-by="hours" class="">Hours</button>
		<button data-sort-by="year" class="">Year</button>
	</div>
	<!--<div class="aircraft_searcher">
		<label>Search</label>
		<div class="quicksearchbefore"></div>
		<input type="text" class="quicksearch" />
	</div>-->
</section>

<?php if ( $the_query->have_posts() ) : ?>
<section class="aircraft_grid_container">
	<div class="grid-sizer"></div>
	<?php $i=1; ?>			
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
	<?php
		$img = get_field('ac_main_image');
		$manufacturer = get_field('ac_manufacturer');
		$model = get_field('ac_model');
		$nnumber = get_field('ac_n_number');
		$serialnumber = get_field('ac_serial_number');
		$year = get_field('ac_year');
		$sold = get_field('ac_sold');
		$hours = get_field('ac_hours');
		$landings = get_field('ac_landings');
		$numhours = intval(str_replace(',', '', $hours));	
		$numlandings = intval(str_replace(',', '', $landings));					
	?>
	<div class="asa_aircraft" data-hours="<?php echo $numhours; ?>" data-year="<?php echo $year; ?>">
		<div class="asa_thumbnail" style="background-image: url(<?php echo $img['url']; ?>);">
			<?php if(!get_field('ac_sold')): ?>
			<a href="<?php echo the_permalink(); ?>">
				
			</a>
			<?php endif; ?>
		</div>
		<div class="asa_padded">
			<?php if(!get_field('ac_sold')): ?>
			<a href="<?php echo the_permalink(); ?>">
			<?php endif; ?>
			<div class="asa_title">
				<h2 class="h3"><?php echo $manufacturer; ?><br><?php echo $model; ?></h2>
				<p><?php echo '<span>Reg: <strong>' . $nnumber .'</strong></span><span>S/N: <strong>'. $serialnumber .'</strong></span><span>Year: <strong>'. $year . '</strong></span>'; ?></p>
			</div>
			<?php if( have_rows('ac_highlights') ):	?>
			<ul class="asa_highlights">
				<?php while ( have_rows('ac_highlights') ) : the_row(); ?>							
				    <li><img src="https://omniaircraftsales.com/wp-content/uploads/2018/11/OAS-Bullet.svg" alt="" /><span><?php the_sub_field('ac_bullet'); ?></span></li>							
				<?php endwhile;	?>
			</ul>
			<?php endif; ?>
			<div class="asa_info">
				
					<?php if(get_field('ac_sold')): ?>
					<div class="asa_stat full">
						<span class="asa_stat_sold oas-red">Sold</span>
					</div>
					<?php else: ?>
					<div class="asa_stat">
						<span class="asa_stat_num oas-blue"><?php echo $hours; ?></span>
						<span class="asa_stat_label">Hours</span>
					</div>
					<div class="asa_stat">
						<span class="asa_stat_num"><?php echo $landings; ?></span>
						<span class="asa_stat_label">Cycles</span>
					</div>
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
</section>
<?php endif; ?>


<?php 
	$args = array(
		'post_type' => 'aircraft',
		'posts_per_page' => -1,
		'order' 	=> 'DESC',
		'meta_query' => array(
				    array(
				      'key' => 'ac_sold',
				      'value' => '1',
				      'compare' => '==' // not really needed, this is the default
				    )
				  )
	);
	$the_query = new WP_Query($args);
?>
<section id="sold_aircraft">
	<h2>Sold aircraft</h2>
</section>
<?php if ( $the_query->have_posts() ) : ?>
<section class="aircraft_grid_container">
	<div class="grid-sizer"></div>
	<?php $i=1; ?>			
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
	<?php
		$img = get_field('ac_main_image');
		$manufacturer = get_field('ac_manufacturer');
		$model = get_field('ac_model');
		$nnumber = get_field('ac_n_number');
		$serialnumber = get_field('ac_serial_number');
		$year = get_field('ac_year');
		$sold = get_field('ac_sold');
		$hours = get_field('ac_hours');
		$landings = get_field('ac_landings');
		$numhours = intval(str_replace(',', '', $hours));	
		$numlandings = intval(str_replace(',', '', $landings));					
	?>
	<div class="asa_aircraft" data-hours="<?php echo $numhours; ?>" data-year="<?php echo $year; ?>">
		<div class="asa_thumbnail" style="background-image: url(<?php echo $img['url']; ?>);">
		</div>
		<div class="asa_padded">
			<div class="asa_title">
				<h2 class="h3"><?php echo $manufacturer; ?><br><?php echo $model; ?></h2>
				<p><?php echo '<span>Reg: <strong>' . $nnumber .'</strong></span><span>S/N: <strong>'. $serialnumber .'</strong></span><span>Year: <strong>'. $year . '</strong></span>'; ?></p>
			</div>
			<?php if( have_rows('ac_highlights') ):	?>
			<ul class="asa_highlights">
				<?php while ( have_rows('ac_highlights') ) : the_row(); ?>							
				    <li><img src="https://omniaircraftsales.com/wp-content/uploads/2018/11/OAS-Bullet.svg" alt="" /><span><?php the_sub_field('ac_bullet'); ?></span></li>							
				<?php endwhile;	?>
			</ul>
			<?php endif; ?>
			<div class="asa_info">
				<div class="asa_stat full">							
					<span class="asa_stat_sold oas-red">Sold</span>
				</div>
			</div>
		</div>
	</div>
	<?php $i++; ?>	
	<?php endwhile; ?>
<?php wp_reset_postdata(); ?>					
</section>
<?php endif; ?>

<?php 
	$args = array(
		'post_type' => 'aircraft',
		'posts_per_page' => -1,
		'order' 	=> 'DESC',
		'meta_query' => array(
				    array(
				      'key' => 'ac_acquired_copy',
				      'value' => '1',
				      'compare' => '==' // not really needed, this is the default
				    )
				  )
	);
	$the_query = new WP_Query($args);
?>
<section id="acquired_aircraft">
	<h2>Acquired aircraft</h2>
</section>
<?php if ( $the_query->have_posts() ) : ?>
<section class="aircraft_grid_container">
	<div class="grid-sizer"></div>
	<?php $i=1; ?>			
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
	<?php
		$img = get_field('ac_main_image');
		$manufacturer = get_field('ac_manufacturer');
		$model = get_field('ac_model');
		$nnumber = get_field('ac_n_number');
		$serialnumber = get_field('ac_serial_number');
		$year = get_field('ac_year');
		$sold = get_field('ac_sold');
		$hours = get_field('ac_hours');
		$landings = get_field('ac_landings');
		$numhours = intval(str_replace(',', '', $hours));	
		$numlandings = intval(str_replace(',', '', $landings));					
	?>
	<div class="asa_aircraft" data-hours="<?php echo $numhours; ?>" data-year="<?php echo $year; ?>">
		<div class="asa_thumbnail" style="background-image: url(<?php echo $img['url']; ?>);">
		</div>
		<div class="asa_padded">
			<div class="asa_title">
				<h2 class="h3"><?php echo $manufacturer; ?><br><?php echo $model; ?></h2>
				<p><?php echo '<span>Reg: <strong>' . $nnumber .'</strong></span><span>S/N: <strong>'. $serialnumber .'</strong></span><span>Year: <strong>'. $year . '</strong></span>'; ?></p>
			</div>
			<?php if( have_rows('ac_highlights') ):	?>
			<ul class="asa_highlights">
				<?php while ( have_rows('ac_highlights') ) : the_row(); ?>							
				    <li><img src="https://omniaircraftsales.com/wp-content/uploads/2018/11/OAS-Bullet.svg" alt="" /><span><?php the_sub_field('ac_bullet'); ?></span></li>							
				<?php endwhile;	?>
			</ul>
			<?php endif; ?>
			<div class="asa_info">
				<div class="asa_stat-acquired">							
					<span class="asa_stat_sold oas-red">Acquired</span>
				</div>
			</div>
		</div>
	</div>
	<?php $i++; ?>	
	<?php endwhile; ?>
<?php wp_reset_postdata(); ?>					
</section>
<?php endif; ?>


<?php 
	$args = array(
		'post_type' => 'aircraft',
		'posts_per_page' => -1,
		'order' 	=> 'DESC',
		'meta_query' => array(
				    array(
				      'key' => 'ac_current_acquisition',
				      'value' => '1',
				      'compare' => '==' // not really needed, this is the default
				    )
				  )
	);
	$the_query = new WP_Query($args);
?>
<section id="current_acquisitions">
	<h2>Current acquisitions</h2>
</section>
<?php if ( $the_query->have_posts() ) : ?>
<section class="aircraft_grid_container">
	<div class="grid-sizer"></div>
	<?php $i=1; ?>			
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
	<?php
		$img = get_field('ac_main_image');
		$manufacturer = get_field('ac_manufacturer');
		$model = get_field('ac_model');
		$nnumber = get_field('ac_n_number');
		$serialnumber = get_field('ac_serial_number');
		$year = get_field('ac_year');
		$sold = get_field('ac_sold');
		$hours = get_field('ac_hours');
		$landings = get_field('ac_landings');
		$numhours = intval(str_replace(',', '', $hours));	
		$numlandings = intval(str_replace(',', '', $landings));					
	?>
	<div class="asa_aircraft" data-hours="<?php echo $numhours; ?>" data-year="<?php echo $year; ?>">
		<div class="asa_thumbnail" style="background-image: url(<?php echo $img['url']; ?>);">
		</div>
		<div class="asa_padded">
			<div class="asa_title">
				<h2 class="h3"><?php echo $manufacturer; ?>&nbsp;<?php echo $model; ?></h2>
			</div>
			<?php if( have_rows('ac_highlights') ):	?>
			<ul class="asa_highlights">
				<?php while ( have_rows('ac_highlights') ) : the_row(); ?>							
				    <li><img src="https://omniaircraftsales.com/wp-content/uploads/2018/11/OAS-Bullet.svg" alt="" /><span><?php the_sub_field('ac_bullet'); ?></span></li>							
				<?php endwhile;	?>
			</ul>
			<?php endif; ?>
			<div class="asa_info">
				<div class="asa_stat-current-acquisition">							
					<span class="asa_stat_sold oas-red">Current<br>Acquisitions</span>
				</div>
			</div>
		</div>
	</div>
	<?php $i++; ?>	
	<?php endwhile; ?>
<?php wp_reset_postdata(); ?>					
</section>
<?php endif; ?>


<?php 
	$args = array(
		'post_type' => 'aircraft',
		'posts_per_page' => -1,
		'order' 	=> 'DESC',
		'meta_query' => array(
				    array(
				      'key' => 'ac_recently_leased',
				      'value' => '1',
				      'compare' => '==' // not really needed, this is the default
				    )
				  )
	);
	$the_query = new WP_Query($args);
?>
<section id="current_acquisitions">
	<h2>Recently leased</h2>
</section>
<?php if ( $the_query->have_posts() ) : ?>
<section class="aircraft_grid_container">
	<div class="grid-sizer"></div>
	<?php $i=1; ?>			
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
	<?php
		$img = get_field('ac_main_image');
		$manufacturer = get_field('ac_manufacturer');
		$model = get_field('ac_model');
		$nnumber = get_field('ac_n_number');
		$serialnumber = get_field('ac_serial_number');
		$year = get_field('ac_year');
		$sold = get_field('ac_sold');
		$hours = get_field('ac_hours');
		$landings = get_field('ac_landings');
		$numhours = intval(str_replace(',', '', $hours));	
		$numlandings = intval(str_replace(',', '', $landings));					
	?>
	<div class="asa_aircraft" data-hours="<?php echo $numhours; ?>" data-year="<?php echo $year; ?>">
		<div class="asa_thumbnail" style="background-image: url(<?php echo $img['url']; ?>);">
		</div>
		<div class="asa_padded">
			<div class="asa_title">
				<h2 class="h3"><?php echo $manufacturer; ?>&nbsp;<?php echo $model; ?></h2>
			</div>
			<?php if( have_rows('ac_highlights') ):	?>
			<ul class="asa_highlights">
				<?php while ( have_rows('ac_highlights') ) : the_row(); ?>							
				    <li><img src="https://omniaircraftsales.com/wp-content/uploads/2018/11/OAS-Bullet.svg" alt="" /><span><?php the_sub_field('ac_bullet'); ?></span></li>							
				<?php endwhile;	?>
			</ul>
			<?php endif; ?>
			<div class="asa_info">
				<div class="asa_stat-current-acquisition">							
					<span class="asa_stat_sold oas-red">Recently<br>Leased</span>
				</div>
			</div>
		</div>
	</div>
	<?php $i++; ?>	
	<?php endwhile; ?>
<?php wp_reset_postdata(); ?>					
</section>
<?php endif; ?>
<script>
	
jQuery(document).ready(function($){

	var qsRegex;

	var $container = jQuery('.aircraft_grid_container');
    // use imagesLoaded, instead of window.load
    var $grid = $container.imagesLoaded( function() {
        $container.isotope({
          layoutMode: 'fitRows',
          percentPosition: true,
          itemSelector: '.asa_aircraft',
          /*filter: function() {
	        return qsRegex ? $(this).text().match( qsRegex ) : true;
	      },*/
          getSortData: {
		  	hours: '[data-hours] parseInt',
		  	year: '[data-year] parseInt',
		  },
          masonry: {
		    columnWidth: '.grid-sizer'
		  },
        });
    })	
    
    $('.aircraft_grid_filters').on( 'click', 'button', function() {
	    $(this).toggleClass('ascending');
	    var sortByValue = $(this).attr('data-sort-by');
	    if($(this).hasClass('ascending')){
		   $grid.isotope({ sortBy: sortByValue, sortAscending: false }); 
	    } else {
		   $grid.isotope({ sortBy: sortByValue, sortAscending: true });   
	    }
	    
	});
	
	/*	
	// use value of search field to filter
	var $quicksearch = $('.quicksearch').keyup( debounce( function() {
	  qsRegex = new RegExp( $quicksearch.val(), 'gi' );
	  $grid.isotope();
	}, 200 ) );
	
	// debounce so filtering doesn't happen every millisecond
	function debounce( fn, threshold ) {
	  var timeout;
	  threshold = threshold || 100;
	  return function debounced() {
	    clearTimeout( timeout );
	    var args = arguments;
	    var _this = this;
	    function delayed() {
	      fn.apply( _this, args );
	    }
	    timeout = setTimeout( delayed, threshold );
	  };
	}*/
	

});
	
</script>
<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.js"></script>
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
