<?php
/**
 * Comments template for single posts.
 *
 * @package Romonet_WPStorm
 */

if ( post_password_required() ) {
	return;
}
?>

<section id="comments" class="comments-area rm-comments-area rounded-3xl border border-white/10 bg-neutral-900/60 p-6 sm:p-8 space-y-10">
	<style>
		.rm-comments-area .comment-list,
		.rm-comments-area .children {
			list-style: none;
			margin: 0;
			padding: 0;
		}
		.rm-comments-area .children {
			margin-top: 1rem;
			padding-right: 1.25rem;
			border-right: 1px solid rgba(255, 255, 255, 0.12);
			display: flex;
			flex-direction: column;
			gap: 1rem;
		}
		.rm-comments-area .comment-body {
			border: 1px solid rgba(255, 255, 255, 0.08);
			background: rgba(255, 255, 255, 0.025);
			border-radius: 1rem;
			padding: 1.25rem;
		}
		.rm-comments-area .comment-meta {
			display: flex;
			flex-wrap: wrap;
			align-items: center;
			justify-content: space-between;
			gap: 0.75rem;
			margin-bottom: 0.75rem;
		}
		.rm-comments-area .comment-author {
			display: flex;
			align-items: center;
			gap: 0.75rem;
			font-size: 0.875rem;
			font-weight: 700;
			color: #ffffff;
		}
		.rm-comments-area .comment-author .avatar {
			border-radius: 9999px;
			border: 1px solid rgba(245, 158, 11, 0.4);
		}
		.rm-comments-area .comment-author .says {
			display: none;
		}
		.rm-comments-area .comment-metadata {
			font-size: 0.75rem;
			color: #a3a3a3;
		}
		.rm-comments-area .comment-metadata a {
			color: inherit;
			text-decoration: none;
		}
		.rm-comments-area .comment-content {
			font-size: 0.875rem;
			line-height: 1.8;
			color: #d4d4d4;
		}
		.rm-comments-area .reply {
			margin-top: 0.875rem;
		}
		.rm-comments-area .comment-reply-link {
			display: inline-flex;
			align-items: center;
			padding: 0.35rem 0.75rem;
			border-radius: 0.5rem;
			border: 1px solid rgba(255, 255, 255, 0.12);
			background: rgba(255, 255, 255, 0.03);
			font-size: 0.75rem;
			font-weight: 600;
			color: #fcd34d;
			text-decoration: none;
			transition: border-color 0.2s ease, background-color 0.2s ease;
		}
		.rm-comments-area .comment-reply-link:hover {
			border-color: rgba(245, 158, 11, 0.5);
			background: rgba(245, 158, 11, 0.1);
		}
		.rm-comments-area .comment-form {
			display: grid;
			grid-template-columns: repeat(1, minmax(0, 1fr));
			gap: 1.25rem;
		}
		@media (min-width: 640px) {
			.rm-comments-area .comment-form {
				grid-template-columns: repeat(2, minmax(0, 1fr));
			}
		}
		.rm-comments-area .comment-form-comment,
		.rm-comments-area .comment-form-cookies-consent,
		.rm-comments-area .form-submit,
		.rm-comments-area .logged-in-as {
			grid-column: 1 / -1;
			margin: 0;
		}
		.rm-comments-area .comment-form-author,
		.rm-comments-area .comment-form-email {
			margin: 0;
		}
		.rm-comments-area .comment-form-cookies-consent {
			display: flex;
			align-items: center;
			gap: 0.5rem;
			font-size: 0.75rem;
			color: #a3a3a3;
		}
		.rm-comments-area .logged-in-as {
			font-size: 0.75rem;
			color: #a3a3a3;
		}
		.rm-comments-area .logged-in-as a {
			color: #fbbf24;
		}
		.rm-comments-area #cancel-comment-reply-link {
			margin-right: 0.75rem;
			font-size: 0.75rem;
			font-weight: 500;
			color: #fda4af;
			text-decoration: underline;
		}
	</style>

	<?php if ( have_comments() ) : ?>
		<div class="space-y-6">
			<div class="flex items-center justify-between border-b border-white/10 pb-4">
				<h2 class="comments-title flex items-center gap-2.5 text-xl font-bold text-white">
					<span class="flex h-8 w-8 items-center justify-center rounded-lg border border-amber-400/25 bg-amber-500/10 text-amber-400" aria-hidden="true">
						<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
							<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
						</svg>
					</span>
					<span>
						<?php
						printf(
							esc_html( _n( '%s دیدگاه', '%s دیدگاه', get_comments_number(), 'kinetic-wp' ) ),
							number_format_i18n( get_comments_number() )
						);
						?>
					</span>
				</h2>
			</div>

			<ol class="comment-list space-y-4">
				<?php
				wp_list_comments(
					array(
						'style'       => 'ol',
						'short_ping'  => true,
						'avatar_size' => 40,
					)
				);
				?>
			</ol>
		</div>
	<?php endif; ?>

	<div class="border-t border-white/10 pt-8 first:border-t-0 first:pt-0">
		<?php
		comment_form(
			array(
				'title_reply'          => 'دیدگاه خود را ثبت کنید',
				'title_reply_before'   => '<h2 id="reply-title" class="comment-reply-title mb-5 text-lg font-bold text-white sm:text-xl">',
				'title_reply_after'    => '</h2>',
				'label_submit'         => 'ارسال دیدگاه',
				'comment_field'        => '<p class="comment-form-comment"><label for="comment" class="mb-2 block text-sm font-medium text-neutral-200">دیدگاه شما <span class="text-amber-400">*</span></label><textarea id="comment" name="comment" cols="45" rows="5" required placeholder="نظر یا پرسش فنی خود را درباره این مقاله بنویسید..." class="w-full rounded-xl border border-white/15 bg-neutral-950/80 px-4 py-3 text-sm leading-7 text-white placeholder:text-neutral-500 outline-none transition focus:border-amber-400 focus:ring-2 focus:ring-amber-400/20"></textarea></p>',
				'fields'               => array(
					'author' => '<p class="comment-form-author"><label for="author" class="mb-2 block text-sm font-medium text-neutral-200">نام <span class="required text-amber-400">*</span></label><input id="author" name="author" type="text" value="" size="30" required placeholder="نام شما" class="w-full rounded-xl border border-white/15 bg-neutral-950/80 px-4 py-3 text-sm text-white placeholder:text-neutral-500 outline-none transition focus:border-amber-400 focus:ring-2 focus:ring-amber-400/20" /></p>',
					'email'  => '<p class="comment-form-email"><label for="email" class="mb-2 block text-sm font-medium text-neutral-200">ایمیل <span class="required text-amber-400">*</span></label><input id="email" name="email" type="email" value="" size="30" required dir="ltr" placeholder="name@example.com" class="w-full rounded-xl border border-white/15 bg-neutral-950/80 px-4 py-3 text-left text-sm text-white placeholder:text-neutral-500 outline-none transition focus:border-amber-400 focus:ring-2 focus:ring-amber-400/20" /></p>',
				),
				'class_submit'         => 'submit inline-flex min-h-11 cursor-pointer items-center justify-center rounded-xl bg-amber-500 px-6 py-3 text-sm font-bold text-black transition hover:bg-amber-400',
				'class_form'           => 'comment-form',
				'comment_notes_before' => '',
				'comment_notes_after'  => '',
			)
		);
		?>
	</div>
</section>