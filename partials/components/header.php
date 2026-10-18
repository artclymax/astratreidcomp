<?php
$page = 'option';
$logo_big = get_field('header_logo_big', $page) ?? null;
$logo_small = get_field('header_logo_small', $page) ?? null;
$phone = get_field('header_phone', $page) ?? '';
$phone_label = get_field('header_phone_label', $page) ?? '';
$btn = get_field('header_btn', $page) ?? [];
?>

<header class="header" data-auto-calc="header, height">
	<div class="container header__container">
		<!-- LOGO -->
		<div class="header__logo logo">
			<a href="<?php echo esc_url(home_url('/')); ?>">
				<?php if ($logo_big): ?>
					<img class="hidden-tablet" src="<?php echo esc_url($logo_big['url']); ?>"
						alt="<?php echo esc_attr($logo_big['alt'] ?? 'Логотип'); ?>" />
				<?php endif; ?>
				<?php if ($logo_small): ?>
					<img class="visible-tablet" src="<?php echo esc_url($logo_small['url']); ?>"
						alt="<?php echo esc_attr($logo_small['alt'] ?? 'Логотип'); ?>" />
				<?php endif; ?>
			</a>
		</div>

		<!-- MENU -->
		<nav class="header__menu header-menu">
			<!-- MENU LIST -->
			<?php
			wp_nav_menu(array(
				'theme_location' => 'header-menu',
				'container' => false,
				'menu_class' => 'header-menu__list',
				'depth' => 1,
				'fallback_cb' => false
			));
			?>

			<!-- HEADER MENU BOX -->
			<div class="header-menu__box">
				<!-- PHONE -->
				<?php if ($phone): ?>
					<div class="header-menu__phone-box header-phone hidden-tablet">
						<?php if ($phone_label): ?>
							<p class="header-phone__text"><?php echo esc_html($phone_label); ?></p>
						<?php endif; ?>
						<a class="header-phone__link icon icon--header-phone"
							href="tel:+<?php echo esc_attr(correct_phone($phone)); ?>">
							<?php echo esc_html($phone); ?>
						</a>
					</div>
				<?php endif; ?>

				<!-- BUTTON -->
				<?php if ($btn): ?>
					<a class="header-menu__btn btn" href="<?php echo esc_url($btn['url']); ?>">
						<?php echo esc_html($btn['title']); ?>
					</a>
				<?php endif; ?>
			</div>
		</nav>

		<!-- VISIBLE MOBILE PHONE -->
		<?php if ($phone): ?>
			<a class="header__phone-btn phone-btn visible-tablet" aria-label="Телефон"
				href="tel:+<?php echo esc_attr(correct_phone($phone)); ?>">
				<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path
						d="M10.9722 6.6454C10.6978 5.72985 10.5091 4.79076 10.4085 3.84026C10.308 2.89263 9.48071 2.1875 8.52796 2.1875H4.1078C2.97077 2.1875 2.09544 3.16968 2.19526 4.3016C3.20304 15.7097 12.2903 24.7963 23.6984 25.8047C24.831 25.9045 25.8125 25.0324 25.8125 23.8954V19.9538C25.8125 18.5154 25.1074 17.6913 24.1597 17.5908C23.2093 17.4905 22.2702 17.302 21.3546 17.0278C20.8118 16.8668 20.2355 16.8557 19.6869 16.9958C19.1383 17.1358 18.6378 17.4217 18.2385 17.8231L16.3464 19.7152C12.9343 17.8666 10.1334 15.0657 8.28481 11.6536L10.1769 9.76152C10.5784 9.36229 10.8644 8.86183 11.0046 8.31322C11.1447 7.76461 11.1331 7.18829 10.9722 6.6454Z"
						fill="currentColor" />
				</svg>
			</a>
		<?php endif; ?>

		<!-- BURGER -->
		<button class="header__burger-btn burger-btn visible-tablet" type="button" aria-label="Открыть/закрыть меню">
			<span></span>
		</button>
	</div>
</header>