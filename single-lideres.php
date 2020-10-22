<?php 

	get_header();

	if(have_posts())
		the_post();

	if (get_field('lider_redes_sociais'))
		$lider_social = get_field('lider_redes_sociais');

	require(get_template_directory() . '/components/parent/header.php');

?>
<section class="pa-content pa-lideres my-5">
	<div class="container">
		<div class="pa-lider-geral row row-cols-auto mb-5">
			<div class="col-12 col-xl-4 text-center mb-4">
				<?php echo get_the_post_thumbnail( get_the_ID(), 'lider-thumb', array( 'class' => 'pa-lider-thumb rounded-circle mx-auto' ) ); ?>
				<div class="mt-4">
					<ul class="pa-lider-contact list-inline">
					<?php if ($lider_social['lider_facebook']):?>
						<li class="list-inline-item mx-2"><a href="<?= $lider_social['lider_facebook']; ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
					<?php endif;
						if ($lider_social['lider_twitter']):
					?>
						<li class="list-inline-item mx-2"><a href="<?= $lider_social['lider_twitter']; ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
					<?php endif;
						if ($lider_social['lider_instagram']):
					?>
						<li class="list-inline-item mx-2"><a href="<?= $lider_social['lider_instagram']; ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
					<?php endif;
						if ($lider_social['lider_email']):
					?>
						<li class="list-inline-item mx-2"><a href="mailto:<?= $lider_social['lider_email']; ?>" target="_blank"><i class="fas fa-envelope"></i></a></li>
					<?php endif; ?>
					</ul>
				</div>
			</div>
			<div class="col col-xl-8">
				<h1 class="h2 font-weight-bold"><?php the_title(); ?></h1>
				<h5 class="mb-4"><?php the_field('lider_cargo'); ?></h5>
				<div class="pa-lider-bio">
					<?php the_field('lider_bibliografia'); ?>
				</div>
				<?php 
					if (have_rows('lider_equipe')):
						echo "<hr class='my-5'>";
						while(have_rows('lider_equipe')): the_row();
							$img = get_sub_field('lider_equipe_foto');
				?>
				<div class="pa-lider-equipe mb-5 clearfix">
					<img src="<?php echo esc_url($img['sizes']['thumbnail']); ?>" alt="<?php the_sub_field('lider_equipe_nome'); ?>" class="pa-lider-thumb rounded-circle float-left mr-3 d-none d-xl-block" width="120" height="120">
					<ul class="ml-3 list-unstyled">
						<li><h4 class="mb-0"><?php the_sub_field('lider_equipe_nome'); ?></h4></li>
						<li class="mb-2"><em><?php the_sub_field('lider_equipe_cargo'); ?></em></li>
						<?php if (get_sub_field('lider_equipe_email')): ?><li><a href="mailto:<?php the_sub_field('lider_equipe_email'); ?>"><i class="fas fa-envelope mr-3"></i><?php the_sub_field('lider_equipe_email'); ?></a></li><?php endif; ?>
						<?php if (get_sub_field('lider_equipe_telefone')): ?><li><a href="tel:<?php the_sub_field('lider_equipe_telefone'); ?>"><i class="fas fa-phone mr-3"></i><?php the_sub_field('lider_equipe_telefone'); ?></a></li><?php endif; ?>
					</ul>
				</div>
					<?php endwhile; endif; ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer();?>