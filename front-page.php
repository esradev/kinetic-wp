<?php
/**
 * The template for displaying the Front Page / Home Page
 *
 * @package Romonet_WPStorm
 */

get_header();

// دریافت محصولات واقعی از ووکامرس برای بخش مارکت‌پلیس
$marketplace_products = array();
if ( class_exists( 'WooCommerce' ) ) {
    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => 8, // تعداد محصولاتی که می‌خواهید نمایش دهید
        'status'         => 'publish',
    );
    $products_query = new WP_Query( $args );

    if ( $products_query->have_posts() ) {
        while ( $products_query->have_posts() ) {
            $products_query->the_post();
            global $product;

            // تشخیص نوع محصول (قالب یا افزونه) بر اساس دسته‌بندی
            $type = 'theme';
            $category_name = 'محصول';
            $terms = get_the_terms( get_the_ID(), 'product_cat' );
            if ( $terms && ! is_wp_error( $terms ) ) {
                $category_name = $terms[0]->name;
                foreach ( $terms as $term ) {
                    if ( strpos( $term->slug, 'plugin' ) !== false || strpos( $term->name, 'افزونه' ) !== false ) {
                        $type = 'plugin';
                    }
                }
            }

            // دریافت تگ‌های محصول
            $product_tags = array();
            $tags = get_the_terms( get_the_ID(), 'product_tag' );
            if ( $tags && ! is_wp_error( $tags ) ) {
                foreach ( array_slice($tags, 0, 3) as $tag ) {
                    $product_tags[] = $tag->name;
                }
            }

            // وضعیت بج (ویژه یا تخفیف)
            $badge = '';
            if ( $product->is_featured() ) {
                $badge = 'ویژه';
            } elseif ( $product->is_on_sale() ) {
                $badge = 'تخفیف';
            }

            $marketplace_products[] = array(
                'id'           => get_the_ID(),
                'product_id'   => $product->get_id(),
                'name'         => get_the_title(),
                'type'         => $type,
                'category'     => $category_name,
                'tagline'      => wp_trim_words( get_the_excerpt(), 15, '...' ),
                'rating'       => $product->get_average_rating() > 0 ? $product->get_average_rating() : '۵.۰',
                'reviewsCount' => $product->get_review_count() > 0 ? $product->get_review_count() : rand(10, 50),
                'price'        => (float) $product->get_price(),
                'badge'        => $badge,
                'tags'         => $product_tags,
                'bannerImage'  => has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'large' ) : wc_placeholder_img_src(),
                'url'          => get_permalink(),
            );
        }
        wp_reset_postdata();
    }
}
$products_json = wp_json_encode( $marketplace_products );
?>

<!-- پاس دادن داده‌های واقعی ووکامرس به جاوااسکریپت -->
<script>
    window.romonetFrontPageData = {
        products: <?php echo empty($products_json) ? '[]' : $products_json; ?>
    };
</script>

<main class="min-h-screen space-y-24 pb-20" dir="rtl" xyz-data="romonetFrontPage()">

    <!-- 1. Hero Section -->
    <?php get_template_part('template-parts/front-page/hero'); ?>

    <!-- 2. Core 4 Agency Pillars Grid -->
    <?php get_template_part('template-parts/front-page/pillars'); ?>

    <!-- 3. Marketplace Showcase Section -->
    <?php get_template_part('template-parts/front-page/marketplace'); ?>

    <!-- 4. Interactive SMS Simulator Showcase -->
    <?php get_template_part('template-parts/front-page/sms-simulator'); ?>

    <!-- 5. Case Studies with Metrics -->
    <?php get_template_part('template-parts/front-page/case-studies'); ?>

    <!-- 6. Editorial Blog Highlights -->
    <?php get_template_part('template-parts/front-page/blog-highlights'); ?>

    <!-- 7. Final Bottom CTA -->
    <?php get_template_part('template-parts/front-page/bottom-cta'); ?>

</main>

<?php get_footer(); ?>