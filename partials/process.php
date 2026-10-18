<?php
$page = get_page_by_path('home');

$title = get_field('process_title', $page) ?? '';
$descr = get_field('process_descr', $page) ?? '';
$gallery = get_field('process_gallery', $page) ?? '';
$list = get_field('process_list', $page) ?? '';

?>
<?php if ($list): ?>
	<section class="process" id="process">
		<div class="container process__container">
			<?php get_template_part('partials/section-header', null, [
				'title' => $title,
				'descr' => $descr
			]); ?>
			<div class="swiper process-swiper"
				data-swiper="{'slidesPerView': 1.5, 'breakpoints': { '480': { 'slidesPerView': 2 }, '768': { 'slidesPerView': 3 } , '1024': { 'slidesPerView': 5 } }}">
				<div class="swiper-wrapper process-swiper__wrapper">
					<?php foreach ($list as $index => $item): ?>
						<div class="swiper-slide process-slide">
							<div class="process-slide__wrapper">
								<span class="process-slide__num title-3">
									<?= ++$index > 9 ? $index : '0' . $index; ?>
								</span>
								<h3 class="process-slide__title title-3">
									<?php echo esc_html($item['title']) ?>
								</h3>
								<div class="process-slide__descr descr">
									<?php echo wp_kses_post($item['descr']) ?>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>

			<?php if ($gallery): ?>
				<div class="process__image-wrapper">
					<?php foreach ($gallery as $item): ?>
						<div class="process__image image-box">
							<?php echo wp_get_attachment_image(
								$item['ID'],
								'large',
								false,
								array(
									'class' => 'img',
									'alt' => $item['alt'] ?: $item['title']
								)
							); ?>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>