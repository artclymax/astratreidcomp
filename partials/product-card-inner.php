<?php
$image_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
$title = get_the_title();
$pack = get_field('product_packaging');

$tags = get_the_terms(get_the_ID(), 'product_tag');
$tags_html = '';
if ($tags && !is_wp_error($tags)) {
	$tags_html = '<ul class="products-grid-item__tags">';
	foreach ($tags as $tag) {
		$tags_html .= '<li class="products-grid-item__tag">' . esc_html($tag->name) . '</li>';
	}
	$tags_html .= '</ul>';
}
?>

<div class="products-grid-item__image image-box">
	<?php if ($image_url): ?>
		<img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($title); ?>" loading="lazy" />
	<?php endif; ?>
</div>

<div class="products-grid-item__content">
	<?php echo $tags_html; ?>
	<h3 class="products-grid-item__title title-4"><?php echo esc_html($title); ?></h3>
	<?php if ($pack): ?>
		<div class="products-grid-item__pack icon icon--pack">
			<span>Упаковка: <?php echo esc_html($pack); ?></span>
		</div>
	<?php endif; ?>
</div>