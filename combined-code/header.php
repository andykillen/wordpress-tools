<!doctype html>
<html>
    <head>
       <meta charset="UTF-8" />             
       <?php do_action("prefetch"); ?>             
       <title><?php wp_title(); ?></title>
       <link rel="stylesheet" href="<?php  bloginfo('stylesheet_url') ?>" type="text/css" media="all">       
       <?php wp_head(); ?>
    </head>
    <body class="<?php body_class(); ?>">