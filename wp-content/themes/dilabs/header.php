<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-jLKHWM7HxB3UT8EXM+ytIkG6A7Q29VztbaS5mGFm3j5Fe7z7eW3T3YmC94go+5G5" crossorigin="anonymous">
    <?php wp_head();?>
</head>
<body <?php body_class(); ?>>

<?php
    wp_body_open();

    /**
    *
    * Preloader
    *
    * Hook dilabs_preloader_wrap
    *
    * @Hooked dilabs_preloader_wrap_cb 10
    *
    */
    do_action( 'dilabs_preloader_wrap' );

    /**
    *
    * dilabs header
    *
    * Hook dilabs_header
    *
    * @Hooked dilabs_header_cb 10
    *
    */
    do_action( 'dilabs_header' );