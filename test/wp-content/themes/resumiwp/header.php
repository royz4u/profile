<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Resumi
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); ?></title>

    <?php
    if (isset($themebucket_resumi['custom_css'])) echo $themebucket_resumi['custom_css'];
    if (isset($themebucket_resumi['custom_ga'])) echo $themebucket_resumi['custom_ga'];
    ?>

    <?php wp_head(); ?>
</head>

<body class="blog-body">
