<button data-toggle="collapse" data-target="#faq-<?php the_ID(); ?>" class="collapsed faq-button"> <?php the_title(); ?></button>	
<div id="faq-<?php the_ID(); ?>" class="collapse faq-content">
	<?php the_content(); ?>
</div>