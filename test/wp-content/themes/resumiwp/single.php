<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Resumi
 */
?>
<?php get_header(); ?>
<?php
global $post;
setup_postdata($post);
?>
    <div class="navigation clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar navbar-static-top">
                        <div>
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse"
                                        data-target=".navbar-collapse">
                                    <span class="fa fa-bars"></span>
                                </button>
                                <a class="sticky-logo" href="<?php echo site_url();?>">
                                    <img src="<?php echo $themebucket_resumi['section_header_nav_logo']['url']; ?>" alt=""/>
                                </a>
                            </div>
                            <div class="navbar-collapse collapse ddsmoothmenu" id="smoothmenu1">
                                <?php
                                $defaults = array(
                                    'theme_location' => 'primary',
                                    'menu' => 'Primary Menu',
                                    'container' => "div",
                                    'container_class' => 'nav nav-tabs main-menu pull-right',
                                    'container_id' => false,
                                    'menu_class' => 'nav navbar-nav pull-right top-nav sf-menu',
                                    'menu_id' => false,
                                    'echo' => false,
                                    'fallback_cb' => 'wp_page_menu',
                                    'before' => '',
                                    'after' => '',
                                    'link_before' => '',
                                    'link_after' => '',
                                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                    'depth' => 0,
                                    'walker' => '',
                                    'exclude' => "'" . get_option("ticket_page_id") . "," . get_option("product_page_id") . "," . get_option("registration_page_id") . "," . get_option("signin_page_id") . "," . get_option("purchase_verification_page") . "," . get_option("user_all_ticket") . "," . get_option("user_open_ticket") . "," . get_option("user_closed_ticket") . "," . get_option("user_notifications") . "," . get_option("knowledgebase_home") . "," . get_option("knowledgebase_listings") . "," . get_option("landing_page") . "," . get_option("home_page_id") . "'"
                                );

                                $menu = wp_nav_menu($defaults);
                                $menu = str_replace('<div class="nav nav-tabs main-menu pull-right">', "", $menu);
                                $menu = str_replace('<div class="nav navbar-nav pull-right top-nav sf-menu">', "", $menu);
                                $menu = str_replace("</div>", "", $menu);
                                $menu = str_replace("<ul>", '<ul class="nav navbar-nav pull-right top-nav sf-menu">', $menu);
                                echo $menu;

                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="blog-section">
        <div class="container">
            <div class="section-title">
                <h1 class="section-heading"><?php echo get_bloginfo("title"); ?></h1>

                <h2 class="section-subheading-nobg"><?php echo get_bloginfo("description"); ?></h2>
            </div>
            <div class="row blog">
                <div class="col-md-8">
                    <?php
                    while (have_posts()) {
                        the_post();

                        ?>
                        <div class="panel">
                            <div class="panel-body">
                                <h1 class="text-center mtop35"><a
                                        href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h1>

                                <p class="text-center auth-row">
                                    By <?php the_author(); ?> | <?php the_date(); ?> | <a
                                        href="<?php echo get_permalink(); ?>"><?php echo get_comments_number(); ?>
                                        Comment</a>
                                </p>


                                <?php if (!is_single() && !is_page()) { ?>
                                    <?php the_excerpt(); ?>
                                    <a href="<?php echo get_permalink(); ?>" class="more">Continue Reading</a>
                                <?php } else { ?>
                                <?php
                                    $meta = get_post_meta($post->ID);
                                    if(isset($meta['eg_sources_youtube'][0]) && trim($meta['eg_sources_youtube'][0])!=""){
                                        echo wp_oembed_get("https://www.youtube.com/watch?v=".$meta['eg_sources_youtube'][0]);
                                    }
                                    else if(isset($meta['eg_sources_vimeo'][0]) && trim($meta['eg_sources_vimeo'][0])!=""){
                                        echo wp_oembed_get("http://vimeo.com/".$meta['eg_sources_vimeo'][0]);
                                    }
                                    else if(isset($meta['eg_sources_soundcloud'][0]) && trim($meta['eg_sources_soundcloud'][0])!=""){
                                        echo wp_oembed_get($meta['eg_sources_soundcloud'][0]);
                                    }

                                    ?>
                                    <div class="blog-img-wide">
                                        <?php the_post_thumbnail(); ?>
                                    </div>
                                    <?php the_content(); ?>

                                    <?php
                                    $defaults = array(
                                        'before'           => '<p>' . __( 'Pages:','resumi' ),
                                        'after'            => '</p>',
                                        'link_before'      => '',
                                        'link_after'       => '',
                                        'next_or_number'   => 'number',
                                        'separator'        => ' ',
                                        'nextpagelink'     => __( 'Next page','resumi' ),
                                        'previouspagelink' => __( 'Previous page','resumi' ),
                                        'pagelink'         => '%',
                                        'echo'             => 1
                                    );
                                    wp_link_pages($defaults);
                                    ?>
                                    <div class="blog-tags">
                                        TAGS
                                        <?php echo get_the_tag_list("", "", "");; ?>
                                    </div>
                                <?php } ?>


                            </div>
                        </div>
                    <?php } ?>
                    <?php if (is_single() || is_page()) { ?>
                        <div class="panel">
                            <div class="panel-body ">
                                <div class="media blog-cmnt">
                                    <a href="javascript:;" class="pull-left">
                                        <?php echo get_avatar($post->post_author); ?>
                                    </a>

                                    <div class="media-body">
                                        <h4 class="media-heading">
                                            <a href="#"><?php the_author(); ?></a>
                                        </h4>

                                        <p class="mp-less">
                                            <?php the_author_meta("description"); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-body">
                                <h1 class="text-center cmnt-head"><?php echo get_comments_number(); ?> Comments</h1>
                                <?php
                                if (comments_open() || '0' != get_comments_number()) :
                                    comments_template();
                                endif;
                                ?>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="text-center">
                        <ul class="pagination">
                            <?php
                            global $wp_query;

                            $big = 999999999; // need an unlikely integer

                            $links = paginate_links(array(
                                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                                'format' => '?paged=%#%',
                                'current' => max(1, get_query_var('paged')),
                                'total' => $wp_query->max_num_pages,
                                'type' => 'array',
                                'prev_next' => true,
                                'prev_text' => '<i class="fa fa-angle-left"></i>',
                                "next_text" => '<i class="fa fa-angle-right"></i>',
                                'mid_size' => 3
                            ));
                            //print_r($links);
                            if ($links) {
                                foreach ($links as $link) {
                                    if (strpos($link, "current") !== false)
                                        echo '<li class="active"><a>' . $link . "</a></li>\n";
                                    else
                                        echo '<li>' . $link . "</li>\n";

                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php if(!dynamic_sidebar("sidebar-1")){?>
                        <div class="panel">
                            <div class="panel-body">
                                <form action="<?php echo site_url(); ?>" method="GET"><input type="text" name="s"
                                                                                             placeholder="Search Blog"
                                                                                             class="form-control blog-search">
                                    <button class="btn btn-search" type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-body">
                                <div class="blog-post">
                                    <h3>Latest Blog Post</h3>

                                    <?php
                                    $posts = resumi_get_custom_posts("post", 3);
                                    if ($posts) {
                                        foreach ($posts as $p) {

                                            ?>
                                            <div class="media">
                                                <a href="javascript:;" class="pull-left">
                                                    <?php if (get_the_post_thumbnail($p->ID, "blog-sidebar")) echo get_the_post_thumbnail($p->ID, "blog-sidebar"); else echo "<img width=81 height=81 src='" . get_template_directory_uri() . "/img/no_thumb.jpg'/>"; ?>
                                                </a>

                                                <div class="media-body">
                                                    <h5 class="media-heading"><a
                                                            href="<?php echo $p->guid; ?>"><?php echo $p->post_name; //echo date("d M, y" , strtotime($p->post_date));?></a>
                                                    </h5>

                                                    <?php
                                                    echo resumi_truncate(strip_tags($p->post_content), 60, " ");
                                                    ?>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="panel">
                            <div class="panel-body">
                                <div class="blog-post">
                                    <h3>category</h3>
                                    <?php wp_list_categories(array("title_li" => "", "hierarchical" => false, "depth" => 0)); ?>
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-body">
                                <div class="blog-post">
                                    <h3>blog archive</h3>
                                    <?php wp_get_archives(); ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php get_template_part("blog", "footer"); ?>
<?php get_footer(); ?>