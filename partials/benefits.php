<?php
$page = get_page_by_path('home');
$section_title = get_field('benefits_section_title', $page) ?? '';
$items = get_field('benefits_list', $page) ?? [];
?>

<?php if (!empty($items)): ?>
	<section class="section-full benefits" id="benefits">
		<div class="container benefits__container">

			<?php get_template_part('partials/section-header', null, ['title' => $section_title]); ?>

			<ul class="benefits__list">
				<?php foreach ($items as $item):
					$icon = $item['benefit_icon'] ?? null;
					$title = $item['benefit_title'] ?? '';
					$descr = $item['benefit_description'] ?? '';
					?>
					<li class="benefits__item benefits-item">
						<?php if ($icon): ?>
							<div class="benefits-item__icon">
								<img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt'] ?? ''); ?>" />
							</div>
						<?php endif; ?>

						<div class="benefits-item__content">
							<?php if ($title): ?>
								<h3 class="benefits-item__title title-3">
									<?php echo esc_html($title); ?>
								</h3>
							<?php endif; ?>

							<?php if ($descr): ?>
								<div class="benefits-item__descr descr">
									<?php echo wp_kses_post($descr); ?>
								</div>
							<?php endif; ?>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>

		</div>
	</section>
<?php endif; ?>