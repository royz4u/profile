<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Resumi
 */

if (!function_exists('resumi_paging_nav')) :
    /**
     * Display navigation to next/previous set of posts when applicable.
     *
     * @return void
     */
    function resumi_paging_nav()
    {
        // Don't print empty markup if there's only one page.
        if ($GLOBALS['wp_query']->max_num_pages < 2) {
            return;
        }
        ?>
        <nav class="navigation paging-navigation" role="navigation">
            <h1 class="screen-reader-text"><?php _e('Posts navigation', 'resumi'); ?></h1>

            <div class="nav-links">

                <?php if (get_next_posts_link()) : ?>
                    <div
                        class="nav-previous"><?php next_posts_link(__('<span class="meta-nav">&larr;</span> Older posts', 'resumi')); ?></div>
                <?php endif; ?>

                <?php if (get_previous_posts_link()) : ?>
                    <div
                        class="nav-next"><?php previous_posts_link(__('Newer posts <span class="meta-nav">&rarr;</span>', 'resumi')); ?></div>
                <?php endif; ?>

            </div>
            <!-- .nav-links -->
        </nav><!-- .navigation -->
    <?php
    }
endif;

if (!function_exists('resumi_post_nav')) :
    /**
     * Display navigation to next/previous post when applicable.
     *
     * @return void
     */
    function resumi_post_nav()
    {
        // Don't print empty markup if there's nowhere to navigate.
        $previous = (is_attachment()) ? get_post(get_post()->post_parent) : get_adjacent_post(false, '', true);
        $next = get_adjacent_post(false, '', false);

        if (!$next && !$previous) {
            return;
        }
        ?>
        <nav class="navigation post-navigation" role="navigation">
            <h1 class="screen-reader-text"><?php _e('Post navigation', 'resumi'); ?></h1>

            <div class="nav-links">
                <?php
                previous_post_link('<div class="nav-previous">%link</div>', _x('<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'resumi'));
                next_post_link('<div class="nav-next">%link</div>', _x('%title <span class="meta-nav">&rarr;</span>', 'Next post link', 'resumi'));
                ?>
            </div>
            <!-- .nav-links -->
        </nav><!-- .navigation -->
    <?php
    }
endif;

if (!function_exists('resumi_posted_on')) :
    /**
     * Prints HTML with meta information for the current post-date/time and author.
     */
    function resumi_posted_on()
    {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
        if (get_the_time('U') !== get_the_modified_time('U')) {
            $time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf($time_string,
            esc_attr(get_the_date('c')),
            esc_html(get_the_date()),
            esc_attr(get_the_modified_date('c')),
            esc_html(get_the_modified_date())
        );

        printf(__('<span class="posted-on">Posted on %1$s</span><span class="byline"> by %2$s</span>', 'resumi'),
            sprintf('<a href="%1$s" rel="bookmark">%2$s</a>',
                esc_url(get_permalink()),
                $time_string
            ),
            sprintf('<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
                esc_url(get_author_posts_url(get_the_author_meta('ID'))),
                esc_html(get_the_author())
            )
        );
    }
endif;

/**
 * Returns true if a blog has more than 1 category.
 */
function resumi_categorized_blog()
{
    if (false === ($all_the_cool_cats = get_transient('all_the_cool_cats'))) {
        // Create an array of all the categories that are attached to posts.
        $all_the_cool_cats = get_categories(array(
            'hide_empty' => 1,
        ));

        // Count the number of categories that are attached to the posts.
        $all_the_cool_cats = count($all_the_cool_cats);

        set_transient('all_the_cool_cats', $all_the_cool_cats);
    }

    if ('1' != $all_the_cool_cats) {
        // This blog has more than 1 category so resumi_categorized_blog should return true.
        return true;
    } else {
        // This blog has only 1 category so resumi_categorized_blog should return false.
        return false;
    }
}

/**
 * Flush out the transients used in resumi_categorized_blog.
 */
function resumi_category_transient_flusher()
{
    // Like, beat it. Dig?
    delete_transient('all_the_cool_cats');
}

add_action('edit_category', 'resumi_category_transient_flusher');
add_action('save_post', 'resumi_category_transient_flusher');

function resumi_comment_walker($comment, $args, $depth)
{
    ?>
    <div class="media blog-cmnt" id="comment-<?php comment_ID(); ?>">
        <a href="javascript:;" class="pull-left">
            <?php echo get_avatar($comment->user_id); ?>
        </a>

        <div class="media-body">
            <h4 class="media-heading">
                <a href="#"><?php echo resumi_comment_author($comment->user_id, $comment->comment_ID); ?></a>
            </h4>

            <div class="bl-status">
                <span class="pull-left"><?php echo get_comment_date("d F, Y"); ?></span>
                <?php comment_reply_link(array_merge($args, array('add_below' => "comment", 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
            </div>
            <?php
            $cmnt = get_comment_text();
            //$cmnt = strip_tags($cmnt, "<p><br><a><h1><h2><h3><h4><h5><h6><h7><div><table><tr><td><th><em><b><i><img><dt><ul><li><ol><span>");
            //echo wp_kses($cmnt, wp_kses_allowed_html("post"));
            echo wpautop($cmnt);
            ?>
        </div>
    </div>
<?php
}
