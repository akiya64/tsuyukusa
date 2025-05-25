<?php
add_editor_style( '/css/editor-style.css');
add_editor_style( '/css/prism.css');

add_action(
	'wp_enqueue_scripts',
	function () {
		wp_enqueue_style(
			'tsuyukusa',
			get_template_directory_uri() . '/css/tsuyukusa.css',
			array(),
			'0.10.0',
			'all'
		);

		wp_enqueue_style(
			'prism-css',
			get_template_directory_uri() . '/css/prism.css',
			array(),
			'0.10.0',
			'all'
		);

		wp_enqueue_script(
			'prism',
			get_template_directory_uri() . '/js/prism.js',
			array('jquery'),
			true
		);
	}
);

add_action(
	'pre_get_posts',
	function( $query ){
		if ( $query->is_main_query() && is_date() ){
			set_query_var( 'order', 'asc' );
			set_query_var( 'cat', '6,87');
		}
		return;
	}
);

add_filter(
	'getarchives_join',
	function () {
		return 'LEFT JOIN wp_term_relationships ON (wp_posts.ID = wp_term_relationships.object_id)';
	}
);

add_filter(
	'getarchives_where',
	function () {
		return 'WHERE ( wp_term_relationships.term_taxonomy_id IN (6,87) )';
	}
);

register_block_style(
	'core/avatar',
	array(
		'name'         => 'circle',
		'label'        => __( '円', 'tsuyukusa' ),
		'inline_style' => '.wp-block-avatar.is-style-circle > img { border-radius: 50%; }',
	)
);
