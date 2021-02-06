<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'codexpert' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'fVnl`I*tW+f^|BjEt4Mn<Kx%?){y0--Aa_XX]/5 B}xXv>3%28GU!-36E:fHg#A0' );
define( 'SECURE_AUTH_KEY',  '1o_vG_]mVrD>n.S@nN%bRO}t/2kq]YAK)KL,>Og])v01?3eA$jpQC3S:3;5I`R^Y' );
define( 'LOGGED_IN_KEY',    'JNv`Gp=]utrIURCoHO/ s!xO9>x$?C3gSvrSMXJ$Yv$p@qw!a96GR)w=>-N9+H3a' );
define( 'NONCE_KEY',        '~@tq[;*cdau? S}W>:$gYMNr)QJUcbwB^{TdJ3AL>`!MpmJk0S*z3TZ5j(FwG5;~' );
define( 'AUTH_SALT',        'Y=Art&0WCg6D~`rqn!Izkjt@1mT_<I`/)xoNe+QyIPbh33j|lj2xilUqywX6fCt ' );
define( 'SECURE_AUTH_SALT', '4.1c}=0%9yc1*>#sNY<r<Dkid~R#JrtfoeBR[nc}4QNa2EOM_.5G>4#5t}BSrt?s' );
define( 'LOGGED_IN_SALT',   '{(F#CXldK gVZtfr`I%Zw$MvkKRoZ:oB1VyAyZ6O-C19O-G_&=uF*7@;6:N&S323' );
define( 'NONCE_SALT',       '.?`h:Usu&]qS3)d|ZD(/;]gDD[iIpd!b_;vg!Gjas:=sV#M=8u3r~iB?1oJ>Jp;M' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
