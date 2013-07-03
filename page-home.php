<?php
/*
Template Name: Home
*/
get_header(); ?>

<?php
	
	$agent = get_posts(array(
							'posts_per_page' => 1,
							'post_type' => 'agents'
						));

?>

<!-- Row for main content area -->
	<div class="small-12 large-8 columns" role="main">

	</div>

	<div class="small-12 large-4 columns agent-sidebar">
		<div class="row agent-info">
			<div class="small-4 large-4 columns">
				<?php foreach ($agent as $a) : $id = $a->ID; ?>
					<img src="<?php the_field('image', $id); ?>">
				<?php endforeach; ?>
			</div>
			<div class="small-8 large-8 columns">
				<?php foreach ($agent as $a) : $id = $a->ID; ?>
					<h3><?php the_field('name', $id); ?></h3>
					<p class="agent-title"><?php the_field('title', $id); ?></p>
					<p>(512) 480-0848</p>
					<p>eric@ericmoreland.com</p>
					<p>http://ericmoreland.com</p>
				<?php endforeach; ?>
			</div>
		</div>

		<div class="row more-info">
			<div class="small-4 large-4 columns flushleft">
				<img src="<?php the_field('agency_logo', $id); ?>" />
			</div>
			<div class="small-8 large-8 columns flushright">
				<h3><a href="#">Request More Info</a></h3>
			</div>
		</div>
	</div>


		
<?php get_footer(); ?>