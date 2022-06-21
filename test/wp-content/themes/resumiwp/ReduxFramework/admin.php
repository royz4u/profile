<?php

/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit http://reduxframework.com/docs/
 **/


/**
 *
 * Most of your editing will be done in this section.
 *
 * Here you can override default values, uncomment args and change their values.
 * No $args are required, but they can be overridden if needed.
 **/
$args = array();


// For use with a tab example below
$tabs = array();

ob_start();

$ct = wp_get_theme();
$theme_data = $ct;
$item_name = $theme_data->get('Name');
$tags = $ct->Tags;
$screenshot = $ct->get_screenshot();
$class = $screenshot ? 'has-screenshot' : '';

$customize_title = sprintf(__('Customize &#8220;%s&#8221;', 'resumi-admin'), $ct->display('Name'));

?>
    <div id="current-theme" class="<?php echo esc_attr($class); ?>">
        <?php if ($screenshot) : ?>
            <?php if (current_user_can('edit_theme_options')) : ?>
                <a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize"
                   title="<?php echo esc_attr($customize_title); ?>">
                    <img src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview'); ?>"/>
                </a>
            <?php endif; ?>
            <img class="hide-if-customize" src="<?php echo esc_url($screenshot); ?>"
                 alt="<?php esc_attr_e('Current theme preview'); ?>"/>
        <?php endif; ?>

        <h4>
            <?php echo $ct->display('Name'); ?>
        </h4>

        <div>
            <ul class="theme-info">
                <li><?php printf(__('By %s', 'resumi-admin'), $ct->display('Author')); ?></li>
                <li><?php printf(__('Version %s', 'resumi-admin'), $ct->display('Version')); ?></li>
                <li><?php echo '<strong>' . __('Tags', 'resumi-admin') . ':</strong> '; ?><?php printf($ct->display('Tags')); ?></li>
            </ul>
            <p class="theme-description"><?php echo $ct->display('Description'); ?></p>
            <?php if ($ct->parent()) {
                printf(' <p class="howto">' . __('This <a href="%1$s">child theme</a> requires its parent theme, %2$s.') . '</p>',
                    __('http://codex.wordpress.org/Child_Themes', 'resumi-admin'),
                    $ct->parent()->display('Name'));
            } ?>

        </div>

    </div>

<?php
$item_info = ob_get_contents();

ob_end_clean();

$sampleHTML = '';
if (file_exists(dirname(__FILE__) . '/info-html.html')) {
    /** @global WP_Filesystem_Direct $wp_filesystem */
    global $wp_filesystem;
    if (empty($wp_filesystem)) {
        require_once(ABSPATH . '/wp-admin/includes/file.php');
        WP_Filesystem();
    }
    $sampleHTML = $wp_filesystem->get_contents(dirname(__FILE__) . '/info-html.html');
}

$args['dev_mode'] = false;
$args['customizer'] = true;
$args['dev_mode_icon_class'] = 'icon-large';
$args['opt_name'] = 'themebucket_resumi';
$theme = wp_get_theme();

$args['display_name'] = $theme->get('Name');
$args['display_version'] = $theme->get('Version');

// If you want to use Google Webfonts, you MUST define the api key.
$args['google_api_key'] = 'AIzaSyAX_2L_UzCDPEnAHTG7zhESRVpMPS4ssII';

$args['share_icons']['twitter'] = array(
    'link' => 'http://twitter.com/theme_bucket',
    'title' => 'Follow me on Twitter',
    'img' => ReduxFramework::$_url . 'assets/img/social/Twitter.png'
);

$args['import_icon_class'] = 'icon-large';

/**
 * Set default icon class for all sections and tabs
 * @since 3.0.9
 */
$args['default_icon_class'] = 'icon-large';


// Set a custom menu icon.
$args['menu_icon'] = get_template_directory_uri() . "/img/fav.png";

// Set a custom title for the options page.
// Default: Options
$args['menu_title'] = __('ResumeX Settings', 'resumi-admin');

// Set a custom page title for the options page.
// Default: Options
$args['page_title'] = __('ResumeX Settings', 'resumi-admin');

// Set a custom page slug for options page (wp-admin/themes.php?page=***).
// Default: redux_options
$args['page_slug'] = 'resumex_options';

$args['default_show'] = true;
$args['default_mark'] = '*';


if (!isset($args['global_variable']) || $args['global_variable'] !== false) {
    if (!empty($args['global_variable'])) {
        $v = $args['global_variable'];
    } else {
        $v = str_replace("-", "_", $args['opt_name']);
    }
} else {
}

$sections = array();

//Background Patterns Reader
$sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
$sample_patterns_url = ReduxFramework::$_url . '../sample/patterns/';
$sample_patterns = array();

if (is_dir($sample_patterns_path)) :

    if ($sample_patterns_dir = opendir($sample_patterns_path)) :
        $sample_patterns = array();

        while (($sample_patterns_file = readdir($sample_patterns_dir)) !== false) {

            if (stristr($sample_patterns_file, '.png') !== false || stristr($sample_patterns_file, '.jpg') !== false) {
                $name = explode(".", $sample_patterns_file);
                $name = str_replace('.' . end($name), '', $sample_patterns_file);
                $sample_patterns[] = array('alt' => $name, 'img' => $sample_patterns_url . $sample_patterns_file);
            }
        }
    endif;
endif;
global $themebucket_resumi;
$sections[] = array(
    'title' => __('Global Management', 'resumi'),
    'icon_class' => 'icon-large',
    'icon' => 'el-icon-globe',
    'fields' => array(
        array(
            'id' => 'global_favicons',
            'type' => 'media',
            'title' => __('Upload Favicon', 'resumi'),
            'default' => array("url" => get_template_directory_uri() . "/img/fav.png"),
            'preview' => true,
            "url" => true,
        ),
        $fields = array(
            'id' => 'resumi_sections_order',
            'type' => 'sortable',
            'title' => __('Sort Sections', 'resumi'),
            'subtitle' => __('Define and reorder these sections however you want.', 'resumi'),
            'mode' => 'text',
            'options' => get_option("resumi_sections"),
        ),
        array(
            'id' => 'resumi_color',
            'type' => 'image_select',
            'title' => __('Color Scheme', 'resumi'),
            'subtitle' => __('Select Predefined Color Schemes or your Own', 'resumi'),
            'options' => array(
                '1' => array(
                    'alt' => 'Blue',
                    'img' => get_template_directory_uri() . '/img/colors/blue.png'
                ),
                '2' => array(
                    'alt' => 'Green',
                    'img' => get_template_directory_uri() . '/img/colors/green.png'
                ),
                '3' => array(
                    'alt' => 'Navy',
                    'img' => get_template_directory_uri() . '/img/colors/navy.png'
                ),
                '4' => array(
                    'alt' => 'Purple',
                    'img' => get_template_directory_uri() . '/img/colors/purple.png'
                ),
                '5' => array(
                    'alt' => 'Red',
                    'img' => get_template_directory_uri() . '/img/colors/red.png'
                ),
                '6' => array(
                    'alt' => 'Turquoise',
                    'img' => get_template_directory_uri() . '/img/colors/turquoise.png'
                ),
                '7' => array(
                    'alt' => 'Choose Your One',
                    'img' => get_template_directory_uri() . '/img/colors/white.png'
                )
            ),
            'default' => '6'
        ),
        array(
            'id' => 'resumi_custom_color',
            'type' => 'color',
            'title' => __('Your Own Theme Color', 'resumi'),
            'subtitle' => __('Pick a custom color', 'resumi'),
            'default' => '#FFFFFF',
            'validate' => 'color',
            'required' => array("resumi_color", "=", "7")
        ),
        array(
            'id' => 'custom_css',
            'type' => 'ace_editor',
            'title' => __('Custom CSS', 'resumi'),
            'description' => 'Write your custom CSS code inside &lt;style> &lt;/style> block'
        ),

        array(
            'id' => 'custom_ga',
            'type' => 'ace_editor',
            'title' => __('Google Analytics Code', 'resumi'),
            'description' => 'Write your custom google analytics code inside &lt;script> &lt;/script> block'

        ),
        array(
            'id' => 'custom_main_title_font',
            'type' => 'typography',
            'title' => __('Google Font for Main Title', 'resumi'),
            'google'      => true,
            'color' => false,
            'word-spacing'=>false,
            'text-align'=>false,
            'update-weekly'=>false,
            'line-height'=>false,
            'subsets'=>false,
            'letter-spacing'=>true,
            'font-style'=>true,
            'font-backup' => false,
            'font-size'=>true,
            'font-weight'=>true,
            'output'      => array('.home-text h1'),
            'units'       =>'px',
            'default'     => array(
                'font-family' => 'Raleway',
                'google'      => true,
                'font-size'   => '70px',
                'font-weight' => 900,
                'letter-spacing'=>'3px',
                'line-height'=>1.1

            ),
        ),
        array(
            'id' => 'custom_main_subtitle_font',
            'type' => 'typography',
            'title' => __('Google Font for Main Sub Title', 'resumi'),
            'google'      => true,
            'color' => false,
            'word-spacing'=>false,
            'text-align'=>false,
            'update-weekly'=>false,
            'line-height'=>false,
            'subsets'=>false,
            'letter-spacing'=>true,
            'font-style'=>true,
            'font-backup' => false,
            'font-size'=>true,
            'font-weight'=>true,
            'output'      => array('.home-text h2'),
            'units'       =>'px',
            'default'     => array(
                'font-family' => 'Raleway',
                'google'      => true,
                'font-size'   => '28px',
                'font-weight' => 300,
                'letter-spacing'=>'2px',
                'line-height'=>1.1
            ),
        ),
        array(
            'id' => 'custom_title_font',
            'type' => 'typography',
            'title' => __('Google Font for Section Titles', 'resumi'),
            'google'      => true,
            'color' => false,
            'word-spacing'=>false,
            'text-align'=>false,
            'update-weekly'=>false,
            'line-height'=>false,
            'subsets'=>false,
            'letter-spacing'=>false,
            'font-style'=>false,
            'font-backup' => false,
            'font-size'=>true,
            'font-weight'=>false,
            'output'      => array('h1.section-heading'),
            'units'       =>'px',
            'default'     => array(
                'font-family' => 'Raleway',
                'google'      => true,
                'font-size'   => '62px',
                'font-weight' => 900,
                'line-height'=>1.1

            ),
        ),
        array(
            'id' => 'custom_subtitle_font',
            'type' => 'typography',
            'title' => __('Google Font for Section SubTitles', 'resumi'),
            'google'      => true,
            'color' => false,
            'word-spacing'=>false,
            'text-align'=>false,
            'update-weekly'=>false,
            'line-height'=>false,
            'subsets'=>false,
            'letter-spacing'=>false,
            'font-style'=>false,
            'font-size'=>true,
            'font-weight'=>false,
            'font-backup' => false,
            'output'      => array('.section-subheading-nobg'),
            'units'       =>'px',
            'default'     => array(
                'font-family' => 'Roboto',
                'google'      => true,
                'font-size'   => '20px',
                'font-weight' => 400,
                'line-height'=>1.1

            ),
        ),
        array(
            'id' => 'custom_text_font',
            'type' => 'typography',
            'title' => __('Google Font for Section Texts', 'resumi'),
            'google'      => true,
            'color' => false,
            'word-spacing'=>false,
            'text-align'=>false,
            'update-weekly'=>false,
            'line-height'=>false,
            'subsets'=>false,
            'letter-spacing'=>false,
            'font-style'=>false,
            'font-size'=>false,
            'font-weight'=>false,
            'font-backup' => false,
            'output'      => array('body'),
            'units'       =>'px',
            'default'     => array(
                'font-family' => 'Roboto',
                'google'      => true,
            ),
        ),
    )
);

$sections[] = array(
    'title' => __('Header Section', 'resumi'),
    'icon_class' => 'icon-large',
    'icon' => 'el-icon-website',
    'fields' => array(
        array(
            'id' => 'section_header_standard_display',
            'type' => 'switch',
            'title' => __('Display Standard Header', 'resumi'),
            'default' => 1,
        ),
        array(
            'id' => 'section_header_rev_display',
            'type' => 'switch',
            'title' => __('Display Revolution Slider', 'resumi'),
            'default' => 0,
            'required' => array('section_header_standard_display', '=', '0')
        ),
        array(
            'id' => 'section_header_primary',
            'type' => 'text',
            'title' => __('Header Primary Text', 'resumi'),
            'default' => "ANTHONY JONES",
            'required' => array('section_header_standard_display', '=', '1')
        ),
        array(
            'id' => 'section_header_secondary',
            'type' => 'text',
            'title' => __('Header Secondary Text', 'resumi'),
            'default' => "An Interactive web designer with the passion of creativity",
            'required' => array('section_header_standard_display', '=', '1')
        ),
        array(
            'id' => 'section_header_mainimg',
            'type' => 'media',
            'title' => __('Section Background Image', 'resumi'),
            'default' => array("url" => get_template_directory_uri() . "/img/banner1.jpg"),
            'preview' => true,
            "url" => true,
            'required' => array('section_header_standard_display', '=', '1')

        ),
        array(
            'id' => 'section_header_logo',
            'type' => 'media',
            'title' => __('Section Logo Image', 'resumi'),
            'default' => array("url" => get_template_directory_uri() . "/img/logo-1.png"),
            'preview' => true,
            "url" => true,
            'required' => array('section_header_standard_display', '=', '1')
        ),
        array(
            'id' => 'section_header_nav_logo',
            'type' => 'media',
            'title' => __('Section Navigation Logo', 'resumi'),
            'default' => array("url" => get_template_directory_uri() . "/img/sticky-logo.png"),
            'preview' => true,
            "url" => true,
            'required' => array('section_header_standard_display', '=', '1')
        ),
        array(
            'id' => 'section_rev_slider',
            'type' => 'text',
            'title' => __('Slider Alias', 'resumi'),
            'desc' => __('Create one from <a href="' . site_url() . '/wp-admin/admin.php?page=revslider">here</a>', 'resumi'),
            'required' => array('section_header_standard_display', '=', '0')

        ),
    )
);

$sections[] = array(
    'title' => __('About Me Section', 'resumi'),
    'icon_class' => 'icon-large',
    'icon' => 'el-icon-user',
    'fields' => array(
        array(
            'id' => 'section_abtme_display',
            'type' => 'switch',
            'title' => __('Display Section', 'resumi'),
            'default' => 1,
        ),
        array(
            'id' => 'section_abtme_display_menu',
            'type' => 'switch',
            'title' => __('Display In Menubar', 'resumi'),
            'default' => 1,
        ),
        array(
            'id' => 'section_abtme_menu_text',
            'type' => 'text',
            'title' => __('Section Title in Menubar', 'resumi'),
            'default' => "ABOUT ME",
            'required' => array('section_abtme_display_menu', '=', '1')
        ),

        array(
            'id' => 'section_abtme_mainimg',
            'type' => 'media',
            'title' => __('Section Image', 'resumi'),
            'default' => array("url" => get_template_directory_uri() . "/img/p1.jpg"),
            'preview' => true,
            "url" => true
        ),
        array(
            'id' => "section_abtme_title",
            'type' => 'text',
            'title' => __('Section Title', 'resumi'),
            'default' => "ABOUT ME",
        ),
        array(
            'id' => "section_abtme_subtitle",
            'type' => 'text',
            'title' => __('Section Subtitle', 'resumi'),
            'default' => "ANTHONY JONES - Creative Web & Graphic Designer",
        ),

        array(
            'id' => "section_abtme_text",
            'type' => 'editor',
            'title' => __('Section Text', 'resumi'),
            'default' => str_repeat("Lorem Ipsum is simply dummy text of the printing and typesetting industry. ", 10),
        ),

        array(
            'id' => 'section_abtme_signature',
            'type' => 'media',
            'title' => __('Signature File', 'resumi'),
            'default' => array("url" => get_template_directory_uri() . "/img/sign.jpg"),
            'preview' => true,
            "url" => true
        ),
        array(
            'id' => 'section_abtme_resume',
            'type' => 'text',
            'title' => __('Resume Document URL', 'resumi'),
        ),
    )
);

$sections[] = array(
    'title' => __('Skills Section', 'resumi'),
    'icon_class' => 'icon-large',
    'icon' => 'el-icon-tasks',
    'fields' => array(
        array(
            'id' => 'section_skill_display',
            'type' => 'switch',
            'title' => __('Display Section', 'resumi'),
            'default' => 1,
        ),
        array(
            'id' => 'section_skill_display_menu',
            'type' => 'switch',
            'title' => __('Display In Menubar', 'resumi'),
            'default' => 1,
        ),
        array(
            'id' => 'section_skill_menu_text',
            'type' => 'text',
            'title' => __('Section Title in Menubar', 'resumi'),
            'default' => "SKILLS",
            'required' => array('section_skill_display_menu', '=', '1')

        ),
        array(
            'id' => 'section_skill_bg',
            'type' => 'media',
            'title' => __('Skill Background', 'resumi'),
            'default' => array("url" => get_template_directory_uri() . "/img/about-bg.jpg"),
            'preview' => true,
            "url" => true,
            'required' => array('section_skill_display', '=', '1')

        ),
        array(
            'id' => "section_skill_title",
            'type' => 'text',
            'title' => __('Section Title', 'resumi'),
            'default' => "SKILLS",
        ),
        array(
            'id' => "section_skill_subtitle",
            'type' => 'text',
            'title' => __('Section Subtitle', 'resumi'),
            'default' => "I AM REALLY GOOD AT THE FOLLOWING TECHNICAL SKILLS",
        ),
        array(
            'id' => 'section_skill_skills',
            'type' => 'multi_text',
            'title' => __('Skills with Values', 'resumi'),
            'subtitle' => __('Add as many skills as you want. Separate skill name and value by a comma, ex: Photoshop,90', 'resumi'),
        ),
        array(
            'id' => "section_skill_banner_title",
            'type' => 'text',
            'title' => __('Section Skill Banner Title', 'resumi'),
            'default' => "NEQUE PORRO QUISQUAM EST QUI DOLOREM IPSUM",
        ),
        array(
            'id' => "section_skill_banner_subtitle",
            'type' => 'text',
            'title' => __('Section Skill Banner SubTitle', 'resumi'),
            'default' => "qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...",
        ),
    )
);

$sections[] = array(
    'title' => __('Experience Section', 'resumi'),
    'icon_class' => 'icon-large',
    'icon' => 'el-icon-fork',
    'fields' => array(
        array(
            'id' => 'section_experience_info',
            'type' => 'info',
            'title' => __('Create a new Experience from <a href="' . site_url() . '/wp-admin/post-new.php?post_type=experience">here</a> ', 'resumi'),
            'style' => 'warning'
        ),
        array(
            'id' => 'section_experience_display',
            'type' => 'switch',
            'title' => __('Display Section', 'resumi'),
            'default' => 1,
        ),
        array(
            'id' => 'section_experience_order',
            'type' => 'switch',
            'title'=> __("Order","resumi"),
            'description' => __('Display Experiences in Descending Order', 'resumi'),
            'default' => 1,
        ),
        array(
            'id' => 'section_experience_display_menu',
            'type' => 'switch',
            'title' => __('Display In Menubar', 'resumi'),
            'default' => 1,
        ),
        array(
            'id' => 'section_experience_menu_text',
            'type' => 'text',
            'title' => __('Section Title in Menubar', 'resumi'),
            'default' => "EXPERIENCE",
            'required' => array('section_experience_display_menu', '=', '1')
        ),
        array(
            'id' => "section_experience_title",
            'type' => 'text',
            'title' => __('Section Title', 'resumi'),
            'default' => "EXPERIENCE",
        ),
        array(
            'id' => "section_experience_subtitle",
            'type' => 'text',
            'title' => __('Section Subtitle', 'resumi'),
            'default' => "PREVIOUS ASSOCIATIONS THAT HELPED TO GATHER EXPERIENCE",
        ),
        array(
            'id' => 'section_experience_number',
            'type' => 'text',
            'title' => __('How many posts to display?', 'resumi'),
            'default' => "4",
        ),

        array(
            'id' => 'section_experience_counter_display',
            'type' => 'switch',
            'title' => __('Display Counters', 'resumi'),
            'default' => 1,
        ),
        array(
            'id' => 'section_experience_counter_bg',
            'type' => 'media',
            'title' => __('Counter Background', 'resumi'),
            'default' => array("url" => get_template_directory_uri() . "/img/experience-bg.jpg"),
            'preview' => true,
            "url" => true,
            'required' => array('section_experience_counter_display', '=', '1')

        ),
        array(
            'id' => 'section_experience_counters',
            'type' => 'multi_text',
            'title' => __('Counters with Values & Labels', 'resumi'),
            'description' => __('Add up to three counters, separate value & label by a comma, ex: 12, Years Experience', 'resumi'),
            'required' => array('section_experience_counter_display', '=', '1')

        ),

    )
);
$sections[] = array(
    'title' => __('Education Section', 'resumi'),
    'icon_class' => 'icon-large',
    'icon' => 'el-icon-book',
    'fields' => array(
        array(
            'id' => 'section_education_info',
            'type' => 'info',
            'title' => __('Add a new education from <a href="' . site_url() . '/wp-admin/post-new.php?post_type=education">here</a> ', 'resumi'),
            'style' => 'warning'
        ),
        array(
            'id' => 'section_education_display',
            'type' => 'switch',
            'title' => __('Display Section', 'resumi'),
            'default' => 1,
        ),
        array(
            'id' => 'section_education_order',
            'type' => 'switch',
            'title'=> __("Order","resumi"),
            'description' => __('Display Education Posts in Descending Order', 'resumi'),
            'default' => 1,
        ),
        array(
            'id' => 'section_education_display_menu',
            'type' => 'switch',
            'title' => __('Display In Menubar', 'resumi'),
            'default' => 1,
        ),
        array(
            'id' => 'section_education_menu_text',
            'type' => 'text',
            'title' => __('Section Title in Menubar', 'resumi'),
            'default' => "EDUCATION",
            'required' => array('section_education_display_menu', '=', '1')
        ),
        array(
            'id' => "section_education_title",
            'type' => 'text',
            'title' => __('Section Title', 'resumi'),
            'default' => "EDUCATION",
        ),
        array(
            'id' => "section_education_subtitle",
            'type' => 'text',
            'title' => __('Section Subtitle', 'resumi'),
            'default' => "PREVIOUS ASSOCIATIONS THAT HELPED TO GATHER EXPERIENCE",
        ),
        array(
            'id' => 'section_education_number',
            'type' => 'text',
            'title' => __('How many posts to display?', 'resumi'),
            'default' => "4",
        ),

    )
);
$sections[] = array(
    'title' => __('Portfolio Section', 'resumi'),
    'icon_class' => 'icon-large',
    'icon' => 'el-icon-th',
    'fields' => array(
        array(
            'id' => 'section_portfolio_display',
            'type' => 'switch',
            'title' => __('Display Section', 'resumi'),
            'default' => 1,
        ),
        array(
            'id' => 'section_portfolio_display_menu',
            'type' => 'switch',
            'title' => __('Display In Menubar', 'resumi'),
            'default' => 1,
        ),
        array(
            'id' => 'section_portfolio_display_standard',
            'type' => 'switch',
            'title' => __('Display Standard Portfolio', 'resumi'),
            'default' => 1,
            'description' => 'Turn off to enable Essential Grid based portfolio',
            'required' => array('section_portfolio_display', '=', '1')

        ),
        array(
            'id' => 'section_portfolio_menu_text',
            'type' => 'text',
            'title' => __('Section Title in Menubar', 'resumi'),
            'default' => "PORTFOLIO",
            'required' => array('section_portfolio_display_menu', '=', '1')
        ),
        array(
            'id' => "section_portfolio_title",
            'type' => 'text',
            'title' => __('Section Title', 'resumi'),
            'default' => "PORTFOLIO",
            'required' => array('section_portfolio_display', '=', '1')

        ),
        array(
            'id' => "section_portfolio_subtitle",
            'type' => 'text',
            'title' => __('Section Subtitle', 'resumi'),
            'default' => "PREVIOUS ASSOCIATIONS THAT HELPED TO GATHER EXPERIENCE",
            'required' => array('section_portfolio_display', '=', '1')

        ),
        array(
            'id' => 'section_portfolio_gallery',
            'type' => 'select',
            'title' => __('Select Portfolio', 'resumi'),
            'desc' => __('Or create one from <a href="' . site_url() . '/wp-admin/post-new.php?post_type=portfolio">here</a>', 'resumi'),
            'data' => 'post',
            'args' => array('post_type' => 'portfolio'),
            'required' => array('section_portfolio_display_standard', '=', '1')

        ),
        array(
            'id' => "section_portfolio_shortcode",
            'type' => 'text',
            'title' => __('Portfolio Essensial-grid Shortcode', 'resumi'),
            'default' => "",
            'required' => array('section_portfolio_display_standard', '=', '0')
        ),

    )
);


$sections[] = array(
    'title' => __('Testimonial Section', 'resumi'),
    'icon_class' => 'icon-large',
    'icon' => 'el-icon-certificate',
    'fields' => array(
        array(
            'id' => 'section_testimonial_display',
            'type' => 'switch',
            'title' => __('Display Section', 'resumi'),
            'default' => 1,
        ),
        array(
            'id' => 'section_testimonial_order',
            'type' => 'switch',
            'title'=> __("Order","resumi"),
            'description' => __('Display Testimonials in Descending Order', 'resumi'),
            'default' => 1,
        ),
        array(
            'id' => 'section_testimonial_display_menu',
            'type' => 'switch',
            'title' => __('Display In Menubar', 'resumi'),
            'default' => 1,
        ),
        array(
            'id' => 'section_testimonial_menu_text',
            'type' => 'text',
            'title' => __('Section Title in Menubar', 'resumi'),
            'default' => "TESTIMONIAL",
            'required' => array('section_testimonial_display_menu', '=', '1')
        ),

        array(
            'id' => "section_testimonial_title",
            'type' => 'text',
            'title' => __('Section Title', 'resumi'),
            'default' => "TESTIMONIAL",
        ),
        array(
            'id' => "section_testimonial_subtitle",
            'type' => 'text',
            'title' => __('Section Subtitle', 'resumi'),
            'default' => "PREVIOUS ASSOCIATIONS THAT HELPED TO GATHER EXPERIENCE",
        ),
        array(
            'id' => "section_testimonial_number",
            'type' => 'text',
            'title' => __('How Many Testimonials to Display', 'resumi'),
            'default' => "4",
        ),
        array(
            'id' => 'section_testimonial_clients_display',
            'type' => 'switch',
            'title' => __('Display Clients Section', 'resumi'),
            'default' => 1,
        ),
        array(
            'id' => "section_testimonial_clients",
            'type' => 'gallery',
            'title' => __('Prospective Clients', 'resumi'),
            'required' => array("section_testimonial_clients_display", "=", '1')
        ),

    )
);


$sections[] = array(
    'title' => __('Blog Section', 'resumi'),
    'icon_class' => 'icon-large',
    'icon' => 'el-icon-comment-alt',
    'fields' => array(
        array(
            'id' => 'section_blog_display',
            'type' => 'switch',
            'title' => __('Display Section', 'resumi'),
            'default' => 1,
        ),
        array(
            'id' => 'section_blog_display_menu',
            'type' => 'switch',
            'title' => __('Display In Menubar', 'resumi'),
            'default' => 1,
        ),
        array(
            'id' => 'section_blog_menu_text',
            'type' => 'text',
            'title' => __('Section Title in Menubar', 'resumi'),
            'default' => "BLOG",
            'required' => array('section_blog_display_menu', '=', '1')
        ),
        array(
            'id' => "section_blog_title",
            'type' => 'text',
            'title' => __('Section Title', 'resumi'),
            'default' => "BLOG",
        ),
        array(
            'id' => "section_blog_subtitle",
            'type' => 'text',
            'title' => __('Section Subtitle', 'resumi'),
            'default' => "PREVIOUS ASSOCIATIONS THAT HELPED TO GATHER EXPERIENCE",
        ),
        array(
            'id' => 'section_blog_number',
            'type' => 'text',
            'title' => __('How many blog posts to display?', 'resumi'),
            'default' => "4",
        ),
    )
);

$sections[] = array(
    'title' => __('Social connect Section', 'resumi'),
    'icon_class' => 'icon-large',
    'icon' => 'el-icon-share',
    'fields' => array(
        array(
            'id' => 'section_social_display',
            'type' => 'switch',
            'title' => __('Display Section', 'resumi'),
            'default' => 1,
        ),
        array(
            'id' => 'section_social_display_menu',
            'type' => 'switch',
            'title' => __('Display In Menubar', 'resumi'),
            'default' => 1,
        ),
        array(
            'id' => 'section_social_menu_text',
            'type' => 'text',
            'title' => __('Section Title in Menubar', 'resumi'),
            'default' => "CONNECT",
            'required' => array('section_social_display_menu', '=', '1')
        ),

        array(
            'id' => "section_social_title",
            'type' => 'text',
            'title' => __('Section Title', 'resumi'),
            'default' => "SOCIAL CONNECT",
        ),
        array(
            'id' => "section_social_subtitle",
            'type' => 'text',
            'title' => __('Section Subtitle', 'resumi'),
            'default' => "PREVIOUS ASSOCIATIONS THAT HELPED TO GATHER EXPERIENCE",
        ),
        array(
            'id' => 'section_social_facebook',
            'type' => 'text',
            'title' => __('Facebook', 'resumi'),
            'default' => "",
        ),
        array(
            'id' => 'section_social_linkedin',
            'type' => 'text',
            'title' => __('Linked In', 'resumi'),
            'default' => "",
        ),
        array(
            'id' => 'section_social_googleplus',
            'type' => 'text',
            'title' => __('Google Plus', 'resumi'),
            'default' => "",
        ),
        array(
            'id' => 'section_social_dribbble',
            'type' => 'text',
            'title' => __('Dribbble', 'resumi'),
            'default' => "",
        ),
        array(
            'id' => 'section_social_flickr',
            'type' => 'text',
            'title' => __('Flickr', 'resumi'),
            'default' => "",
        ),
        array(
            'id' => 'section_social_youtube',
            'type' => 'text',
            'title' => __('Youtube', 'resumi'),
            'default' => "",
        ),
        array(
            'id' => 'section_social_instagram',
            'type' => 'text',
            'title' => __('Instagram', 'resumi'),
            'default' => "",
        ),
        array(
            'id' => 'section_social_twitter',
            'type' => 'text',
            'title' => __('Twitter', 'resumi'),
            'default' => "",
        ),
        array(
            'id' => 'section_social_pinterest',
            'type' => 'text',
            'title' => __('Pinterest', 'resumi'),
            'default' => "",
        ),
        array(
            'id' => 'section_social_github',
            'type' => 'text',
            'title' => __('Github', 'resumi'),
            'default' => "",
        ),
        array(
            'id' => 'section_social_odesk',
            'type' => 'text',
            'title' => __('Odesk', 'resumi'),
            'default' => "",
        ),
        array(
            'id' => 'section_social_freelancer',
            'type' => 'text',
            'title' => __('Freelancer', 'resumi'),
            'default' => "",
        ),array(
            'id' => 'section_social_envato',
            'type' => 'text',
            'title' => __('Envato', 'resumi'),
            'default' => "",
        ),
        array(
            'id' => 'section_social_email',
            'type' => 'text',
            'title' => __('Email', 'resumi'),
            'default' => "",
        ),

    )
);

$sections[] = array(
    'title' => __('Contact Section', 'resumi'),
    'icon_class' => 'icon-large',
    'icon' => 'el-icon-phone-alt',
    'fields' => array(
        array(
            'id' => 'section_contact_display',
            'type' => 'switch',
            'title' => __('Display Section', 'resumi'),
            'default' => 1,
        ),
        array(
            'id' => 'section_map_display',
            'type' => 'switch',
            'title' => __('Display Map', 'resumi'),
            'default' => 1,
        ),
        array(
            'id' => 'section_contact_display_menu',
            'type' => 'switch',
            'title' => __('Display In Menubar', 'resumi'),
            'default' => 1,
        ),
        array(
            'id' => 'section_contact_menu_text',
            'type' => 'text',
            'title' => __('Section Title in Menubar', 'resumi'),
            'default' => "CONTACT",
            'required' => array('section_contact_display_menu', '=', '1')
        ),

        array(
            'id' => "section_contact_title",
            'type' => 'text',
            'title' => __('Section Title', 'resumi'),
            'default' => "CONTACT",
        ),
        array(
            'id' => "section_contact_subtitle",
            'type' => 'text',
            'title' => __('Section Subtitle', 'resumi'),
            'default' => "PREVIOUS ASSOCIATIONS THAT HELPED TO GATHER EXPERIENCE",
        ),
        array(
            'id' => 'section_contact_key',
            'type' => 'text',
            'title' => __('Google Maps Key', 'resumi'),
            'default' => "GOOGLE MAP KEY",
            'subtitle'=>"http://bit.ly/2kh7Mqc",
            'hint'=>array("content"=>"Get your google maps key from http://bit.ly/2kh7Mqc","title"=>"Get Your Key")
        ),array(
            'id' => 'section_contact_lat',
            'type' => 'text',
            'title' => __('Latitude', 'resumi'),
            'default' => "-37.817314",
        ),
        array(
            'id' => 'section_contact_lon',
            'type' => 'text',
            'title' => __('Longitude', 'resumi'),
            'default' => "144.955431",
        ),
        array(
            'id' => 'section_contact_description',
            'type' => 'editor',
            'title' => __('Marker Details', 'resumi'),
        ),
        array(
            'id' => 'section_contact_receiver',
            'type' => 'text',
            'title' => __('Contact Email Receiver', 'resumi'),
        ),
        array(
            'id' => 'section_contact_message',
            'type' => 'text',
            'title' => __('Contact Successful Message', 'resumi'),
            'default'=>"Thank you for contacting us"
        ),
        array(
            'id' => 'section_contact_shortcode',
            'type' => 'text',
            'title' => __('Contact Form 7 Shortcode', 'resumi'),
            'desc' => __('Create one from <a href="' . site_url() . '/wp-admin/admin.php?page=wpcf7-new">here</a>', 'resumi'),
        )
    )
);


$sections[] = array(
    'title' => __('Footer Section', 'resumi'),
    'icon_class' => 'icon-large',
    'icon' => 'el-icon-edit',
    'fields' => array(
        array(
            'id' => 'section_footer_primary_display',
            'type' => 'switch',
            'title' => __('Display Primary Footer', 'resumi'),
            'default' => 1,
        ),
        array(
            'id' => 'section_footer_secondary_display',
            'type' => 'switch',
            'title' => __('Display Secondary Footer', 'resumi'),
            'default' => 1,
        ),
        array(
            'id' => 'section_footer_signature',
            'type' => 'media',
            'title' => __('Footer Left Image', 'resumi'),
            'default' => array("url" => get_template_directory_uri() . "/img/sign.jpg"),
            'preview' => true,
            "url" => true,
            'required' => array('section_footer_primary_display', '=', '1')
        ),
        array(
            'id' => 'section_footer_left_text',
            'type' => 'editor',
            'title' => __('Footer Left Text', 'resumi'),
            'default' => 'PO Box 16122 Collins Street West
Victoria 8007 Australia

Email : anthony.jones@gmail.com

Phone : +123 456 789 111

Website : www.anthonyjones.com',
            'required' => array('section_footer_primary_display', '=', '1')
        ),
        array(
            'id' => 'section_footer_flickr',
            'type' => 'text',
            'title' => __('Flickr Username to display latest gallery', 'resumi'),
            'default' => '52617155@N08',
            'required' => array('section_footer_primary_display', '=', '1')
        ),
        array(
            'id' => 'section_footer_flickr_limit',
            'type' => 'text',
            'title' => __('Number of Photos To Display', 'resumi'),
            'default' => '15',
            'required' => array('section_footer_primary_display', '=', '1')
        ),
        array(
            'id' => 'section_footer_bottom',
            'type' => 'text',
            'title' => __('Footer bottom text', 'resumi'),
            'default' => '© 2014 Resumi. All Rights Reserved.',
            'required' => array('section_footer_secondary_display', '=', '1')
        ),
    )
);

$sections[] = array(
    'icon' => 'el-icon-cogs',
    'icon_class' => 'icon-large',
    'title' => __('404 Settings', 'resumi'),
    'fields' => array(
        array(
            'id'=>'settings_404_heading',
            'type' => 'text',
            'title' => __('404  Title', 'resumi'),
            'default'=>'Whoops'
        ),
        array(
            'id'=>'settings_404_subheading',
            'type' => 'text',
            'title' => __('404 Sub Title', 'resumi'),
            'default'=>'BAD TRIP, MAN!'
        ),
        array(
            'id'=>'settings_404_text',
            'type' => 'text',
            'title' => __('404 Text', 'resumi'),
            'default'=>'The page you are looking for doesn’t exit.'
        ),
    )
);

global $ReduxFramework;
$ReduxFramework = new ReduxFramework($sections, $args, $tabs);







