<?php
add_action(
	'wp_enqueue_scripts',
	function () {
		wp_enqueue_style(
			'tsukikusa-nomarize',
			get_stylesheet_uri()
		);
	}
);
