<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Resumi
 */
?>
<?php
global $themebucket_resumi;
$favicon = $themebucket_resumi['global_favicons'];
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="shortcut icon" href="<?php echo $favicon['url'];?>"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php wp_head(); ?>
    <style type="text/css">
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
            background-color: <?php echo $themebucket_resumi_color;?> !important;
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

        .section-counter {
            background-image: url("<?php if(isset($themebucket_resumi['section_experience_counter_bg']['url'])) echo $themebucket_resumi['section_experience_counter_bg']['url'];?>");
        }

        .section-skill {
            background-image: url("<?php if(isset($themebucket_resumi['section_skill_bg']['url'])) echo $themebucket_resumi['section_skill_bg']['url'];?>");

        }

        .footer .widget .widget-title, .widget_rss ul li a, .footer .widget_rss ul li a {
            color: <?php echo $themebucket_resumi_color;?>;
        }
    </style>
    <?php
    if (isset($themebucket_resumi['custom_css'])) echo $themebucket_resumi['custom_css'];
    if (isset($themebucket_resumi['custom_ga'])) echo $themebucket_resumi['custom_ga'];
    ?>

</head>

<body>
<div class="page-mask">
    <div class="page-loader">

        <div class="spinner"></div>
        <span class="loading-style">Loading&nbsp;Assets...</span>
    </div>
</div>
<?php if ($themebucket_resumi['section_header_standard_display'] == 1) { ?>
    <div id="slides">
        <div class="slides-container">
            <div class="intro-container">
                <div>
                    <?php if (isset($themebucket_resumi['section_header_mainimg'])) { ?>
                        <img src="<?php echo $themebucket_resumi['section_header_mainimg']['url']; ?>" alt=""/>
                    <?php } ?>
                </div>
                <div class="home-container clearfix">
                    <div class="container">
                        <div class="logo wow bounceInDown" data-wow-duration="1s" data-wow-delay="0s">
                            <?php if (isset($themebucket_resumi['section_header_logo'])) { ?>
                                <img src="<?php echo $themebucket_resumi['section_header_logo']['url']; ?>" alt=""/>
                            <?php } ?>
                        </div>
                        <div class="home-text">
                            <h1 class="wow bounceInLeft" data-wow-delay="1s">
                                <?php if (isset($themebucket_resumi['section_header_primary'])) echo $themebucket_resumi['section_header_primary']; ?>
                            </h1>

                            <h2 class="wow bounceInRight" data-wow-delay="1.5s">
                                <?php if (isset($themebucket_resumi['section_header_secondary'])) echo $themebucket_resumi['section_header_secondary']; ?>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="top-scroll-bar">
        <a href="#about-me" class="scroll-down wow pulse" data-wow-iteration="infinite"><i
                class="fa fa-angle-double-down wow pulse" data-wow-iteration="infinite"></i></a>
    </div>
<?php } else if($themebucket_resumi['section_header_rev_display'] == 1) { ?>
    <div id="slides">
        <?php if (isset($themebucket_resumi['section_rev_slider']) && $themebucket_resumi['section_header_rev_display'] == 1) putRevSlider($themebucket_resumi['section_rev_slider']) ?>
    </div>
<?php } ?>

<!--home section end -->
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
                            <a class="sticky-logo" href="<?php echo site_url(); ?>">
                                <img src="<?php echo $themebucket_resumi['section_header_nav_logo']['url']; ?>" alt=""/>
                            </a>
                        </div>
                        <div class="navbar-collapse collapse ddsmoothmenu" id="smoothmenu1">
                            <ul class="nav navbar-nav pull-right top-nav sf-menu">
                                <li><a href="#slides">Home</a></li>
                                <?php
                                $sections = $themebucket_resumi['resumi_sections_order'];
                                if (!is_array($sections)) {
                                    $sections = resumi_get_enabled_sections();
                                }
                                if (empty($sections)) {
                                    $sections = resumi_get_all_sections();
                                }
                                $section_ids = array(
                                    "section_abtme"=>"#about-me",
                                    "section_blog"=>"#blog",
                                    "section_contact"=>"#contact",
                                    "section_education"=>"#education",
                                    "section_experience"=>"#experiences",
                                    "section_portfolio"=>"#portfolio",
                                    "section_skill"=>"#skill-section",
                                    "section_social"=>"#connect",
                                    "section_testimonial"=>"#testimonial"
                                );
                                foreach ($sections as $section => $name) {
                                    $ssection = str_replace("section-","section_",$section);
                                    $section_id = $section_ids[$ssection];
                                    ?>
                                    <?php if ($themebucket_resumi["{$ssection}_display"] && $themebucket_resumi["{$ssection}_display_menu"]==1) { ?>
                                        <li>
                                            <a href="<?php echo $section_id;?>"><?php echo $themebucket_resumi["{$ssection}_menu_text"]; ?></a>
                                        </li>
                                    <?php
                                    }
                                }
                                ?>


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


