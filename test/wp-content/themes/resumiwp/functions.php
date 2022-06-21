<?php
/**
 * Resumi functions and definitions
 *
 * @package Resumi
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
global $themebucket_resumi;
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';
if (!class_exists('ReduxFramework') && file_exists(dirname(__FILE__) . '/ReduxFramework/ReduxCore/framework.php')) {
    require_once(dirname(__FILE__) . '/ReduxFramework/ReduxCore/framework.php');
}
if (!isset($redux_demo) && file_exists(dirname(__FILE__) . '/ReduxFramework/admin.php')) {
    require_once(dirname(__FILE__) . '/ReduxFramework/admin.php');
}

define('ATTACHMENTS_DEFAULT_INSTANCE', false); // disable the Settings screen


if (!isset($content_width)) {
    $content_width = 640; /* pixels */
}

if (!function_exists('resumi_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function resumi_setup()
    {

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Resumi, use a find and replace
         * to change 'resumi' to the name of your theme in all the template files
         */
        load_theme_textdomain('resumi', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => __('Primary Menu', 'resumi'),
        ));

        // Enable support for Post Formats.
        add_theme_support('post-formats', array( 'quote'));

        // Setup the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('resumi_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Enable support for HTML5 markup.
        add_theme_support('html5', array('comment-list', 'search-form', 'comment-form',));
        add_image_size("portfolio-thumb", "577", "500", true);
        add_image_size("portfolio-items", "1200", "800", true);
        add_image_size("client-logo", "206", "999", false);
        add_image_size("blog-sidebar", "81", "81",true);
        add_image_size("home-blog-thumb", "336", "999");

        update_option("resumi_sections",resumi_get_enabled_sections());
    }
endif; // resumi_setup
add_action('after_setup_theme', 'resumi_setup');

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function resumi_widgets_init()
{
    register_sidebar(array(
        'name' => __('Sidebar', 'resumi'),
        'id' => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
        'description'=>__("Blog Sidebar","resumi")
    ));

    register_sidebar(array(
        'name' => __('Footer Left', 'resumi'),
        'id' => 'sidebar-footer-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
        'description'=>__("Footer Left Sidebar","resumi")
    ));

    register_sidebar(array(
        'name' => __('Footer Middle', 'resumi'),
        'id' => 'sidebar-footer-2',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
        'description'=>__("Footer Middle Sidebar", "resumi")
    ));

    register_sidebar(array(
        'name' => __('Footer Right', 'resumi'),
        'id' => 'sidebar-footer-3',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
        'description'=>__("Footer Right Sidebar","resumi")
    ));
}

add_action('widgets_init', 'resumi_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function resumi_scripts()
{
    global $themebucket_resumi;
    wp_enqueue_style('resumi-style', get_stylesheet_uri());
    wp_enqueue_script("jquery");
    wp_enqueue_style('bootstrap', "//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css");
    if(!isset($themebucket_resumi['resumi_color'])) $themebucket_resumi['resumi_color']=0;
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
            $themebucket_resumi_color = "#ff6c5f";
            break;
    }

    $themebuycket_google_maps_key = $themebucket_resumi['section_contact_key'];

    if (is_page() && basename(get_page_template())=="landing-page.php") {
        wp_enqueue_style('fontawesome', "//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css");
        wp_enqueue_style('pretify', get_template_directory_uri() . "/css/prettify.min.css");
        wp_enqueue_style('superslides', get_template_directory_uri() . "/css/superslides.min.css");
        wp_enqueue_style('animate', get_template_directory_uri() . "/css/animate.min.css");
        wp_enqueue_style('owlcss', get_template_directory_uri() . "/css/owl.carousel.min.css");
        wp_enqueue_style('owlthemecss', get_template_directory_uri() . "/css/owl.theme.min.css");
        wp_enqueue_style('owlthemetransition', get_template_directory_uri() . "/css/owl.transitions.min.css");
        wp_enqueue_style('magnific-popup', get_template_directory_uri() . "/css/magnific-popup.min.css");
        wp_enqueue_style('superfish', get_template_directory_uri() . "/css/superfish.min.css");
        wp_enqueue_style('megafolio', get_template_directory_uri() . "/css/megafolio-style.min.css");
        wp_enqueue_style('megafoliosettings', get_template_directory_uri() . "/css/megafolio-settings.css",null,'2');
        wp_enqueue_style('resumestyle', get_template_directory_uri() . "/css/style.css", null, "13.0");
        wp_enqueue_style('resumestyleres', get_template_directory_uri() . "/css/style-responsive.css", null, "5.0");
        wp_enqueue_style('reset', get_template_directory_uri() . "/css/apps-reset.min.css");
        wp_enqueue_style('widget', get_template_directory_uri() . "/css/widget.min.css");
        wp_enqueue_style('gf1', "//fonts.googleapis.com/css?family=Roboto:400,700");
        wp_enqueue_style('gf2', "//fonts.googleapis.com/css?family=Raleway:900,300,200,100");

        wp_enqueue_script('wait', get_template_directory_uri() . '/js/jquery.wait.min.js', array("jquery"), '1', true);
        wp_enqueue_script('scrollup', get_template_directory_uri() . '/js/jquery.scrollUp.min.js', array("jquery"), '1', true);
        wp_enqueue_script('easing', get_template_directory_uri() . '/js/jquery.easing.min.js', array("jquery"), '1', true);
        wp_enqueue_script('bootstrap', '//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js', array("jquery"), '1', true);
        wp_enqueue_script('superslides', get_template_directory_uri() . '/js/jquery.superslides.min.js', array("jquery"), '1', true);
        wp_enqueue_script('easypiechart', get_template_directory_uri() . '/js/jquery.easypiechart.min.js', array("jquery"), '1', true);
        wp_enqueue_script('nav', get_template_directory_uri() . '/js/jquery.nav.min.js', array("jquery"), '2', true);
        wp_enqueue_script('scrollto', get_template_directory_uri() . "/js/jquery.scrollTo.min.js", array("jquery"), '1', true);
        wp_enqueue_script('owlcarousel', get_template_directory_uri() . "/js/owl.carousel.min.js", array("jquery"), '1', true);
        wp_enqueue_script('waypoint', get_template_directory_uri() . "/js/waypoints.min.js", array("jquery"), '1', true);
        wp_enqueue_script('waypointsticky', get_template_directory_uri() . "/js/waypoints-sticky.min.js", array("jquery"), '1', true);
        wp_enqueue_script('wow', get_template_directory_uri() . "/js/wow.min.js", array("jquery"), '1', false);
        wp_enqueue_script('fittext', get_template_directory_uri() . "/js/jquery.fittext.min.js", array("jquery"), '1', true);
        wp_enqueue_script('appear', get_template_directory_uri() . "/js/jquery.appear.min.js", array("jquery"), '1', true);
        wp_enqueue_script('isotope', get_template_directory_uri() . "/js/jquery.isotope.min.js", array("jquery"), '1', true);
        wp_enqueue_script('smoothscroll', get_template_directory_uri() . "/js/jquery.smooth-scroll.min.js", array("jquery"), '1', true);
        wp_enqueue_script('map', "//maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key={$themebuycket_google_maps_key}", array(), '1', false);
        wp_enqueue_script('mega1', get_template_directory_uri() . "/js/jquery.megafolio.plugins.min.js", array("jquery"), '1', true);
        wp_enqueue_script('mega2', get_template_directory_uri() . "/js/jquery.themepunch.megafoliopro.min.js", array("jquery"), '1', true);
        wp_enqueue_script('magnific', get_template_directory_uri() . "/js/jquery.magnific-popup.min.js", array("jquery"), '1', true);
        wp_enqueue_script('pretty', get_template_directory_uri() . "/js/prettify.min.js", array("jquery"), '1', true);
        wp_enqueue_script('jqueryui', get_template_directory_uri() . "/js/jquery-ui-1.10.4.custom.min.js", array("jquery"), '1', true);
        wp_enqueue_script('hoverintent', get_template_directory_uri() . "/js/hoverIntent.min.js", array("jquery"), '1', true);
        wp_enqueue_script('superfish', get_template_directory_uri() . "/js/superfish.min.js", array("jquery"), '1', true);
        wp_enqueue_script('flickrfeed', get_template_directory_uri() . "/js/jflickrfeed.min.js", array("jquery"), '1', true);
        wp_enqueue_script('nc', get_template_directory_uri() . "/js/jquery.nicescroll.js", array("jquery"), '1', true);
        wp_enqueue_script('commons', get_template_directory_uri() . '/js/scripts.js', array("jquery"), '8', true);
        wp_localize_script("commons", "wpdata", array("url" => site_url("/"), "td" => get_template_directory_uri()));
        if (isset($themebucket_resumi['section_contact_lat']) && isset($themebucket_resumi['section_contact_lon']))
        wp_localize_script("commons", "geo", array("map"=>$themebucket_resumi['section_map_display'],"lat" => $themebucket_resumi['section_contact_lat'], "lon" => $themebucket_resumi['section_contact_lon']));
        if (isset($themebucket_resumi['section_footer_flickr']))
        wp_localize_script("commons", "flickr", array("id" => $themebucket_resumi['section_footer_flickr'],"limit"=>$themebucket_resumi['section_footer_flickr_limit']));
        if (isset($themebucket_resumi_color))
        wp_localize_script("commons", "color", array("code" => $themebucket_resumi_color));
        wp_enqueue_script('resumi-navigation', get_template_directory_uri() . '/js/navigation.min.js', array(), '20120206', true);
        wp_enqueue_script('resumi-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.min.js', array(), '20130115', true);

    }else{
        //blog
        wp_enqueue_style('animate', get_template_directory_uri() . "/css/animate.min.css");
        wp_enqueue_style('pretify', get_template_directory_uri() . "/css/prettify.min.css");
        wp_enqueue_style('fontawesome', "//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css");
        wp_enqueue_style('magnific-popup', get_template_directory_uri() . "/css/magnific-popup.min.css");
        wp_enqueue_style('superfish', get_template_directory_uri() . "/css/superfish.min.css");
        wp_enqueue_style('blog-style', get_template_directory_uri() . "/css/blog.min.css", null, "2.0");
        wp_enqueue_style('reset', get_template_directory_uri() . "/css/apps-reset.min.css");
        wp_enqueue_style('widget', get_template_directory_uri() . "/css/widget.min.css");
        wp_enqueue_style('gf1', "//fonts.googleapis.com/css?family=Roboto:400,700");
        wp_enqueue_style('gf2', "//fonts.googleapis.com/css?family=Raleway:900,300,200,100");

        wp_enqueue_script('waypoint', get_template_directory_uri() . "/js/waypoints.min.js", array("jquery"), '1', true);
        wp_enqueue_script('waypointsticky', get_template_directory_uri() . "/js/waypoints-sticky.min.js", array("jquery"), '1', true);
        wp_enqueue_script('smoothscroll', get_template_directory_uri() . "/js/jquery.smooth-scroll.min.js", array("jquery"), '1', true);
        wp_enqueue_script('scrollup', get_template_directory_uri() . '/js/jquery.scrollUp.min.js', array("jquery"), '1', true);
        wp_enqueue_script('wow', get_template_directory_uri() . "/js/wow.min.js", array("jquery"), '1', false);
        wp_enqueue_script('magnific', get_template_directory_uri() . "/js/jquery.magnific-popup.min.js", array("jquery"), '1', true);
        wp_enqueue_script('superfish', get_template_directory_uri() . "/js/superfish.min.js", array("jquery"), '1', true);
        wp_enqueue_script('flickrfeed', get_template_directory_uri() . "/js/jflickrfeed.min.js", array("jquery"), '1', true);
        wp_enqueue_script('nc', get_template_directory_uri() . "/js/jquery.nicescroll.js", array("jquery"), '1', true);
        wp_enqueue_script('blog', get_template_directory_uri() . "/js/blog-init.min.js", array("jquery","flickrfeed"), '2', true);
        wp_localize_script("blog", "flickr", array("id" => $themebucket_resumi['section_footer_flickr'],"limit"=>$themebucket_resumi['section_footer_flickr_limit']));

    }
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'resumi_scripts');

/**
 * Implement the Custom Header feature.
 */

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


function resume_featured_icon_metaboxes()
{
    $prefix = "_resume_";
    $meta_boxes[] = array(
        'id' => 'experience',
        'title' => __('Experience Details (Latest experience will be displayed on top)',"resumi"),
        'pages' => array('experience'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => __('Company Name ',"resumi"),
                'id' => $prefix . 'exp_name',
                'type' => 'text_medium'
            ),
            array(
                'name' => __('Company URL ',"resui"),
                'id' => $prefix . 'exp_url',
                'type' => 'text_medium'
            ),
            array(
                'name' => __('Position',"resumi"),
                'id' => $prefix . 'exp_position',
                'type' => 'text_medium'
            ),
            array(
                'name' => __('From - To ',"resumi"),
                'id' => $prefix . 'exp_duration',
                'type' => 'text_medium'
            ),
            array(
                'name' => __('Currently Working Here ',"resumi"),
                'id' => $prefix . 'exp_working',
                'type' => 'checkbox'
            ),
            array(
                'name' => __('Description',"resumi"),
                'id' => $prefix . 'exp_description',
                'type' => 'wysiwyg'
            ),
        )
    );

    $meta_boxes[] = array(
        'id' => 'education',
        'title' => __('Education Details (Latest education will be displayed on top)',"resumi"),
        'pages' => array('education'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => __('Degree Earned ',"resumi"),
                'id' => $prefix . 'edu_degree',
                'type' => 'text_medium'
            ),
            array(
                'name' => __('College ',"resumi"),
                'id' => $prefix . 'edu_college',
                'type' => 'text_medium'
            ),
            array(
                'name' => __('Time (yy/mm)',"resumi"),
                'id' => $prefix . 'edu_time',
                'type' => 'text_medium'
            ),
            array(
                'name' => __('Result ',"resumi"),
                'id' => $prefix . 'edu_result',
                'type' => 'text_medium'
            ),
            array(
                'name' => __('Description',"resumi"),
                'id' => $prefix . 'edu_description',
                'type' => 'wysiwyg',

            ),
        )
    );

    $meta_boxes[] = array(
        'id' => 'testimonial',
        'title' => __('Testimonial Details (Latest testimonial will be displayed first)',"resumi"),
        'pages' => array('testimonial'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => __('Photo of the Person ',"resumi"),
                'id' => $prefix . 'test_image',
                'type' => 'file'
            ),
            array(
                'name' => __('Name of the Person ',"resumi"),
                'id' => $prefix . 'test_name',
                'type' => 'text_medium'
            ),
            array(
                'name' => __('Designation',"resumi"),
                'id' => $prefix . 'test_designation',
                'type' => 'text_medium'
            ),
            array(
                'name' => __('Testimonial ',"resumi"),
                'id' => $prefix . 'test_description',
                'type' => 'wysiwyg'
            ),
        )
    );
    return $meta_boxes;
}

add_filter('cmb_meta_boxes', 'resume_featured_icon_metaboxes');

// Initialize the metabox class
add_action('init', 'resume_initialize_cmb_meta_boxes', 9999);
function resume_initialize_cmb_meta_boxes()
{
    if (!class_exists('cmb_Meta_Box')) {
        require_once('libs/cmb/init.php');
    }
}


function resumi_custom_posts()
{

    $labels1 = array(
        'name' => _x('Experiences', 'Post Type General Name', 'resumi'),
        'singular_name' => _x('Experience', 'Post Type Singular Name', 'resumi'),
        'menu_name' => __('Experiences', 'resumi'),
        'parent_item_colon' => __('Parent Experience:', 'resumi'),
        'all_items' => __('All Experiences', 'resumi'),
        'view_item' => __('View Experience', 'resumi'),
        'add_new_item' => __('Add New Experience', 'resumi'),
        'add_new' => __('New Experience', 'resumi'),
        'edit_item' => __('Edit Experience', 'resumi'),
        'update_item' => __('Update Experience', 'resumi'),
        'search_items' => __('Search Experience', 'resumi'),
        'not_found' => __('No experience found', 'resumi'),
        'not_found_in_trash' => __('No experiences found in Trash', 'resumi'),
    );
    $args1 = array(
        'label' => __('Experience', 'resumi'),
        'description' => __('Experience', 'resumi'),
        'labels' => $labels1,
        'supports' => array('title'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => get_template_directory_uri() . '/img/menuicon/experience.png',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('experience', $args1);

    $labels2 = array(
        'name' => _x('Educations', 'Post Type General Name', 'resumi'),
        'singular_name' => _x('Education', 'Post Type Singular Name', 'resumi'),
        'menu_name' => __('Educations', 'resumi'),
        'parent_item_colon' => __('Parent Education:', 'resumi'),
        'all_items' => __('All Educations', 'resumi'),
        'view_item' => __('View Education', 'resumi'),
        'add_new_item' => __('Add New Education', 'resumi'),
        'add_new' => __('New Education', 'resumi'),
        'edit_item' => __('Edit Education', 'resumi'),
        'update_item' => __('Update Education', 'resumi'),
        'search_items' => __('Search Educations', 'resumi'),
        'not_found' => __('No education found', 'resumi'),
        'not_found_in_trash' => __('No educations found in Trash', 'resumi'),
    );
    $args2 = array(
        'label' => __('Education', 'resumi'),
        'description' => __('Education', 'resumi'),
        'labels' => $labels2,
        'supports' => array('title'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => get_template_directory_uri() . '/img/menuicon/education.png',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('education', $args2);

    $labels3 = array(
        'name' => _x('Portfolios', 'Post Type General Name', 'resumi'),
        'singular_name' => _x('Portfolio', 'Post Type Singular Name', 'resumi'),
        'menu_name' => __('Portfolios', 'resumi'),
        'parent_item_colon' => __('Parent Portfolio:', 'resumi'),
        'all_items' => __('All Portfolios', 'resumi'),
        'view_item' => __('View Portfolio', 'resumi'),
        'add_new_item' => __('Add New Portfolio', 'resumi'),
        'add_new' => __('New Portfolio', 'resumi'),
        'edit_item' => __('Edit Portfolio', 'resumi'),
        'update_item' => __('Update Portfolio', 'resumi'),
        'search_items' => __('Search Portfolios', 'resumi'),
        'not_found' => __('No portfolio found', 'resumi'),
        'not_found_in_trash' => __('No portfolios found in Trash', 'resumi'),
    );
    $args3 = array(
        'label' => __('Portfolio', 'resumi'),
        'description' => __('Portfolio', 'resumi'),
        'labels' => $labels3,
        'supports' => array('title'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => get_template_directory_uri() . '/img/menuicon/portfolio.png',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('portfolio', $args3);

    $labels4 = array(
        'name' => _x('Testimonials', 'Post Type General Name', 'resumi'),
        'singular_name' => _x('Testimonial', 'Post Type Singular Name', 'resumi'),
        'menu_name' => __('Testimonials', 'resumi'),
        'parent_item_colon' => __('Parent Testimonial:', 'resumi'),
        'all_items' => __('All Testimonials', 'resumi'),
        'view_item' => __('View Testimonial', 'resumi'),
        'add_new_item' => __('Add New Testimonial', 'resumi'),
        'add_new' => __('New Testimonial', 'resumi'),
        'edit_item' => __('Edit Testimonial', 'resumi'),
        'update_item' => __('Update Testimonial', 'resumi'),
        'search_items' => __('Search Testimonials', 'resumi'),
        'not_found' => __('No testimonial found', 'resumi'),
        'not_found_in_trash' => __('No testimonials found in Trash', 'resumi'),
    );
    $args4 = array(
        'label' => __('Testimonial', 'resumi'),
        'description' => __('Testimonial', 'resumi'),
        'labels' => $labels4,
        'supports' => array('title'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => get_template_directory_uri() . '/img/menuicon/testimonial.png',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('testimonial', $args4);
}

add_action('init', 'resumi_custom_posts', 0);


/**
 *  Attachments for Portfolio
 */

function resume_portfolio($attachments)
{
    $fields = array(
        array(
            'name' => 'title', // unique field name
            'type' => 'text', // registered field type
            'label' => __('Title (optional)', 'attachments'), // label to display
        ),
        array(
            'name' => 'tags', // unique field name
            'type' => 'text', // registered field type
            'label' => __('Comma separated tags (optional)', 'attachments'), // label to display
        ),
        array(
            'name' => 'url', // unique field name
            'type' => 'text', // registered field type
            'label' => __('URL (optional)', 'attachments'), // label to display
        ),
        array(
            'name' => 'description', // unique field name
            'type' => 'textarea', // registered field type
            'label' => __('Desciption (optional)', 'attachments'), // label to display
        ),

    );

    $args = array(

        'label' => __('Add Gallery Items',"resumi"),
        'post_type' => array('portfolio'),
        'position' => 'advanced',
        'priority' => 'high',
        'filetype' => array("image"), // no filetype limit
        'append' => true,
        'button_text' => __('Attach Images', 'attachments'),
        'fields' => $fields,
    );


    $attachments->register('resume_portfolio', $args); // unique instance name
}

add_action('attachments_register', 'resume_portfolio');


function resumi_get_custom_posts($type, $limit = 20, $order = "DESC", $metaorder =false, $metaorder_key = null)
{
    //wp_reset_postdata();
    $args = array(
        "posts_per_page" => $limit,
        "post_type" => $type,
        "orderby" => "ID",
        "order" => $order,
    );
    if($metaorder){
    	$args['orderby'] = 'meta_value';
    	$args['meta_key'] = $metaorder_key;
    }
    $custom_posts = get_posts($args);
	return $custom_posts;
}

function resumi_truncate($string, $limit, $break=".", $pad="...")
{
    // return with no change if string is shorter than $limit
    if(strlen($string) <= $limit) return $string;

    // is $break present between $limit and the end of the string?
    if(false !== ($breakpoint = strpos($string, $break, $limit))) {
        if($breakpoint < strlen($string) - 1) {
            $string = substr($string, 0, $breakpoint) . $pad;
        }
    }

    return $string;
}


function resumi_comment_author($id, $comment_id)
{
    $user = new WP_User($id);
    if ($user) {
        return $user->display_name;
    }
    return get_comment_author($comment_id);
}

function resumi_user_display_name($id)
{
    $user = new WP_User($id);
    return $user->display_name;
}

/**
 * Add custom class to the comment reply link
 */
add_filter('comment_reply_link', 'resumi_replace_reply_link_class');

function resumi_replace_reply_link_class($class){
    $class = str_replace("class='comment-reply-link", "class='comment-reply-link pull-right reply", $class);
    return $class;
}

function resumi_get_latest_commented_posts($limit = 3){
    global $wpdb;
    $query = "select wp_posts.*, max(comment_date) as comment_date
                from {$wpdb->posts} wp_posts
                right join {$wpdb->comments}
                on id = comment_post_id
                group by ID
                order by comment_date desc
                limit {$limit}";
    $custom_posts = $wpdb->get_results($query, OBJECT);
    return $custom_posts;
}

function resumi_get_blog_link(){
    $blog_post = get_option("page_for_posts");
    if($blog_post){
        $permalink = get_permalink($blog_post);
    }
    else
        $permalink = site_url();
    return $permalink;
}

function resumi_get_rev_sliders(){
    global $wpdb;
    $sliders = array(0=>"Select a Revolution Slider");
    $query = "SELECT * FROM {$wpdb->prefix}revslider_sliders order by title";
    $custom_posts = $wpdb->get_results($query, OBJECT);
    foreach($custom_posts as $cs){
        $sliders[] = $cs->alias;
    }
    return $sliders;
}

function resumi_get_enabled_sections(){
    global $themebucket_resumi;
    $sections = array();
    if( isset( $themebucket_resumi['section_abtme_display'] ) ) $sections['section-abtme'] = "About Me";
    if( isset( $themebucket_resumi['section_skill_display'] ) ) $sections['section-skill'] = "Skills";
    if( isset( $themebucket_resumi['section_experience_display'] ) ) $sections['section-experience'] = "Experiences";
    if( isset( $themebucket_resumi['section_education_display'] ) ) $sections['section-education'] = "Education";
    if( isset( $themebucket_resumi['section_portfolio_display'] ) ) $sections['section-portfolio'] = "Portfolio";
    if( isset( $themebucket_resumi['section_testimonial_display'] ) ) $sections['section-testimonial'] = "Testimonial";
    if( isset( $themebucket_resumi['section_blog_display'] ) ) $sections['section-blog'] = "Blog";
    if( isset( $themebucket_resumi['section_social_display'] ) ) $sections['section-social'] = "Social";
    if( isset( $themebucket_resumi['section_contact_display'] ) ) $sections['section-contact'] = "Contact";
    return ($sections);
}

function resumi_get_all_sections(){
    $sections = array();
    $sections['section-abtme'] = "About Me";
    $sections['section-skill'] = "Skills";
    $sections['section-experience'] = "Experiences";
    $sections['section-education'] = "Education";
    $sections['section-portfolio'] = "Portfolio";
    $sections['section-testimonial'] = "Testimonial";
    $sections['section-blog'] = "Blog";
    $sections['section-social'] = "Social";
    $sections['section-contact'] = "Contact";
    return $sections;
}

//show_admin_bar(false);

add_action( 'wp_ajax_nopriv_sendmail', 'resumi_sendmail' );
add_action( 'wp_ajax_sendmail', 'resumi_sendmail' );

function resumi_sendmail(){
    global $themebucket_resumi;
    $receiver = $themebucket_resumi['section_contact_receiver'];
    $message = $themebucket_resumi['section_contact_message'];
    if(!$message) $message = "Your mesage was successfully sent";
    $headers = "From: {$_REQUEST['name']} <{$_REQUEST['email']}> \n";
    //print_r($_REQUEST);
    $res = wp_mail($receiver,$_POST['subject'],$_POST['message'],$headers);
    echo $message;
    die();
}

/**
 * TGMA
 */
add_action( 'tgmpa_register', 'resumi_register_required_plugins' );

function resumi_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name, slug and required.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

        // This is an example of how to include a plugin pre-packaged with a theme
        array(
            'name'                  => 'Attachments', // The plugin name
            'slug'                  => 'attachments', // The plugin slug (typically the folder name)
//            'source'                => get_template_directory_uri() . '/plugins/attachments.zip', // The plugin source
            'required'              => true, // If false, the plugin is only 'recommended' instead of required
            'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),

        array(
            'name'                  => 'Contact Form 7', // The plugin name
            'slug'                  => 'contact-form-7', // The plugin slug (typically the folder name)
//            'source'                => get_template_directory_uri() . '/plugins/contact-form.zip', // The plugin source
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
            'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),

        array(
            'name'                  => 'Revolution Slider', // The plugin name
            'slug'                  => 'revslider', // The plugin slug (typically the folder name)
            'source'                => get_template_directory_uri() . '/plugins/revslider.zip', // The plugin source
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
            'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),
        /*array(
            'name'                  => 'Essential Grid', // The plugin name
            'slug'                  => 'essential-grid', // The plugin slug (typically the folder name)
            'source'                => get_template_directory_uri() . '/plugins/essential-grid.zip', // The plugin source
            'required'              => true, // If false, the plugin is only 'recommended' instead of required
            'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),*/

    );

    // Change this to your theme text domain, used for internationalising strings
    $theme_text_domain = 'resumi';

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'domain'            => $theme_text_domain,           // Text domain - likely want to be the same as your theme.
        'default_path'      => '',                           // Default absolute path to pre-packaged plugins
        'parent_menu_slug'  => 'themes.php',         // Default parent menu slug
        'parent_url_slug'   => 'themes.php',         // Default parent URL slug
        'menu'              => 'install-required-plugins',   // Menu slug
        'has_notices'       => true,                         // Show admin notices or not
        'is_automatic'      => false,            // Automatically activate plugins after installation or not
        'message'           => '',               // Message to output right before the plugins table
        'strings'           => array(
            'page_title'                                => __( 'Install Required Plugins', $theme_text_domain ),
            'menu_title'                                => __( 'Install Plugins', $theme_text_domain ),
            'installing'                                => __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
            'oops'                                      => __( 'Something went wrong with the plugin API.', $theme_text_domain ),
            'notice_can_install_required'               => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
            'notice_can_install_recommended'            => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_install'                     => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
            'notice_can_activate_required'              => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
            'notice_can_activate_recommended'           => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_activate'                    => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
            'notice_ask_to_update'                      => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_update'                      => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
            'install_link'                              => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                             => _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
            'return'                                    => __( 'Return to Required Plugins Installer', $theme_text_domain ),
            'plugin_activated'                          => __( 'Plugin activated successfully.', $theme_text_domain ),
            'complete'                                  => __( 'All plugins installed and activated successfully. %s', $theme_text_domain ) // %1$s = dashboard link
        )
    );

    tgmpa( $plugins, $config );

}
