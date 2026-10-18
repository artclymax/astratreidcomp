<?php
/*
Template Name: Контакты
*/
get_header(); ?>
<div class="ds-page-content-w">
	<div class="content">
		<div class="breadcrumbs">
			<?php if (function_exists('kama_breadcrumbs'))
				kama_breadcrumbs(' / '); ?>
		</div>
		<div class="s-page-title">
			<h1 class="page-t center"><?php the_title(); ?></h1>
		</div>
		<div class="contacts-bloks d-flex f-wrap">
			<div class="c-block center">
				<div class="icon">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/c-1.svg">
				</div>
				<div class="b-title">Телефоны:</div>
				<!-- phones -->
				<?php if ($phones = get_field('phones', 'options') ?? ''):
					foreach ($phones as $item):
						$aReplace = array('(', ')', ' ', '-', '+');
						$phone = $item['phone'];
						$phone_correct = str_replace($aReplace, '', $phone);
						$messengers = $item['messengers'] ?? '';
						?>
						<div class="link-w d-flex f-center" style="justify-content: center; margin-block: 8px;">
							<a href="tel:+<?php echo esc_attr($phone_correct); ?>" class="s-link phone-link d-flex f-center">
								<div class="txt"><?php echo esc_html($phone); ?></div>
							</a>
						</div>
						<?php if ($messengers): ?>
							<div class="messengers-contacts d-flex f-center" style="justify-content: center;">
								<?php foreach ($messengers as $msg): ?>
									<?php if ($msg == 'vb'): ?>
										<a href="viber://chat?number=<?php echo esc_attr($phone_correct); ?>" class="messenger">
											<svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
												<rect width="26" height="26" rx="4" fill="#605EB3" />
												<path fill-rule="evenodd" clip-rule="evenodd"
													d="M13.0001 7C11.7626 7 9.83434 7.11829 8.65954 8.23314C7.82904 9.09229 7.50014 10.2974 7.50014 11.8571L7.50007 11.9541C7.49997 12.0571 7.49986 12.1681 7.50069 12.2857C7.49986 12.4031 7.49997 12.514 7.50007 12.617L7.50014 12.714C7.50014 14.2737 7.82904 15.4789 8.65954 16.338C9.10669 16.7623 9.66439 17.0414 10.2501 17.2254V18.5357C10.2501 18.9917 10.5386 19 10.5914 19H10.5939C10.7297 18.9994 10.8472 18.9303 10.9649 18.8217C11.0091 18.7809 11.5204 18.1889 12.0764 17.5414C12.4075 17.5634 12.7221 17.5714 12.9999 17.5714C14.2374 17.5714 16.1654 17.4529 17.3405 16.338C18.1707 15.4791 18.4999 14.2737 18.4999 12.714L18.4999 12.617C18.5 12.514 18.5001 12.403 18.4993 12.2854C18.5001 12.1679 18.5 12.0571 18.4999 11.954L18.4999 11.8569C18.4999 10.2971 18.171 9.092 17.3405 8.23286C16.1657 7.11829 14.2376 7 13.0001 7ZM14.7307 13.4897C15.1526 13.7529 15.2936 13.8337 15.5992 14.1011C15.7026 14.1917 15.7499 14.2949 15.7501 14.4029C15.7504 14.5857 15.6632 14.8251 15.5469 14.9874C15.3717 15.2314 15.1333 15.4869 14.8363 15.5549C14.7926 15.5649 14.7489 15.57 14.7051 15.5714C14.3988 15.5806 14.0886 15.4566 13.8251 15.3217C13.1984 15.0009 12.5918 14.5763 12.05 14.1143C11.8768 13.9663 11.7156 13.8054 11.56 13.6391C11.3996 13.4774 11.2448 13.31 11.1026 13.13C10.658 12.5671 10.2493 11.9369 9.94049 11.2857C9.80931 11.0094 9.68776 10.6831 9.70041 10.3617C9.70206 10.3194 9.70729 10.2771 9.71609 10.2351C9.78181 9.92657 10.0274 9.67886 10.2622 9.49686C10.4184 9.376 10.6492 9.28543 10.8249 9.28571C10.9288 9.286 11.0281 9.33514 11.1153 9.44257C11.373 9.75971 11.4505 9.90629 11.7038 10.3449C11.8091 10.5274 11.9001 10.8014 11.9001 10.9474C11.9001 11.0471 11.8226 11.1666 11.7522 11.2394C11.5718 11.4271 11.3501 11.4929 11.3501 11.8214C11.3501 12.1429 11.665 12.7043 12.072 13.1071C12.4598 13.53 13.0001 13.8571 13.3095 13.8571C13.6258 13.8571 13.6849 13.6226 13.8653 13.4351C13.9357 13.362 14.0506 13.2857 14.1466 13.2857C14.2871 13.2857 14.555 13.3803 14.7307 13.4897ZM15.4751 12.4286C15.4751 12.5863 15.5983 12.7143 15.7501 12.7143C15.9019 12.7143 16.0251 12.5863 16.0251 12.4286V12.1429C16.0251 10.41 14.668 9 13.0001 9C12.8483 9 12.7251 9.128 12.7251 9.28571C12.7251 9.44343 12.8483 9.57143 13.0001 9.57143C14.3647 9.57143 15.4751 10.7251 15.4751 12.1429V12.4286ZM13.7952 11.9291C13.8273 12.0577 13.939 12.1429 14.0611 12.1429C14.0839 12.1429 14.1073 12.1397 14.1307 12.1334C14.2775 12.0934 14.3655 11.9377 14.3273 11.7849C14.2016 11.2843 13.8249 10.8931 13.3442 10.7637C13.1965 10.7246 13.0469 10.8163 13.0089 10.9689C12.971 11.1217 13.0593 11.2774 13.2064 11.3171C13.4943 11.3943 13.7198 11.6289 13.7952 11.9291ZM14.6501 12.1429C14.6501 12.3006 14.7733 12.4286 14.9251 12.4286C15.0769 12.4286 15.2001 12.3006 15.2001 12.1429C15.2001 10.928 14.2855 9.926 13.1176 9.862C12.9682 9.85343 12.8365 9.97457 12.8285 10.1323C12.8206 10.2897 12.9369 10.4243 13.0887 10.4326C13.9643 10.4806 14.6501 11.232 14.6501 12.1429Z"
													fill="white" />
											</svg>
										</a>
									<?php endif; ?>
									<?php if ($msg == 'wh'): ?>
										<a href="https://wa.me/<?php echo esc_attr($phone_correct); ?>" class="messenger">
											<svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
												<rect width="26" height="26" rx="4" fill="#48C95F" />
												<path
													d="M17.2439 8.75C16.115 7.625 14.6098 7 13.0209 7C9.71777 7 7.04181 9.66667 7.04181 12.9583C7.04181 14 7.33449 15.0417 7.83624 15.9167L7 19L10.1777 18.1667C11.0557 18.625 12.0174 18.875 13.0209 18.875C16.324 18.875 19 16.2083 19 12.9167C18.9582 11.375 18.3728 9.875 17.2439 8.75ZM15.9059 15.0833C15.7805 15.4167 15.1951 15.75 14.9024 15.7917C14.6516 15.8333 14.3171 15.8333 13.9826 15.75C13.7735 15.6667 13.4808 15.5833 13.1463 15.4167C11.6411 14.7917 10.6794 13.2917 10.5958 13.1667C10.5122 13.0833 9.96864 12.375 9.96864 11.625C9.96864 10.875 10.3449 10.5417 10.4704 10.375C10.5958 10.2083 10.7631 10.2083 10.8885 10.2083C10.9721 10.2083 11.0976 10.2083 11.1812 10.2083C11.2648 10.2083 11.3902 10.1667 11.5157 10.4583C11.6411 10.75 11.9338 11.5 11.9756 11.5417C12.0174 11.625 12.0174 11.7083 11.9756 11.7917C11.9338 11.875 11.892 11.9583 11.8084 12.0417C11.7247 12.125 11.6411 12.25 11.5993 12.2917C11.5157 12.375 11.4321 12.4583 11.5157 12.5833C11.5993 12.75 11.892 13.2083 12.3519 13.625C12.9373 14.125 13.3972 14.2917 13.5645 14.375C13.7317 14.4583 13.8153 14.4167 13.899 14.3333C13.9826 14.25 14.2753 13.9167 14.3589 13.75C14.4425 13.5833 14.5679 13.625 14.6934 13.6667C14.8188 13.7083 15.5714 14.0833 15.6969 14.1667C15.8641 14.25 15.9477 14.2917 15.9895 14.3333C16.0314 14.4583 16.0314 14.75 15.9059 15.0833Z"
													fill="white" />
											</svg>
										</a>
									<?php endif; ?>
									<?php if ($msg == 'tg'): ?>
										<a href="https://t.me/+<?php echo esc_attr($phone_correct); ?>" class="messenger">
											<svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
												<rect width="26" height="26" rx="4" fill="#27A6E5" />
												<path
													d="M18.5 8.35425L16.76 17.5837C16.76 17.5837 16.5166 18.2236 15.8478 17.9167L11.8332 14.678L11.8146 14.6684C12.3568 14.1561 16.5619 10.178 16.7457 9.99772C17.0302 9.71845 16.8536 9.55219 16.5232 9.76315L10.3118 13.9135L7.91547 13.0652C7.91547 13.0652 7.53836 12.924 7.50208 12.6171C7.46532 12.3097 7.92789 12.1435 7.92789 12.1435L17.6971 8.11115C17.6971 8.11115 18.5 7.73996 18.5 8.35425Z"
													fill="white" />
											</svg>
										</a>
									<?php endif; ?>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
					<?php endforeach;
				endif; ?>
			</div>
			<div class="c-block center">
				<div class="icon">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/c-2.svg">
				</div>
				<div class="b-title">email:</div>
				<div class="link-w center">
					<?php if (get_field('email', 'option')) { ?>
						<a href="mailto:<?php the_field('email', 'option'); ?>" class="">
							<?php the_field('email', 'option'); ?>
						</a>
					<?php } ?>
				</div>
			</div>
			<div class="c-block center">
				<div class="icon">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/c-3.svg">
				</div>
				<div class="b-title">Адрес:</div>
				<div class="link-w center">
					<?php echo wp_kses_post(get_field('address', 'option')) ?>
				</div>
				<div class="link-w"><b>Время работы:</b> <?php the_field('mode', 'option'); ?></div>
			</div>
			<div class="c-block center">
				<div class="icon">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/c-4.svg">
				</div>
				<div class="b-title">Соц.сети:</div>
				<?php if ($socials = get_field('socials', 'option')): ?>
					<div class="link-w center d-flex socials">
						<?php foreach ($socials as $item): ?>
							<a href="<?php echo esc_html($item['link']) ?>" target="_blank">
								<?php echo wp_get_attachment_image(
									$item['image']['ID'],
									'large',
									false,
									array(
										'class' => 'img',
										'alt' => $item['image']['alt'] ?: $item['title']
									)
								); ?>
							</a>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>

			</div>
		</div>
		<div class="map-w">
			<?php echo get_field('karta', 'option'); ?>
		</div>
	</div>
</div>
<?php get_template_part('template-parts/feedback'); ?>
<?php get_footer();