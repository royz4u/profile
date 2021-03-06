<?php
if (function_exists('load_plugin_textdomain')) {
    load_plugin_textdomain('header-footer', false, 'header-footer/languages');
}

$dismissed = get_option('hefo_dismissed', array());

if (isset($_REQUEST['dismiss']) && check_admin_referer()) {
    $dismissed[$_REQUEST['dismiss']] = 1;
    update_option('hefo_dismissed', $dismissed);
    wp_redirect('?page=header-footer%2Foptions.php');
    exit();
}

function hefo_request($name, $default = null) {
    if (!isset($_REQUEST[$name]))
        return $default;
    return stripslashes_deep($_REQUEST[$name]);
}

function hefo_field_checkbox($name, $label = '', $tips = '', $attrs = '') {
    global $options;
    echo '<th scope="row">';
    echo '<label for="options[' . $name . ']">' . $label . '</label></th>';
    echo '<td><input type="checkbox" ' . $attrs . ' name="options[' . $name . ']" value="1" ' .
    (isset($options[$name]) ? 'checked' : '') . '/>';
    echo ' ' . $tips;
    echo '</td>';
}

function hefo_base_checkbox($name, $label = '') {
    global $options;
    echo '<label>';
    echo '<input type="checkbox" name="options[' . $name . ']" value="1" ' .
    (isset($options[$name]) ? 'checked' : '') . '>';
    echo $label;
    echo '</label>';
}

function hefo_field_checkbox_only($name, $tips = '', $attrs = '', $link = null) {
    global $options;
    echo '<td><input type="checkbox" ' . $attrs . ' name="options[' . $name . ']" value="1" ' .
    (isset($options[$name]) ? 'checked' : '') . '/>';
    echo ' ' . $tips;
    if ($link) {
        echo '<br><a href="' . $link . '" target="_blank">Read more</a>.';
    }
    echo '</td>';
}

function hefo_field_text($name, $label = '', $tips = '', $attrs = '') {
    global $options;

    if (!isset($options[$name]))
        $options[$name] = '';

    echo '<th scope="row">';
    echo '<label for="options[' . $name . ']">' . $label . '</label></th>';
    echo '<td><input type="text" name="options[' . $name . ']" value="' .
    htmlspecialchars($options[$name]) . '" size="50"/>';
    echo '<br /> ' . $tips;
    echo '</td>';
}

function hefo_base_text($name) {
    global $options;

    if (!isset($options[$name])) {
        $options[$name] = '';
    }

    echo '<input type="text" name="options[' . $name . ']" value="' .
    esc_attr($options[$name]) . '" size="30">';
}

function hefo_field_textarea($name, $label = '', $tips = '', $attrs = '') {
    global $options;

    if (!isset($options[$name]))
        $options[$name] = '';

    if (is_array($options[$name]))
        $options[$name] = implode("\n", $options[$name]);

    if (strpos($attrs, 'cols') === false)
        $attrs .= 'cols="70"';
    if (strpos($attrs, 'rows') === false)
        $attrs .= 'rows="5"';

    echo '<th scope="row">';
    echo '<label for="options[' . $name . ']">' . $label . '</label></th>';
    echo '<td><textarea style="width: 100%; height: 100px" wrap="off" name="options[' . $name . ']">' .
    htmlspecialchars($options[$name]) . '</textarea>';
    echo '<p class="description">' . $tips . '</p>';
    echo '</td>';
}

function hefo_field_textarea_cm($name, $label = '', $tips = '', $attrs = '') {
    global $options;

    if (!isset($options[$name]))
        $options[$name] = '';

    if (is_array($options[$name]))
        $options[$name] = implode("\n", $options[$name]);

    if (strpos($attrs, 'cols') === false)
        $attrs .= 'cols="70"';
    if (strpos($attrs, 'rows') === false)
        $attrs .= 'rows="5"';

    echo '<th scope="row">';
    echo '<label for="options[' . $name . ']">' . $label . '</label></th>';
    echo '<td><textarea style="width: 100%; height: 100px" wrap="off" name="options[' . $name . ']" onfocus="hefo_cm_on(this)" onblur="hefo_cm_off(this)">' .
    htmlspecialchars($options[$name]) . '</textarea>';
    echo '<p class="description">' . $tips . '</p>';
    echo '</td>';
}

function hefo_base_textarea_cm($name, $type = '', $tips = '') {
    global $options;

    if (!empty($type))
        $type = '-' . $type;
    if (!isset($options[$name]))
        $options[$name] = '';

    if (is_array($options[$name]))
        $options[$name] = implode("\n", $options[$name]);

    echo '<textarea class="hefo-cm' . $type . '" name="options[' . $name . ']" onfocus="hefo_cm_on(this)">';
    echo htmlspecialchars($options[$name]);
    echo '</textarea>';
    echo '<p class="description">' . $tips . '</p>';
}

function hefo_field_textarea_enable($name, $label = '', $tips = '', $attrs = '') {
    global $options;

    if (!isset($options[$name]))
        $options[$name] = '';

    if (is_array($options[$name]))
        $options[$name] = implode("\n", $options[$name]);

    if (strpos($attrs, 'cols') === false)
        $attrs .= 'cols="70"';
    if (strpos($attrs, 'rows') === false)
        $attrs .= 'rows="5"';

    echo '<th scope="row">';
    echo '<label for="options[' . $name . ']">' . $label . '</label></th>';
    echo '<td>';
    echo '<input type="checkbox" ' . $attrs . ' name="options[' . $name . '_enabled]" value="1" ' .
    (isset($options[$name . '_enabled']) ? 'checked' : '') . '> Enable<br>';
    echo '<textarea style="width: 100%; height: 100px" wrap="off" name="options[' . $name . ']">' .
    htmlspecialchars($options[$name]) . '</textarea>';
    echo '<p class="description">' . $tips . '</p>';
    echo '</td>';
}

function hefo_rule($number) {
    global $options;
    if (!isset($options['inner_pos_' . $number]))
        $options['inner_pos_' . $number] = 'after';
    if (!isset($options['inner_skip_' . $number]))
        $options['inner_skip_' . $number] = 0;
    if (!isset($options['inner_tag_' . $number]))
        $options['inner_tag_' . $number] = '';

    echo '<div class="rules">';
    echo '<div style="float: left">Inject</div>';
    echo '<select style="float: left" name="options[inner_pos_' . $number . ']">';
    echo '<option value="after"';
    echo $options['inner_pos_' . $number] == 'after' ? ' selected' : '';
    echo '>after</option>';
    echo '<option value="before"';
    echo $options['inner_pos_' . $number] == 'before' ? ' selected' : '';
    echo '>before</option>';
    echo '</select>';
    echo '<input style="float: left" type="text" placeholder="marker" name="options[inner_tag_' . $number . ']" value="';
    echo esc_attr($options['inner_tag_' . $number]);
    echo '">';
    echo '<div style="float: left">skipping</div>';
    echo '<input style="float: left" type="text" size="5" name="options[inner_skip_' . $number . ']" value="';
    echo esc_attr($options['inner_skip_' . $number]);
    echo '">';
    echo '<div style="float: left">chars, on failure inject</div>';
    echo '<select style="float: left" name="options[inner_alt_' . $number . ']">';
    echo '<option value=""';
    echo $options['inner_alt_' . $number] == 'after' ? ' selected' : '';
    echo '>nowhere</option>';
    echo '<option value="after"';
    echo $options['inner_alt_' . $number] == 'after' ? ' selected' : '';
    echo '>after the content</option>';
    echo '<option value="before"';
    echo $options['inner_alt_' . $number] == 'before' ? ' selected' : '';
    echo '>before the content</option>';
    echo '</select>';
    echo '<div class="clearfix"></div></div>';
}

if (isset($_POST['save'])) {
    if (!wp_verify_nonce($_POST['_wpnonce'], 'save'))
        die('Page expired');
    $options = hefo_request('options');
    if (empty($options['mobile_user_agents'])) {
        $options['mobile_user_agents'] = "phone\niphone\nipod\nandroid.+mobile\nxoom";
    }
    $agents1 = explode("\n", $options['mobile_user_agents']);
    $agents2 = array();
    foreach ($agents1 as &$agent) {
        $agent = trim($agent);
        if (empty($agent))
            continue;
        $agents2[] = strtolower($agent);
    }
    $options['mobile_user_agents_parsed'] = implode('|', $agents2);

    update_option('hefo', $options);
}

else {
    $options = get_option('hefo');
}
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.20.2/codemirror.css" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.20.2/addon/hint/show-hint.css">
<style>
    .CodeMirror {
        border: 1px solid #ddd;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.20.2/codemirror.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.20.2/mode/xml/xml.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.20.2/mode/javascript/javascript.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.20.2/mode/css/css.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.20.2/mode/htmlmixed/htmlmixed.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.20.2/mode/clike/clike.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.20.2/mode/php/php.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.20.2/addon/hint/show-hint.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.20.2/addon/hint/css-hint.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.20.2/addon/hint/xml-hint.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.20.2/addon/hint/html-hint.js"></script>

<script>
    var templateEditor;
    jQuery(document).ready(function () {
        jQuery("textarea.hefo-cm").each(function () {
            var cmOptions = {
                lineNumbers: true,
                mode: "php",
                extraKeys: {"Ctrl-Space": "autocomplete"}
            }
            CodeMirror.fromTextArea(this, cmOptions);
        });
        jQuery("textarea.hefo-cm-css").each(function () {
            var cmOptions = {
                lineNumbers: true,
                mode: "css",
                extraKeys: {"Ctrl-Space": "autocomplete"}
            }
            CodeMirror.fromTextArea(this, cmOptions);
        });
    });
</script>  

<script>
    var hefo_cm;

    var hefo_tabs;
    jQuery(document).ready(function () {

        jQuery('#upload-image').click(function () {
            tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
            return false;
        });

        window.send_to_editor = function (html) {
            var imgurl = jQuery('img', html).attr('src');
            jQuery('#og_image_default').val(imgurl);
            tb_remove();
            jQuery("#tabs").tabs();
        }

        jQuery("#tab-container").easytabs();
    });
</script>
<div class="wrap">
    <!--https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=5PHGDGNHAYLJ8-->

    <h2>Head, Footer and Post Injections</h2>

    <?php if (!isset($dismissed['rate'])) { ?>
        <div class="notice notice-success"><p>
                I never asked before and I'm curious: <a href="http://wordpress.org/extend/plugins/header-footer/" target="_blank"><strong>would you rate this plugin</strong></a>?
                (takes only few seconds required - account on WordPress.org, every blog owner should have one...). <strong>Really appreciated, Stefano</strong>.
                <a class="hefo-dismiss" href="<?php echo wp_nonce_url($_SERVER['REQUEST_URI'] . '&dismiss=rate&noheader=1') ?>">&times;</a>
            </p>   
        </div>
    <?php } ?>

    <?php if (!isset($dismissed['newsletter'])) { ?>
        <div class="notice notice-success"><p>
                If you want to be informed of important updated of this plugin, you may want to subscribe to my (rare) newsletter<br>
            <form action="http://www.satollo.net/?na=s" target="_blank" method="post">
                <input type="hidden" value="header-footer" name="nr">
                <input type="hidden" value="2" name="nl[]">
                <input type="email" name="ne" value="<?php echo esc_attr(get_option('admin_email')) ?>">
                <input type="submit" value="Subscribe">
            </form>
            <a class="hefo-dismiss" href="<?php echo wp_nonce_url($_SERVER['REQUEST_URI'] . '&dismiss=newsletter&noheader=1') ?>">&times;</a>
            </p>   
        </div>
    <?php } ?>      

    <div style="padding: 15px; background-color: #fff; border: 1px solid #eee; font-size: 16px; line-height: 22px">
        Did this plugin save you lot of time and troubles?    
        <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=5PHGDGNHAYLJ8" target="_blank"><img style="vertical-align: bottom" src="<?php echo plugins_url('header-footer') ?>/images/donate.png"></a>
        To help children. Even <b>2$</b> help. <a href="http://www.satollo.net/donations" target="_blank">Please read more</a>. Thank you.
        <br>
        Are you profitably using this free plugin for your customers? One more reason to consider a 
        <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=5PHGDGNHAYLJ8" target="_blank">donation</a>. Thank you.
    </div>

    <p>
        Other useful plugins:
        <a href="http://www.satollo.net/plugins/hyper-cache?utm_source=header-footer&utm_medium=banner&utm_campaign=hyper-cache" target="_blank">Hyper Cache</a>,
        <a href="http://www.satollo.net/plugins/include-me?utm_source=header-footer&utm_medium=banner&utm_campaign=include-me" target="_blank">Include Me</a>,
        <a href="http://www.thenewsletterplugin.com/?utm_source=header-footer&utm_medium=banner&utm_campaign=newsletter" target="_blank">Newsletter</a>,
        <a href="http://www.satollo.net/plugins/php-text-widget?utm_source=header-footer&utm_medium=link&utm_campaign=php-text-widget" target="_blank">PHP Text Widget</a>,
        <a href="http://www.satollo.net/plugins/ads-bbpress?utm_source=header-footer&utm_medium=link&utm_campaign=ads-bbpress" target="_blank">Ads for bbPress</a>.
    </p>

    <p>
        <?php
        if (apply_filters('hefo_php_exec', true)) {
            _e('PHP is allowed in your code.');
        } else {
            _e('PHP is NOT allowed in your code (disabled by your theme or a plugin)');
        }
        ?>
    </p>

    <form method="post" action="">
        <?php wp_nonce_field('save') ?>

        <div id="tab-container" class="tab-container">
            <ul class="etabs">
                <li class='tab'><a href="#tabs-first"><?php _e('Head and footer', 'header-footer'); ?></a></li>
                <li class='tab'><a href="#tabs-post"><?php _e('Posts', 'header-footer'); ?></a></li>
                <li class='tab'><a href="#tabs-post-inner"><?php _e('Inside posts', 'header-footer'); ?></a></li>
                <li class='tab'><a href="#tabs-page"><?php _e('Pages', 'header-footer'); ?></a></li>
                <li class='tab'><a href="#tabs-5"><?php _e('Snippets', 'header-footer'); ?></a></li>
                <li class='tab'><a href="#tabs-amp"><?php _e('AMP', 'header-footer'); ?></a></li>
                <li class='tab'><a href="#tabs-generics"><?php _e('Generics', 'header-footer'); ?></a></li>
                <li class='tab'><a href="#tabs-8"><?php _e('Advanced', 'header-footer'); ?></a></li>
                <li class='tab'><a href="#tabs-7"><?php _e('Notes and...', 'header-footer'); ?></a></li>
                <li class='tab'><a href="#tabs-thankyou"><?php _e('Thank you', 'header-footer'); ?></a></li>
            </ul>

            <div class="panel-container">

                <div id="tabs-first">

                    <h3><?php esc_html_e('<HEAD> page section injection', 'header-footer')?></h3>
                    <div class="row">

                        <div class="col-2">
                            <label><?php esc_html_e('On every page', 'header-footer')?></label>
                            <?php hefo_base_textarea_cm('head'); ?>
                        </div>
                        <div class="col-2">
                            <label><?php esc_html_e('Only on the home page', 'header-footer')?></label>
                            <?php hefo_base_textarea_cm('head_home'); ?>
                        </div>
                    </div>

                    <h3><?php esc_html_e('After the <BODY> tag', 'header-footer')?></h3>
                    <div class="row">

                        <div class="col-2">
                            <label><?php _e('Desktop', 'header-footer') ?>*</label>
                            <?php hefo_base_textarea_cm('body'); ?>
                        </div>
                        <div class="col-2">
                            <?php hefo_base_checkbox('mobile_body_enabled', __('Mobile', 'header-footer')); ?>
                            <?php hefo_base_textarea_cm('mobile_body'); ?>
                        </div>

                    </div>
                    <h3><?php esc_html_e('Before the &lt;/BODY&gt; closing tag (footer)', 'header-footer')?></h3>
                    <div class="row">
                        <div class="col-2">
                            <label><?php _e('Desktop', 'header-footer') ?>*</label>
                            <?php hefo_base_textarea_cm('footer'); ?>
                        </div>
                        <div class="col-2">
                            <?php hefo_base_checkbox('mobile_footer_enabled', __('Mobile', 'header-footer')); ?>
                            <?php hefo_base_textarea_cm('mobile_footer'); ?>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                </div>

                <div id="tabs-generics">

                    <?php for ($i = 1; $i <= 5; $i++) { ?>
                        <h3>Generic injection <?php echo $i; ?></h3>
                        <p>Inject before the <?php hefo_base_text('generic_tag_' . $i); ?> marker</p>
                        <div class="row">
                            <div class="col-2">
                                <label><?php _e('Desktop', 'header-footer') ?>*</label>
                                <?php hefo_base_textarea_cm('generic_' . $i); ?>
                            </div>
                            <div class="col-2">
                                <?php hefo_base_checkbox('mobile_generic_enabled_' . $i, __('Mobile', 'header-footer')); ?>
                                <?php hefo_base_textarea_cm('mobile_generic_' . $i); ?>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    <?php } ?>
                    <div class="clearfix"></div>
                </div>



                <div id="tabs-post">
                    <p>
                        Please take the time to <a href="http://www.satollo.net/plugins/header-footer" target="_blank">read this page</a> to understand how the "mobile" configuration works.
                        See the "advanced tab" to configure the mobile device detection.
                    </p>

                    <h3><?php esc_html_e('Before the post content', 'header-footer'); ?></h3>
                    <div class="row">

                        <div class="col-2">
                            <label><?php _e('Desktop', 'header-footer') ?>*</label>
                            <?php hefo_base_textarea_cm('before'); ?>
                        </div>
                        <div class="col-2">
                            <?php hefo_base_checkbox('mobile_before_enabled', __('Mobile', 'header-footer')); ?>
                            <?php hefo_base_textarea_cm('mobile_before'); ?>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <h3><?php esc_html_e('After the post content', 'header-footer'); ?></h3>
                    <div class="row">

                        <div class="col-2">
                            <label><?php _e('Desktop', 'header-footer') ?>*</label>
                            <?php hefo_base_textarea_cm('after'); ?>
                        </div>
                        <div class="col-2">
                            <?php hefo_base_checkbox('mobile_after_enabled', __('Mobile', 'header-footer')); ?>
                            <?php hefo_base_textarea_cm('mobile_after'); ?>
                        </div>
                    </div>

                    <!--<h3>Posts and pages</h3>-->
                    <table class="form-table">
                        <!--<tr valign="top"><?php hefo_field_checkbox('category', __('Enable injection on category pages', 'header-footer')); ?></tr>-->
                        <tr valign="top"><?php //hefo_field_textarea('before', __('Code to be inserted before each post', 'header-footer'), '', 'rows="10"');            ?></tr>
                        <tr valign="top"><?php //hefo_field_textarea('after', __('Code to be inserted after each post', 'header-footer'), '', 'rows="10"');            ?></tr>
                    </table>

                    <h3><?php _e('Injection on excerpts', 'header-footer'); ?></h3>
                    <p><?php _e('It works only on category and tag pages.', 'header-footer'); ?></p>
                    <table class="form-table">
                        <tr valign="top"><?php hefo_field_textarea('excerpt_before', __('Code to be inserted before each post excerpt', 'header-footer'), '', 'rows="10"'); ?></tr>
                        <tr valign="top"><?php hefo_field_textarea('excerpt_after', __('Code to be inserted after each post excerpt', 'header-footer'), '', 'rows="10"'); ?></tr>
                    </table>
                    <div class="clearfix"></div>
                </div>


                <div id="tabs-post-inner">

                    <?php for ($i = 1; $i <= 5; $i++) { ?>
                        <h3>Inner post injection <?php echo $i; ?></h3>
                        <?php hefo_rule($i); ?>
                        <div class="row">
                            <div class="col-2">
                                <label><?php _e('Desktop', 'header-footer') ?>*</label>
                                <?php hefo_base_textarea_cm('inner_' . $i); ?>
                            </div>
                            <div class="col-2">
                                <?php hefo_base_checkbox('mobile_inner_enabled_' . $i, __('Mobile', 'header-footer')); ?>
                                <?php hefo_base_textarea_cm('mobile_inner_' . $i); ?>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    <?php } ?>
                </div>


                <div id="tabs-page">

                    <?php hefo_base_checkbox('page_use_post', __('Use the post configurations', 'header-footer')); ?><br>
                    <?php hefo_base_checkbox('page_add_tags', __('Let pages to have tags', 'header-footer')); ?><br>
                    <?php hefo_base_checkbox('page_add_categories', __('Let pages to have categories', 'header-footer')); ?>

                    <h3><?php _e('Before the page content', 'header-footer') ?></h3>
                    <div class="row">

                        <div class="col-2">
                            <label><?php _e('Desktop', 'header-footer') ?>*</label>
                            <?php hefo_base_textarea_cm('page_before'); ?>
                        </div>
                        <div class="col-2">
                            <?php hefo_base_checkbox('mobile_page_before_enabled', __('Mobile', 'header-footer')); ?><br>
                            <?php hefo_base_textarea_cm('mobile_page_before'); ?>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <h3><?php _e('After the page content', 'header-footer') ?></h3>
                    <div class="row">

                        <div class="col-2">
                            <label><?php _e('Desktop', 'header-footer') ?>*</label>
                            <?php hefo_base_textarea_cm('page_after'); ?>
                        </div>
                        <div class="col-2">
                            <?php hefo_base_checkbox('mobile_page_after_enabled', __('Mobile', 'header-footer')); ?><br>
                            <?php hefo_base_textarea_cm('mobile_page_after'); ?>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                </div>


                <!-- AMP -->

                <div id="tabs-amp">
                    <p>
                        You need the <a href="https://it.wordpress.org/plugins/amp/" target="_blank">AMP</a> plugin. Other AMP plugins could be supported
                        in the near future.
                    </p>

                    <h3><?php esc_html_e('<HEAD> page section', 'header-footer')?></h3>
                    <div class="row">
                        <div class="col-1">
                            <?php hefo_base_textarea_cm('amp_head'); ?>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <h3><?php esc_html_e('Extra CSS', 'header-footer')?></h3>
                    <div class="row">
                        <div class="col-1">
                            <?php hefo_base_textarea_cm('amp_css', 'css'); ?>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <h3><?php esc_html_e('Before the post content', 'header-footer')?></h3>
                    <div class="row">
                        <div class="col-1">

                            <?php hefo_base_textarea_cm('amp_post_before'); ?>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <h3><?php esc_html_e('After the post content', 'header-footer')?></h3>
                    <div class="row">

                        <div class="col-1">

                            <?php hefo_base_textarea_cm('amp_post_after'); ?>

                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <h3><?php esc_html_e('Footer', 'header-footer')?></h3>
                    <div class="row">

                        <div class="col-1">

                            <?php hefo_base_textarea_cm('amp_footer'); ?>

                        </div>
                    </div>
                    <div class="clearfix"></div>

                </div>


                <div id="tabs-5">
                    <p>
                        <?php _e('Common snippets that can be used in any header or footer area referring them as [snippet_N] where N is the snippet number
            from 1 to 5. Snippets are inserted before PHP evaluation.', 'header-footer'); ?><br />
                        <?php _e('Useful for social button to be placed before and after the post or in posts and pages.', 'header-footer'); ?>
                    </p>
                    <table class="form-table">
                        <? for ($i=1; $i<=5; $i++) { ?>
                        <tr valign="top"><?php hefo_field_textarea('snippet_' . $i, __('Snippet ' . $i, 'header-footer'), '', 'rows="10"'); ?></tr>
                        <? } ?>
                    </table>
                    <div class="clearfix"></div>
                </div>

                <div id="tabs-8">
                    <table class="form-table">
                        <tr valign="top">
                            <?php
                            hefo_field_textarea('mobile_user_agents', __('Mobile user agent strings', 'header-footer'), 'For coders: a regular expression is built with those values and the resulting code will be<br>'
                                    . '<code>preg_match(\'/' . $options['mobile_user_agents_parsed'] . '/\', ...);</code><br>' .
                                    '<a href="http://www.satollo.net/plugins/header-footer" target="_blank">Read this page</a> for more.', 'rows="10"');
                            ?>

                        </tr>
                    </table>

                    <h3>Head meta links</h3>
                    <p>
                        WordPress automatically add some meta link on the head of the page, for example the RSS links, the previous and next
                        post links and so on. Here you can disable those links if not of interest.
                    </p>
                    <table class="form-table">
                        <tr valign="top">
                            <th scope="row">Disable css link id</th>
                            <?php hefo_field_checkbox_only('disable_css_id', __('Disable the id attribute on css links generated by WordPress', 'header-footer'), '', 'http://www.satollo.net/plugins/header-footer#disable_css_id'); ?>
                        </tr>
                        <tr valign="top">
                            <th scope="row">Disable css media</th>
                            <?php hefo_field_checkbox_only('disable_css_media', __('Disable the media attribute on css links generated by WordPress, id the option above is enabled.', 'header-footer'), '', 'http://www.satollo.net/plugins/header-footer#disable_css_media'); ?>
                        </tr>
                        <tr valign="top">
                            <th scope="row">Extra feed links</th>
                            <?php hefo_field_checkbox_only('disable_feed_links_extra', __('Disable extra feed links like category feeds or single post comments feeds', 'header-footer')); ?>
                        </tr>
                        <tr valign="top">
                            <th scope="row">Short link</th>
                            <?php hefo_field_checkbox_only('disable_wp_shortlink_wp_head', __('Disable the short link for posts', 'header-footer')); ?>
                        </tr>
                        <tr valign="top">
                            <th scope="row">WLW Manifest</th>
                            <?php hefo_field_checkbox_only('disable_wlwmanifest_link', __('Disable the Windows Live Writer manifest', 'header-footer')); ?>
                        </tr>
                        <tr valign="top">
                            <th scope="row">RSD link</th>
                            <?php hefo_field_checkbox_only('disable_rsd_link', __('Disable RSD link', 'header-footer')); ?>
                        </tr>
                        <tr valign="top">
                            <th scope="row">Adjacent post links</th>
                            <?php hefo_field_checkbox_only('disable_adjacent_posts_rel_link_wp_head', __('Disable adjacent post links', 'header-footer')); ?>
                        </tr>
                    </table>
                    <div class="clearfix"></div>
                </div>


                <div id="tabs-7">
                    <table class="form-table">
                        <tr valign="top"><?php hefo_field_textarea('notes', __('Notes and parked codes', 'header-footer'), '', 'rows="10"'); ?></tr>
                    </table>
                    <div class="clearfix"></div>
                </div>

                <div id="tabs-thankyou">

                    <ul>
                        <li><a href="https://plus.google.com/u/0/118278852301653300773">?????????????? ?????????? (Eugene Zhukov)</a> - Russian translation</li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>

        </div>
        <p>* if no mobile alternative is activated</p>
        <p class="submit"><input type="submit" class="button" name="save" value="<?php _e('save', 'header-footer'); ?>"></p>

    </form>
</div>


