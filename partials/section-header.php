<?php
$title = $args['title'] ?? '';
$descr = $args['descr'] ?? '';
?>

<?php if ($title || $descr): ?>
	<div class="section-header">
		<?php if ($title): ?>
			<h2 class="section-header__title title-2">
				<?php echo wp_kses_post($title); ?>
			</h2>
		<?php endif; ?>

		<?php if ($descr): ?>
			<div class="section-header__descr descr">
				<?php echo wp_kses_post($descr); ?>
			</div>
		<?php endif; ?>
	</div>
<?php endif; ?>