<?php
/**
 * Template Name: مارکت‌پلیس قالب‌ها و افزونه‌ها
 * Template Post Type: page
 *
 * @package Romonet_WPStorm
 */

// دریافت محصولات ووکامرس
$args = array(
    'post_type'      => 'product',
    'post_status'    => 'publish',
    'posts_per_page' => -1, // دریافت تمام محصولات
);
$products_query = new WP_Query($args);

$js_products = array();
$all_tags_set = array();

if ($products_query->have_posts()) {
    while ($products_query->have_posts()) {
        $products_query->the_post();

        if (! function_exists('wc_get_product')) continue;

        $product = wc_get_product(get_the_ID());
        if (! $product) continue;

        $id   = $product->get_id();
        $name = $product->get_name();
        $slug = $product->get_slug();

        // تشخیص دسته‌بندی و نوع محصول (قالب یا افزونه)
        $terms = get_the_terms($id, 'product_cat');
        $category_name = 'دسته‌بندی نشده';
        $type = 'plugin'; 
        if (! empty($terms) && ! is_wp_error($terms)) {
            $category_name = $terms[0]->name;
            foreach ($terms as $term) {
                if (strpos($term->name, 'قالب') !== false || strpos(strtolower($term->slug), 'theme') !== false) {
                    $type = 'theme';
                }
            }
        }

        // استخراج تگ‌ها
        $tags = array();
        $tag_terms = get_the_terms($id, 'product_tag');
        if (! empty($tag_terms) && ! is_wp_error($tag_terms)) {
            foreach ($tag_terms as $tag_term) {
                $tags[] = $tag_term->name;
                $all_tags_set[$tag_term->name] = true; 
            }
        }

        $tagline = wp_strip_all_tags($product->get_short_description());
        $rating       = $product->get_average_rating();
        $reviewsCount = $product->get_review_count();
        $downloads    = (int) get_post_meta($id, 'total_sales', true);

        // لاجیک برای بج (Badge) اتوماتیک
        $badge = '';
        if ($product->is_featured()) {
            $badge = 'ویژه';
        } elseif ($downloads > 50) {
            $badge = 'پرفروش';
        }

        $version   = get_post_meta($id, '_product_version', true) ?: '1.0.0';
        $wpVersion = get_post_meta($id, '_wp_version_req', true) ?: '6.0+';

        // تصویر شاخص محصول
        $bannerImage = wp_get_attachment_image_url($product->get_image_id(), 'large');
        if (! $bannerImage) {
            $bannerImage = function_exists('wc_placeholder_img_src') ? wc_placeholder_img_src() : '';
        }

        $price = $product->get_price();

        // استخراج KeyFeatures
        $keyFeatures = array();
        $lines = explode("\n", $product->get_short_description());
        foreach (array_slice($lines, 0, 2) as $line) {
            $clean_line = trim(wp_strip_all_tags($line));
            if (! empty($clean_line)) {
                $keyFeatures[] = array('title' => $clean_line);
            }
        }
        if (empty($keyFeatures)) {
            $keyFeatures = array(
                array('title' => 'پشتیبانی فنی اختصاصی'),
                array('title' => 'بروزرسانی‌های منظم')
            );
        }

        $js_products[] = array(
            'id'           => $id,
            'slug'         => $slug,
            'name'         => $name,
            'type'         => $type,
            'category'     => $category_name,
            'tagline'      => $tagline,
            'rating'       => (float) $rating > 0 ? number_format((float) $rating, 1) : '۰.۰',
            'reviewsCount' => $reviewsCount,
            'downloads'    => $downloads,
            'badge'        => $badge,
            'version'      => $version,
            'wpVersion'    => $wpVersion,
            'tags'         => $tags,
            'bannerImage'  => $bannerImage,
            'url'          => get_permalink($id),
            'licenses'     => array(
                array(
                    'name'  => 'لایسنس استاندارد',
                    'price' => (float) $price,
                )
            ),
            'keyFeatures'  => $keyFeatures,
        );
    }
    wp_reset_postdata();
}

$dynamic_tags = array('همه');
foreach (array_keys($all_tags_set) as $t) {
    $dynamic_tags[] = $t;
}

get_header();
?>

<!-- انتقال داده‌های خوانده شده از دیتابیس به فایل جاوااسکریپت بیلد شده -->
<script>
    window.romonetShopData = {
        tags: <?php echo wp_json_encode($dynamic_tags); ?>,
        products: <?php echo wp_json_encode($js_products); ?>
    };
</script>

<main class="min-h-screen pb-24 pt-8 space-y-12" dir="rtl" xyz-data="romonetShop()">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">

        <!-- 1. Shop Header -->
        <?php get_template_part('template-parts/shop/header'); ?>

        <!-- 2. Controls & Filter Bar -->
        <?php get_template_part('template-parts/shop/controls'); ?>

        <!-- 3. Products Grid -->
        <?php get_template_part('template-parts/shop/grid'); ?>

    </div>
</main>

<?php get_footer(); ?>