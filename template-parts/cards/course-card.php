<?php
/**
 * Course archive card.
 *
 * @var array $args
 */

$course = wp_parse_args(
	$args,
	array(
		'id'           => 0,
		'title'        => '',
		'excerpt'      => '',
		'thumbnail'    => '',
		'price'        => '',
		'price_type'   => '',
		'lesson_count' => 0,
		'difficulty'   => '',
		'permalink'    => '',
	)
);
?>
<article class="group flex h-full flex-col overflow-hidden rounded-2xl border border-white/10 bg-neutral-900/60 shadow-lg shadow-black/10 transition duration-300 hover:-translate-y-1 hover:border-amber-400/40">
	<a href="<?php echo esc_url( $course['permalink'] ); ?>" class="relative block overflow-hidden">
		<?php if ( $course['thumbnail'] ) : ?>
			<img src="<?php echo esc_url( $course['thumbnail'] ); ?>" alt="<?php echo esc_attr( $course['title'] ); ?>" class="aspect-[16/10] w-full object-cover transition duration-500 group-hover:scale-105" loading="lazy">
		<?php else : ?>
			<div class="flex aspect-[16/10] items-center justify-center bg-[radial-gradient(circle_at_30%_20%,rgba(245,158,11,.14),transparent_55%),#11131b] text-sm font-bold text-amber-300">دوره آموزشی</div>
		<?php endif; ?>
		<?php if ( $course['difficulty'] ) : ?>
			<span class="absolute right-4 top-4 rounded-full border border-amber-400/25 bg-neutral-950/85 px-3 py-1 text-xs font-bold text-amber-300 backdrop-blur"><?php echo esc_html( $course['difficulty'] ); ?></span>
		<?php endif; ?>
	</a>

	<div class="flex flex-1 flex-col p-6">
		<div class="flex flex-wrap items-center gap-2 text-xs text-neutral-400">
			<?php if ( $course['lesson_count'] ) : ?>
				<span><?php echo esc_html( sprintf( '%d درس', $course['lesson_count'] ) ); ?></span>
			<?php endif; ?>
			<?php if ( $course['price_type'] === 'free' || '' === $course['price'] ) : ?>
				<span class="font-bold text-emerald-600">رایگان</span>
			<?php elseif ( $course['price'] ) : ?>
				<span class="font-bold text-neutral-200"><?php echo esc_html( $course['price'] ); ?></span>
			<?php endif; ?>
		</div>
		<h2 class="mt-3 line-clamp-2 text-xl font-black leading-8 text-white transition group-hover:text-amber-300">
			<a href="<?php echo esc_url( $course['permalink'] ); ?>"><?php echo esc_html( $course['title'] ); ?></a>
		</h2>
		<?php if ( $course['excerpt'] ) : ?>
			<p class="mt-3 line-clamp-3 text-sm leading-7 text-neutral-400"><?php echo esc_html( $course['excerpt'] ); ?></p>
		<?php endif; ?>
		<a href="<?php echo esc_url( $course['permalink'] ); ?>" class="mt-auto inline-flex items-center gap-2 pt-6 text-sm font-bold text-amber-400 transition group-hover:-translate-x-1">
			<span>مشاهده دوره</span>
			<span aria-hidden="true">←</span>
		</a>
	</div>
</article>
