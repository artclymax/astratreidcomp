<?php
$page = 'option';

$logo = get_field('footer_logo', $page) ?? '';
$descr = get_field('footer_descr', $page) ?? get_bloginfo('description');
$copy = get_field('footer_copy', $page) ?: get_bloginfo('name');
$links = get_field('footer_links', $page) ?? '';
$year = get_field('footer_year', $page) ?? '';
$payment_title = get_field('contacts_payment_label', $page) ?? '';
$payment = get_field('contacts_payment', $page) ?? '';
?>
<footer class="footer">
	<div class="footer__container container">
		<div class="footer__top">
			<div class="footer__info">
				<div class="footer__logo logo">
					<?php mx_logo('', $logo); ?>
				</div>
				<div class="footer__descr descr">
					<?php echo wp_kses_post($descr) ?>
				</div>
				<?php if ($copy): ?>
					<div class="footer__copy">
						&copy; <?php echo esc_html($copy) . ', ' . esc_html($year) . ' - ' . date('Y') ?>
					</div>
				<?php endif; ?>
			</div>
			<nav class="footer__menu">
				<h3 class="footer__title">
					Навигация
				</h3>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer-menu',
						'container' => false,
						'menu_class' => 'footer-menu',
						'depth' => 1
					)
				); ?>
			</nav>
			<?php if ($payment): ?>
				<div class="footer__payment">
					<h3 class="footer__title">
						<?php echo esc_html($payment_title) ?>
					</h3>
					<div class="footer__payment-descr descr">
						<?php echo wp_kses_post($payment) ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
		<?php if ($links): ?>
			<div class="footer__bottom">
				<div class="footer__links links">
					<?php foreach ($links as $item): ?>
						<a class="footer__link link" href="<?php echo esc_attr($item['footer_links_link']['url'] ?? '') ?>">
							<?php echo esc_html($item['footer_links_link']['title'] ?? '') ?>
						</a>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</footer>