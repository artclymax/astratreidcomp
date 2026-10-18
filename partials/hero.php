<?php
$page = get_page_by_path('home');
$title = get_field('hero_title') ?: get_field('hero_title', $page) ?? '';
$descr = get_field('hero_description') ?: get_field('hero_description', $page) ?? '';
$btn = get_field('hero_btn') ?: get_field('hero_btn', $page) ?? [];
$bg_big = get_field('hero_bg_big') ?: get_field('hero_bg_big', $page) ?? null;
$bg_small = get_field('hero_bg_small') ?: get_field('hero_bg_small', $page) ?? null;
?>

<section class="hero jarallax" id="hero">
	<div class="container hero__container">
		<div class="hero__content">
			<?php if ($title): ?>
				<h1 class="hero__title title-1">
					<?php echo wp_kses_post($title); ?>
				</h1>
			<?php endif; ?>

			<?php if ($descr): ?>
				<div class="hero__descr descr">
					<?php echo wp_kses_post($descr); ?>
				</div>
			<?php endif; ?>

			<?php if ($btn): ?>
				<a class="hero__btn btn" href="<?php echo esc_url($btn['url']); ?>">
					<?php echo esc_html($btn['title']); ?>
				</a>
			<?php endif; ?>
		</div>
	</div>

	<div class="hero__bg-box image-box jarallax-img">
		<?php if ($bg_big): ?>
			<img class="hero__bg-big hidden-mobile" src="<?php echo esc_url($bg_big['url']); ?>"
				alt="<?php echo esc_attr($bg_big['alt'] ?? ''); ?>" />
		<?php endif; ?>
		<?php if ($bg_small): ?>
			<img class="hero__bg-small visible-mobile" src="<?php echo esc_url($bg_small['url']); ?>"
				alt="<?php echo esc_attr($bg_small['alt'] ?? ''); ?>" />
		<?php endif; ?>
	</div>
</section>