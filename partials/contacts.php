<?php
$page = 'option';
$section_title = get_field('contacts_section_title', $page) ?? '';
$section_descr = get_field('contacts_section_description', $page) ?? '';
$phones = get_field('contacts_phones', $page) ?? [];
$emails = get_field('contacts_emails', $page) ?? [];
$address_label = get_field('contacts_address_label', $page) ?? '';
$address = get_field('contacts_address', $page) ?? '';
$form_title = get_field('contacts_form_title', $page) ?? '';
$form_shortcode = get_field('contacts_form_shortcode', $page) ?? '';
?>

<section class="section-full contacts" id="contacts">
	<div class="container contacts__container">
		<div class="contacts__info">
			<?php get_template_part('partials/section-header', null, [
				'title' => $section_title,
				'descr' => $section_descr
			]); ?>

			<ul class="contacts__list">
				<?php if (!empty($phones)): ?>
					<?php foreach ($phones as $phone):
						$clean_phone = preg_replace('/[^\d+]/', '', $phone['phone_value'] ?? '');
						?>
						<li class="contacts__item contacts-item">
							<div class="contacts-item__icon icon icon--contacts-phone"></div>
							<div class="contacts-item__content">
								<?php if (!empty($phone['phone_label'])): ?>
									<p class="contacts-item__caption"><?php echo esc_html($phone['phone_label']); ?></p>
								<?php endif; ?>
								<a class="contacts-item__link" href="tel:<?php echo esc_attr($clean_phone); ?>">
									<?php echo esc_html($phone['phone_value']); ?>
								</a>
							</div>
						</li>
					<?php endforeach; ?>
				<?php endif; ?>

				<?php if (!empty($emails)): ?>
					<?php foreach ($emails as $email): ?>
						<li class="contacts__item contacts-item">
							<div class="contacts-item__icon icon icon--contacts-mail"></div>
							<div class="contacts-item__content">
								<?php if (!empty($email['email_label'])): ?>
									<p class="contacts-item__caption"><?php echo esc_html($email['email_label']); ?></p>
								<?php endif; ?>
								<a class="contacts-item__link contacts-item__link--mail"
									href="mailto:<?php echo esc_attr($email['email_value']); ?>">
									<?php echo esc_html($email['email_value']); ?>
								</a>
							</div>
						</li>
					<?php endforeach; ?>
				<?php endif; ?>

				<?php if ($address): ?>
					<li class="contacts__item contacts-item">
						<div class="contacts-item__icon icon icon--contacts-address"></div>
						<div class="contacts-item__content">
							<?php if ($address_label): ?>
								<p class="contacts-item__caption"><?php echo esc_html($address_label); ?></p>
							<?php endif; ?>
							<div class="contacts-item__address descr"><?php echo wp_kses_post($address); ?></div>
						</div>
					</li>
				<?php endif; ?>
			</ul>
		</div>

		<div class="contacts__form contacts-form">
			<?php if ($form_title): ?>
				<h3 class="contacts-form__title title-3"><?php echo esc_html($form_title); ?></h3>
			<?php endif; ?>

			<?php if ($form_shortcode): ?>
				<div class="contacts-form__wrapper">
					<?php echo do_shortcode($form_shortcode); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>