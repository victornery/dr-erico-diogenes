<h2 class="nav-tab-wrapper wp-clearfix">

    <?php 
	$tabs = mbb_get_tabs();
	$active = mbb_get_current_tab();

	if (empty($this->meta)) {
		unset($tabs['code']);
	}

	foreach ($tabs as $key => $title) :
	?>
	<a href="<?php echo add_query_arg('tab', $key); ?>" class="nav-tab <?php if ($active === $key ) echo 'nav-tab-active' ?>">
		<?php echo esc_html($title); ?>
	</a>
	<?php endforeach; ?>
</h2>