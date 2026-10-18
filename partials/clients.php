<?php
$page = get_page_by_path('home');
$section_title = get_field('clients_section_title', $page) ?? '';
$section_descr = get_field('clients_section_description', $page) ?? '';
$logos = get_field('clients_logos', $page) ?? [];
?>

<?php if (!empty($logos)): ?>
	<section class="section-full clients" id="clients">
		<div class="container clients__container">

			<?php get_template_part('partials/section-header', null, [
				'title' => $section_title,
				'descr' => $section_descr
			]); ?>

			<ul class="clients__list grid">
				<?php foreach ($logos as $logo):
					?>
					<li class="clients__item image-box">
						<?php echo wp_get_attachment_image(
							$logo['ID'],
							'large',
							false,
							array(
								'class' => 'img',
								'alt' => $logo['alt'] ?: ''
							)
						); ?>
					</li>
				<?php endforeach; ?>
			</ul>

		</div>
	</section>
<?php endif; ?>