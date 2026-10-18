<?php
$page = get_page_by_path('home');
$section_title = get_field('products_section_title', $page) ?? '';
$section_descr = get_field('products_section_description', $page) ?? '';

$note_title = get_field('products_note_title', $page) ?? '';
$note_descr = get_field('products_note_description', $page) ?? '';
$note_btn = get_field('products_note_btn', $page) ?? [];

$taxonomy = 'product_cat';
$categories = get_terms([
	'taxonomy' => $taxonomy,
	'hide_empty' => false,
	'orderby' => 'menu_order',
]);
?>

<section class="products" id="products">
	<div class="container products__container">
		<?php get_template_part('partials/section-header', null, [
			'title' => $section_title,
			'descr' => $section_descr
		]); ?>

		<!-- TABS -->
		<ul class="products__tabs products-tabs">
			<?php foreach ($categories as $index => $cat):
				$is_active = $index === 0 ? 'active-tab' : '';
				?>
				<li class="products-tabs__item">
					<a class="products-tabs__link <?php echo $is_active; ?>" href="#<?php echo esc_attr($cat->slug); ?>"
						data-tab-link>
						<?php echo esc_html($cat->name); ?>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>

		<!-- TAB CONTENT -->
		<?php foreach ($categories as $index => $cat):
			$is_active = $index === 0 ? 'active-tab' : '';
			$tab_id = esc_attr($cat->slug);

			$query = new WP_Query([
				'post_type' => 'product',
				'posts_per_page' => -1,
				'tax_query' => [
					[
						'taxonomy' => $taxonomy,
						'field' => 'slug',
						'terms' => $cat->slug,
					],
				],
				'orderby' => 'menu_order',
				'order' => 'ASC'
			]);

			if ($query->have_posts()):
				?>
				<div class="products__tab products-tab <?php echo $is_active; ?>" id="<?php echo $tab_id; ?>" data-tab>
					<!-- Grid (Desktop) -->
					<ul class="products-tab__grid grid hidden-mobile">
						<?php while ($query->have_posts()):
							$query->the_post(); ?>
							<li class="products-grid-item">
								<?php get_template_part('partials/product-card-inner'); ?>
							</li>
						<?php endwhile; ?>
					</ul>

					<!-- Swiper (Mobile) -->
					<div class="swiper products-swiper visible-mobile products-swiper-<?php echo $tab_id; ?>"
						data-swiper='{"slidesPerView": 1, "spaceBetween": 24, "rewind": true}'>
						<div class="swiper-wrapper products-swiper__wrapper">
							<?php $query->rewind_posts();
							while ($query->have_posts()):
								$query->the_post(); ?>
								<div class="swiper-slide products-slide">
									<div class="products-slide__wrapper products-grid-item">
										<?php get_template_part('partials/product-card-inner'); ?>
									</div>
								</div>
							<?php endwhile; ?>
						</div>
						<div class="swiper-pagination products-swiper__pagination"
							data-swiper-pagination=".products-swiper-<?php echo $tab_id; ?>"></div>
					</div>
				</div>
				<?php wp_reset_postdata(); ?>
			<?php endif; endforeach; ?>

		<!-- NOTE / CTA -->
		<div class="products__note products-note">
			<h3 class="products-note__title title-2">
				<?php echo esc_html($note_title); ?>
			</h3>
			<?php if ($note_descr): ?>
				<div class="products-note__descr descr">
					<p>
						<?php echo wp_kses_post($note_descr); ?>
					</p>
				</div>
			<?php endif; ?>
			<?php if ($note_btn): ?>
				<a class="products-note__btn btn" href="<?php echo esc_url($note_btn['url']); ?>">
					<?php echo esc_html($note_btn['title']); ?>
				</a>
			<?php endif; ?>
		</div>
	</div>
</section>