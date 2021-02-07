<?php
    // will add appearance-> Menu 
    add_theme_support('menus');
    //will add appearance -> widgets 
    add_theme_support('widgets');
    //will add appearance -> Header
    add_theme_support('custom-header');
    //will add appearance -> Background; which will create theme customize option
    add_theme_support('custom-background');
    //will add post -> add new; which will create featured image 
    add_theme_support('post-thumbnails');
    //will add post -> add new; which will create Post Format
    add_theme_support('post-formats', ['audio','video']);
    //will add customize -> header -> Logo; which will add the logo
    add_theme_support('custom-logo');

    //widgets control panel
    register_sidebar([
        'name' => 'Custom Sidebar',
        'id'   => 'custom_sidebar',
        'description' => 'This is custom sidebar' 

    ]);
    //widgets control panel
    register_sidebar([
        'name' => 'Register Sidebar',
        'id'   => 'register_sidebar',
        'description' => 'This is register sidebar'
    ]);
    //create menus display location which will select as like as Primary menu, footer menu etc.
    register_nav_menus([
        'first_menu' => 'First Menu',
        'second_menu' => 'Second Menu'
    ]);
?>