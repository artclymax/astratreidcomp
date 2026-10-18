<?php
$page = get_page_by_path('home');
$section_title = get_field('about_title', $page) ?? '';
$section_descr = get_field('about_description', $page) ?? '';
$items = get_field('about_items', $page) ?? [];
?>
<?php if (!empty($items)): ?>
	<section class="section-full about" id="about">
		<div class="container about__container">

			<?php
			get_template_part('partials/section-header', null, [
				'title' => $section_title,
				'descr' => $section_descr
			]);
			?>


			<ul class="about__list grid">
				<?php foreach ($items as $item):
					$icon = $item['icon'] ?? null;
					$title = $item['title'] ?? '';
					$descr = $item['description'] ?? '';
					?>
					<li class="about__item about-item">
						<?php if ($icon): ?>
							<div class="about-item__icon">
								<img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt'] ?? ''); ?>" />
							</div>
						<?php endif; ?>

						<?php if ($title): ?>
							<h3 class="about-item__title title-3">
								<?php echo esc_html($title); ?>
							</h3>
						<?php endif; ?>

						<?php if ($descr): ?>
							<div class="about-item__descr descr">
								<?php echo wp_kses_post($descr); ?>
							</div>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>

		</div>
	</section>
<?php endif; ?>