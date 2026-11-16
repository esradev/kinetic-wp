<?php
/**
 * Portfolio content model, administration, REST support and presentation helpers.
 *
 * @package Romonet_WPStorm
 */

defined( 'ABSPATH' ) || exit;

function romonet_register_portfolio_content() {
	register_post_type(
		'portfolio',
		array(
			'labels' => array(
				'name'               => 'نمونه‌کارها',
				'singular_name'      => 'نمونه‌کار',
				'add_new'            => 'افزودن نمونه‌کار',
				'add_new_item'       => 'افزودن نمونه‌کار',
				'edit_item'          => 'ویرایش نمونه‌کار',
				'view_item'          => 'مشاهده نمونه‌کار',
				'all_items'          => 'همه نمونه‌کارها',
				'search_items'       => 'جستجوی نمونه‌کارها',
				'not_found'          => 'نمونه‌کاری پیدا نشد.',
				'menu_name'          => 'نمونه‌کارها',
			),
			'public'              => true,
			'show_in_rest'        => true,
			'has_archive'         => 'portfolio',
			'rewrite'             => array( 'slug' => 'portfolio', 'with_front' => false ),
			'menu_icon'           => 'dashicons-portfolio',
			'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields' ),
			'map_meta_cap'        => true,
		)
	);

	register_taxonomy(
		'portfolio_category',
		'portfolio',
		array(
			'labels' => array(
				'name'          => 'دسته‌بندی نمونه‌کارها',
				'singular_name' => 'دسته‌بندی نمونه‌کار',
				'add_new_item'  => 'دسته‌بندی جدید',
				'all_items'     => 'همه دسته‌بندی‌ها',
				'edit_item'     => 'ویرایش دسته‌بندی',
			),
			'public'            => true,
			'show_in_rest'      => true,
			'hierarchical'      => true,
			'rewrite'           => array( 'slug' => 'portfolio-category', 'with_front' => false ),
			'show_admin_column' => true,
		)
	);
}
add_action( 'init', 'romonet_register_portfolio_content' );

function romonet_flush_portfolio_rewrites() {
	romonet_register_portfolio_content();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'romonet_flush_portfolio_rewrites' );
add_action( 'switch_theme', 'flush_rewrite_rules' );

function romonet_portfolio_meta_definitions() {
	return array(
		'_romonet_portfolio_type'              => array( 'type' => 'string', 'single' => true, 'show_in_rest' => true ),
		'_romonet_portfolio_client'            => array( 'type' => 'string', 'single' => true, 'show_in_rest' => true ),
		'_romonet_portfolio_website_url'       => array( 'type' => 'string', 'single' => true, 'show_in_rest' => true ),
		'_romonet_portfolio_completion_date'   => array( 'type' => 'string', 'single' => true, 'show_in_rest' => true ),
		'_romonet_portfolio_technologies'      => array( 'type' => 'array', 'single' => true, 'show_in_rest' => true, 'items' => array( 'type' => 'string' ) ),
		'_romonet_portfolio_services'          => array( 'type' => 'array', 'single' => true, 'show_in_rest' => true, 'items' => array( 'type' => 'string' ) ),
		'_romonet_portfolio_featured'          => array( 'type' => 'boolean', 'single' => true, 'show_in_rest' => true ),
		'_romonet_portfolio_gallery'           => array( 'type' => 'array', 'single' => true, 'show_in_rest' => true, 'items' => array( 'type' => 'integer' ) ),
	);
}

function romonet_register_portfolio_meta() {
	foreach ( romonet_portfolio_meta_definitions() as $key => $args ) {
		$args['object_subtype']    = 'portfolio';
		if ( 'array' === $args['type'] ) {
			$args['show_in_rest'] = array(
				'schema' => array(
					'type'  => 'array',
					'items' => $args['items'],
				),
			);
			unset( $args['items'] );
		}
		$args['sanitize_callback'] = 'romonet_sanitize_portfolio_rest_meta';
		register_post_meta( 'portfolio', $key, $args );
	}
}
add_action( 'init', 'romonet_register_portfolio_meta' );

function romonet_sanitize_portfolio_rest_meta( $value, $key ) {
	if ( '_romonet_portfolio_gallery' === $key ) {
		return is_array( $value ) ? array_values( array_filter( array_map( 'absint', $value ) ) ) : array();
	}
	if ( in_array( $key, array( '_romonet_portfolio_technologies', '_romonet_portfolio_services' ), true ) ) {
		return is_array( $value ) ? array_values( array_filter( array_map( 'sanitize_text_field', $value ) ) ) : array();
	}
	if ( '_romonet_portfolio_featured' === $key ) {
		return (bool) $value;
	}
	return is_scalar( $value ) ? sanitize_text_field( $value ) : '';
}

function romonet_portfolio_allowed_values() {
	return array(
		'type'         => array( 'client', 'internal', 'demo' ),
		'technologies' => array( 'WordPress', 'WooCommerce', 'PHP', 'JavaScript', 'TypeScript', 'React', 'Next.js', 'NestJS', 'Custom Development' ),
		'services'     => array( 'طراحی رابط کاربری', 'طراحی سایت', 'توسعه وردپرس', 'توسعه ووکامرس', 'توسعه اختصاصی', 'طراحی افزونه', 'توسعه قالب', 'بهینه‌سازی فنی' ),
	);
}

function romonet_portfolio_meta_box() {
	add_meta_box( 'romonet-portfolio-details', 'اطلاعات نمونه‌کار', 'romonet_render_portfolio_meta_box', 'portfolio', 'normal', 'high' );
}
add_action( 'add_meta_boxes_portfolio', 'romonet_portfolio_meta_box' );

function romonet_render_portfolio_meta_box( $post ) {
	$values = array();
	foreach ( array_keys( romonet_portfolio_meta_definitions() ) as $key ) {
		$values[ $key ] = get_post_meta( $post->ID, $key, true );
	}
	$allowed = romonet_portfolio_allowed_values();
	wp_nonce_field( 'romonet_save_portfolio', 'romonet_portfolio_nonce' );
	?>
	<div class="romonet-portfolio-fields">
		<p><label for="romonet_portfolio_type"><strong>نوع پروژه</strong></label><br>
		<select id="romonet_portfolio_type" name="romonet_portfolio_type">
			<?php foreach ( array( 'client' => 'پروژه مشتری', 'internal' => 'محصول داخلی رومونت', 'demo' => 'پروژه نمایشی' ) as $value => $label ) : ?>
				<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $values['_romonet_portfolio_type'], $value ); ?>><?php echo esc_html( $label ); ?></option>
			<?php endforeach; ?>
		</select></p>
		<p><label for="romonet_portfolio_client"><strong>نام مشتری</strong></label><br><input class="widefat" id="romonet_portfolio_client" name="romonet_portfolio_client" value="<?php echo esc_attr( $values['_romonet_portfolio_client'] ); ?>" type="text"></p>
		<p><label for="romonet_portfolio_website_url"><strong>آدرس وب‌سایت</strong></label><br><input class="widefat" id="romonet_portfolio_website_url" name="romonet_portfolio_website_url" value="<?php echo esc_attr( $values['_romonet_portfolio_website_url'] ); ?>" type="url"></p>
		<p><label for="romonet_portfolio_completion_date"><strong>تاریخ تکمیل پروژه</strong></label><br><input id="romonet_portfolio_completion_date" name="romonet_portfolio_completion_date" value="<?php echo esc_attr( $values['_romonet_portfolio_completion_date'] ); ?>" type="date"></p>
		<p><label for="romonet_portfolio_technologies"><strong>فناوری‌ها</strong></label><br>
		<select class="widefat" id="romonet_portfolio_technologies" name="romonet_portfolio_technologies[]" multiple size="5">
			<?php foreach ( $allowed['technologies'] as $item ) : ?><option value="<?php echo esc_attr( $item ); ?>" <?php selected( in_array( $item, (array) $values['_romonet_portfolio_technologies'], true ) ); ?>><?php echo esc_html( $item ); ?></option><?php endforeach; ?>
		</select></p>
		<p><label for="romonet_portfolio_services"><strong>خدمات ارائه‌شده</strong></label><br>
		<select class="widefat" id="romonet_portfolio_services" name="romonet_portfolio_services[]" multiple size="5">
			<?php foreach ( $allowed['services'] as $item ) : ?><option value="<?php echo esc_attr( $item ); ?>" <?php selected( in_array( $item, (array) $values['_romonet_portfolio_services'], true ) ); ?>><?php echo esc_html( $item ); ?></option><?php endforeach; ?>
		</select></p>
		<p><label><input type="checkbox" name="romonet_portfolio_featured" value="1" <?php checked( $values['_romonet_portfolio_featured'], true ); ?>> پروژه منتخب</label></p>
		<hr><p><strong>گالری پروژه</strong></p>
		<div id="romonet-portfolio-gallery" class="romonet-portfolio-gallery">
			<?php foreach ( (array) $values['_romonet_portfolio_gallery'] as $attachment_id ) : if ( ! wp_attachment_is_image( $attachment_id ) ) { continue; } ?>
				<div class="romonet-gallery-item" data-id="<?php echo esc_attr( $attachment_id ); ?>"><?php echo wp_get_attachment_image( $attachment_id, 'thumbnail' ); ?><button type="button" class="button-link-delete romonet-remove-gallery">حذف</button></div>
			<?php endforeach; ?>
		</div>
		<input type="hidden" id="romonet_portfolio_gallery_ids" name="romonet_portfolio_gallery_ids" value="<?php echo esc_attr( implode( ',', array_map( 'absint', (array) $values['_romonet_portfolio_gallery'] ) ) ); ?>">
		<button type="button" class="button" id="romonet-add-gallery">افزودن تصاویر</button>
	</div>
	<?php
}

function romonet_save_portfolio_meta( $post_id ) {
	if ( ! isset( $_POST['romonet_portfolio_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['romonet_portfolio_nonce'] ) ), 'romonet_save_portfolio' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE || ! current_user_can( 'edit_post', $post_id ) || 'portfolio' !== get_post_type( $post_id ) ) {
		return;
	}
	$allowed = romonet_portfolio_allowed_values();
	$type = isset( $_POST['romonet_portfolio_type'] ) ? sanitize_key( wp_unslash( $_POST['romonet_portfolio_type'] ) ) : 'client';
	update_post_meta( $post_id, '_romonet_portfolio_type', in_array( $type, $allowed['type'], true ) ? $type : 'client' );
	update_post_meta( $post_id, '_romonet_portfolio_client', isset( $_POST['romonet_portfolio_client'] ) ? sanitize_text_field( wp_unslash( $_POST['romonet_portfolio_client'] ) ) : '' );
	$url = isset( $_POST['romonet_portfolio_website_url'] ) ? esc_url_raw( wp_unslash( $_POST['romonet_portfolio_website_url'] ) ) : '';
	update_post_meta( $post_id, '_romonet_portfolio_website_url', $url );
	$date = isset( $_POST['romonet_portfolio_completion_date'] ) ? sanitize_text_field( wp_unslash( $_POST['romonet_portfolio_completion_date'] ) ) : '';
	update_post_meta( $post_id, '_romonet_portfolio_completion_date', preg_match( '/^\d{4}-\d{2}-\d{2}$/', $date ) ? $date : '' );
	foreach ( array( 'technologies', 'services' ) as $field ) {
		$submitted = isset( $_POST[ 'romonet_portfolio_' . $field ] ) ? (array) wp_unslash( $_POST[ 'romonet_portfolio_' . $field ] ) : array();
		$clean = array_values( array_intersect( array_map( 'sanitize_text_field', $submitted ), $allowed[ $field ] ) );
		update_post_meta( $post_id, '_romonet_portfolio_' . $field, $clean );
	}
	update_post_meta( $post_id, '_romonet_portfolio_featured', ! empty( $_POST['romonet_portfolio_featured'] ) );
	$gallery = isset( $_POST['romonet_portfolio_gallery_ids'] ) ? array_filter( array_map( 'absint', explode( ',', sanitize_text_field( wp_unslash( $_POST['romonet_portfolio_gallery_ids'] ) ) ) ) ) : array();
	$gallery = array_values( array_filter( $gallery, 'wp_attachment_is_image' ) );
	update_post_meta( $post_id, '_romonet_portfolio_gallery', $gallery );
}
add_action( 'save_post_portfolio', 'romonet_save_portfolio_meta' );

function romonet_portfolio_admin_assets( $hook ) {
	if ( ! in_array( $hook, array( 'post.php', 'post-new.php' ), true ) || 'portfolio' !== get_current_screen()->post_type ) {
		return;
	}
	wp_enqueue_media();
	wp_enqueue_script( 'jquery-ui-sortable' );
	$script = <<<'JS'
jQuery(function($) {
	var box = $('#romonet-portfolio-gallery');
	var input = $('#romonet_portfolio_gallery_ids');
	function sync() {
		input.val(box.children('.romonet-gallery-item').map(function() {
			return $(this).data('id');
		}).get().join(','));
	}
	box.sortable({ update: sync });
	$('#romonet-add-gallery').on('click', function(e) {
		e.preventDefault();
		var frame = wp.media({
			title: 'انتخاب تصاویر گالری',
			multiple: true,
			library: { type: 'image' },
			button: { text: 'افزودن' }
		});
		frame.on('select', function() {
			frame.state().get('selection').each(function(a) {
				var d = a.toJSON();
				if (!box.find('[data-id="' + d.id + '"]').length) {
					box.append('<div class="romonet-gallery-item" data-id="' + d.id + '"><img src="' + d.sizes.thumbnail.url + '" alt=""><button type="button" class="button-link-delete romonet-remove-gallery">حذف</button></div>');
				}
			});
			sync();
		});
		frame.open();
	});
	box.on('click', '.romonet-remove-gallery', function() {
		$(this).closest('.romonet-gallery-item').remove();
		sync();
	});
});
JS;
	wp_add_inline_script( 'jquery-ui-sortable', $script );
}
add_action( 'admin_enqueue_scripts', 'romonet_portfolio_admin_assets' );

function romonet_portfolio_card( $post_id = 0 ) {
	$post_id = $post_id ?: get_the_ID();
	$type = get_post_meta( $post_id, '_romonet_portfolio_type', true );
	$type_label = array( 'client' => 'پروژه مشتری', 'internal' => 'محصول داخلی رومونت', 'demo' => 'پروژه نمایشی' );
	$terms = get_the_terms( $post_id, 'portfolio_category' );
	?>
	<article class="group overflow-hidden rounded-2xl border border-white/10 bg-white/[0.03] transition hover:-translate-y-1 hover:border-amber-400/40">
		<a href="<?php echo esc_url( get_permalink( $post_id ) ); ?>" class="block" aria-label="<?php echo esc_attr( get_the_title( $post_id ) ); ?>">
			<?php if ( has_post_thumbnail( $post_id ) ) : ?><div class="portfolio-card-image"><?php echo get_the_post_thumbnail( $post_id, 'large', array( 'loading' => 'lazy', 'class' => 'h-full w-full object-cover transition duration-500 group-hover:scale-105' ) ); ?></div><?php else : ?><div class="portfolio-card-image bg-gradient-to-br from-amber-500/20 to-white/5"></div><?php endif; ?>
			<div class="p-5">
				<div class="mb-3 flex flex-wrap gap-2"><?php if ( ! empty( $type_label[ $type ] ) ) : ?><span class="rounded-full bg-amber-500/15 px-2.5 py-1 text-[11px] text-amber-300"><?php echo esc_html( $type_label[ $type ] ); ?></span><?php endif; ?><?php if ( $terms && ! is_wp_error( $terms ) ) : ?><span class="rounded-full border border-white/10 px-2.5 py-1 text-[11px] text-neutral-400"><?php echo esc_html( $terms[0]->name ); ?></span><?php endif; ?></div>
				<h2 class="text-lg font-bold text-white transition group-hover:text-amber-300"><?php echo esc_html( get_the_title( $post_id ) ); ?></h2>
				<?php $excerpt = get_the_excerpt( $post_id ); if ( $excerpt ) : ?><p class="mt-2 line-clamp-2 text-sm leading-7 text-neutral-400"><?php echo esc_html( wp_trim_words( $excerpt, 22 ) ); ?></p><?php endif; ?>
				<?php $technologies = get_post_meta( $post_id, '_romonet_portfolio_technologies', true ); if ( $technologies ) : ?><div class="mt-4 flex flex-wrap gap-1.5"><?php foreach ( (array) $technologies as $technology ) : ?><span class="text-[11px] text-neutral-500"><?php echo esc_html( $technology ); ?></span><?php endforeach; ?></div><?php endif; ?>
			</div>
		</a>
	</article>
	<?php
}

function romonet_get_featured_portfolios( $limit = 3 ) {
	return new WP_Query( array( 'post_type' => 'portfolio', 'post_status' => 'publish', 'posts_per_page' => absint( $limit ), 'meta_key' => '_romonet_portfolio_featured', 'meta_value' => '1', 'no_found_rows' => true ) );
}

function romonet_portfolio_seo() {
	if ( class_exists( 'WPSEO_Frontend' ) || defined( 'RANK_MATH_VERSION' ) ) {
		return;
	}
	if ( is_post_type_archive( 'portfolio' ) ) {
		$title = 'نمونه کار طراحی سایت | پروژه‌های طراحی و توسعه رومونت';
		$description = 'نمونه‌کارهای رومونت در زمینه طراحی سایت شرکتی و فروشگاهی، توسعه وردپرس و برنامه‌نویسی وب را مشاهده کنید و برای اجرای پروژه خود مشاوره بگیرید.';
		$url = get_post_type_archive_link( 'portfolio' );
	} elseif ( is_singular( 'portfolio' ) ) {
		$title = get_the_title();
		$description = get_the_excerpt() ?: wp_trim_words( wp_strip_all_tags( get_the_content() ), 30 );
		$url = get_permalink();
	} else {
		return;
	}
	echo '<meta name="description" content="' . esc_attr( $description ) . '">' . "\n";
	echo '<link rel="canonical" href="' . esc_url( $url ) . '">' . "\n";
	echo '<meta property="og:title" content="' . esc_attr( $title ) . '">' . "\n";
	echo '<meta property="og:description" content="' . esc_attr( $description ) . '">' . "\n";
	echo '<meta property="og:url" content="' . esc_url( $url ) . '">' . "\n";
	echo '<meta property="og:type" content="' . ( is_singular( 'portfolio' ) ? 'article' : 'website' ) . '">' . "\n";
	if ( is_singular( 'portfolio' ) && has_post_thumbnail() ) {
		echo '<meta property="og:image" content="' . esc_url( get_the_post_thumbnail_url( get_the_ID(), 'large' ) ) . '">' . "\n";
	}
}
add_action( 'wp_head', 'romonet_portfolio_seo', 2 );

function romonet_portfolio_title( $title ) {
	return is_post_type_archive( 'portfolio' ) ? 'نمونه کار طراحی سایت | پروژه‌های طراحی و توسعه رومونت' : $title;
}
add_filter( 'pre_get_document_title', 'romonet_portfolio_title' );
