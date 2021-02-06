<?php
    add_theme_support('menus');
    add_theme_support('widgets');
    add_theme_support('custom-header');
    add_theme_support('custom-background');
    add_theme_support('post-thumbnails');
    add_theme_support('post-formats', ['audio','video']);
    add_theme_support('custom-logo');

    //Sidebar Registration
    register_sidebar([
        'name' => 'Custom Sidebar',
        'id'   => 'custom_sidebar',
        'description' => 'This is custom sidebar' 

    ]);
    register_sidebar([
        'name' => 'Register Sidebar',
        'id'   => 'register_sidebar',
        'description' => 'This is register sidebar'
    ]);

    register_nav_menus([
        'first_menu' => 'First Menu',
        'second_menu' => 'Second Menu'
    ]);
?>