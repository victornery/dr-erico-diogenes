<?php require MBB_INC_DIR . 'components/tabs.php'; ?>

<div id="export-gui" ng-app="Builder">

	<p>
		The snippet below is the generated code of current meta box.<br>
		This helpful when you:
		<ul>
			<li>- Copy or share meta box to other location which doesn't have Meta Box Builder installed.</li>
			<li>- Improve the performance since the meta box is loaded directly from your file.</li>
		</ul>

		To use this, the easiest way is copy whole snippet to your theme <code>functions.php</code>. <br>
		If you wanna take a deeper look inside how to register meta box. See <a href="https://metabox.io/docs/registering-meta-boxes/">Register Meta Box</a> guide.
	</p>

	<div ng-controller="BuilderController" ng-init="init()">
		<?php ob_start(); ?>
add_filter( 'rwmb_meta_boxes', 'your_prefix_register_meta_boxes' );
function your_prefix_register_meta_boxes( $meta_boxes ) {
	<?php
	$d = preg_replace( "/[0-9]+ \=\>/i", '', var_export( $this->meta, true ) );
	$d = str_replace( "=> \n", '=> ', $d );
	$d = str_replace( "\n", "\n\t", $d );
	$d = str_replace( "\t\t)", "\t)", $d );
	echo '$meta_boxes[] = ' . $d;
	?>;

	return $meta_boxes;
}
		<?php
		$output = "<?php\n" . ob_get_clean();

		@ini_set( 'highlight.default', '#FF5370');
		@ini_set( 'highlight.string', '#C3E887' );
		@ini_set( 'highlight.comment', '#546E7A' );
		@ini_set( 'highlight.keyword', '#C792EA' );
		@ini_set( 'highlight.html', "#55C1B7");

		$output = highlight_string( trim( $output ), true );
		?>
		<pre class="builder-code"><?php echo trim( $output ); ?></pre>
	</div><!--.menu-settings-->
</div>
