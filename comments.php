<?php
/**
 * Comments template for single posts.
 *
 * @package Romonet_WPStorm
 */

if (post_password_required()) {
  return;
}
?>

<section id="comments" class="comments-area glass-panel p-6 sm:p-8 rounded-3xl border border-white/10 space-y-8">
  <?php if (have_comments()) : ?>
    <div class="space-y-4">
      <h2 class="comments-title text-xl font-bold text-white">
        <?php
        printf(
          esc_html(_n('%s دیدگاه', '%s دیدگاه', get_comments_number(), 'kinetic-wp')),
          number_format_i18n(get_comments_number())
        );
        ?>
      </h2>

      <ol class="comment-list space-y-4">
        <?php
        wp_list_comments(
          array(
            'style'      => 'ol',
            'short_ping' => true,
            'avatar_size' => 40,
          )
        );
        ?>
      </ol>
    </div>
  <?php endif; ?>

  <?php
  comment_form(
    array(
      'title_reply'          => 'دیدگاه خود را ثبت کنید',
      'title_reply_before'   => '<h2 id="reply-title" class="comment-reply-title text-xl font-bold text-white">',
      'title_reply_after'    => '</h2>',
      'label_submit'         => 'ارسال دیدگاه',
      'comment_field'        => '<p class="comment-form-comment"><label for="comment" class="block mb-2 text-sm font-semibold">دیدگاه شما</label><textarea id="comment" name="comment" cols="45" rows="6" required class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-sm text-inherit outline-none transition focus:border-amber-400"></textarea></p>',
      'fields'              => array(
        'author' => '<p class="comment-form-author"><label for="author" class="block mb-2 text-sm font-semibold">نام <span class="required">*</span></label><input id="author" name="author" type="text" value="" size="30" required class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-sm text-inherit outline-none transition focus:border-amber-400" /></p>',
        'email'  => '<p class="comment-form-email"><label for="email" class="block mb-2 text-sm font-semibold">ایمیل <span class="required">*</span></label><input id="email" name="email" type="email" value="" size="30" required class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-sm text-inherit outline-none transition focus:border-amber-400" /></p>',
      ),
      'class_submit'         => 'submit px-5 py-3 rounded-xl bg-amber-500 text-black font-bold text-sm transition hover:bg-amber-400',
      'class_form'           => 'comment-form space-y-5',
      'comment_notes_before' => '',
      'comment_notes_after'  => '',
    )
  );
  ?>
</section>
