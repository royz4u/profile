<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Resumi
 */
?>
<style>
    <?php
    global $themebucket_resumi;
    switch($themebucket_resumi['resumi_color']){
        case 1: //blue
            $themebucket_resumi_color = "#5bc7f6";
            break;
        case 2: //green
            $themebucket_resumi_color = "#9cba30";
            break;
        case 3: //navy
            $themebucket_resumi_color = "#7290ce";
            break;
        case 4: //purple
            $themebucket_resumi_color = "#a48ad4";
            break;
        case 5: //red
            $themebucket_resumi_color = "#fc6f5c";
            break;
        case 6: //turquoise
            $themebucket_resumi_color = "#53bdbd";
            break;
        case 7: //turquoise
            $themebucket_resumi_color = $themebucket_resumi['resumi_custom_color'];
            break;
        default:
            $themebucket_resumi_color = "#5bc7f6";
            break;
    }
    ?>
    a, a:hover, a:focus, .post-content a:hover, .post-content a:focus, .blog .pagination > li.active > a, .blog .pagination > li > a:hover, .blog .pagination > li.active > a:hover, .tag-social ul li a:hover, .blog-cmnt .media-heading a:hover, .blog-tags a:hover, .blog-post h5 a:hover, .blog-post h5 a:focus, .blog-post ul li a:hover, .blog-post ul li a:focus, .twitter-feed a, .contact-form h3, .blog h1 a:hover, .blog h1 a:focus, .auth-row a:hover, .auth-row a:hover, .section-testimonial .details h2, .data-heading, .skill-heading, .skillnews h2, .navigation ul li.current > a, .navigation ul li a:hover, .navigation ul li a:focus, .navigation ul li a:active, .map-header .map-link i {
        color: <?php echo $themebucket_resumi_color;?>;
    }

    h1.section-heading, .section-counter, .btn-search, .btn-view-all, .btn-post-cmnt, .bl-status .reply:hover, .blog-tags a.btn-share, .toggle-contact-form, .btn-contact, .custombtn:hover, .timeline-marker, .reddot, .tags ul li.selected, .tags ul li:hover, .map-header, .map-header .map-link {
        background-color: <?php echo $themebucket_resumi_color;?>;
    }

    .arrow-left {
        border-color: transparent <?php echo $themebucket_resumi_color;?> transparent transparent;
    }

    .arrow-right {
        border-color: transparent transparent transparent <?php echo $themebucket_resumi_color;?>;
    }

    .tags ul li.selected, .tags ul li:hover {
        border-color: <?php echo $themebucket_resumi_color;?>;
    }

    .location-map {
        border-bottom: <?php echo $themebucket_resumi_color;?> 6px solid;
    }

    .map-header {
        border-bottom: 10px solid <?php echo $themebucket_resumi_color;?>;
    }

    .contact-form {
        border-top: <?php echo $themebucket_resumi_color;?> 3px solid;
        border-bottom: <?php echo $themebucket_resumi_color;?> 6px solid;
    }

    .form-toggle-icon {
        border: <?php echo $themebucket_resumi_color;?> 3px solid;
    }

    .footer .widget .widget-title, .widget_rss ul li a, .footer .widget_rss ul li a {
        color: <?php echo $themebucket_resumi_color;?>;
    }

</style>
<?php wp_footer(); ?>
</body>
</html>