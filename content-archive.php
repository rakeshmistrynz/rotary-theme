<?php
/**
 * The template for displaying Archive Content.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('hentry-category'); ?>>
    <div class="blog-item-wrap col-sm-6 col-md-4">
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <?php the_post_thumbnail('sparkling-featured', array('class' => 'single-featured')); ?>
        </a>

        <div class="post-inner-content archive-page">
            <header class="entry-header page-header">

                <h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                </h1>

                <?php if ('post' == get_post_type()) : ?>
                    <div class="entry-meta">
                        <?php sparkling_posted_on(); ?><?php if (!post_password_required() && (comments_open() || '0' != get_comments_number())) : ?>
                            <span class="comments-link"><i
                                    class="fa fa-comment-o"></i><?php comments_popup_link(esc_html__('Leave a comment', 'sparkling'), esc_html__('1 Comment', 'sparkling'), esc_html__('% Comments', 'sparkling')); ?></span>
                        <?php endif; ?>

                        <?php edit_post_link(esc_html__('Edit', 'sparkling'), '<i class="fa fa-pencil-square-o"></i><span class="edit-link">', '</span>'); ?>

                    </div><!-- .entry-meta -->
                <?php endif; ?>
            </header>
            <!-- .entry-header -->

            <?php if (is_search()) : // Only display Excerpts for Search ?>
                <div class="entry-summary">
                    <?php the_excerpt(); ?>
                    <p><a class="btn btn-default read-more" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'sparkling'); ?></a></p>
                </div><!-- .entry-summary -->
            <?php else : ?>
                <div class="entry-content">

                    <?php
                        the_excerpt();
                    ?>

                    <?php
                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'sparkling'),
                        'after' => '</div>',
                        'link_before' => '<span>',
                        'link_after' => '</span>',
                        'pagelink' => '%',
                        'echo' => 1
                    ));
                    ?>
                </div><!-- .ssentry-content -->
            <?php endif; ?>
        </div>
    </div>
</article><!-- #post-## -->
