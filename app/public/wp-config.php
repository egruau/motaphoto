<?php

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}


define('AUTH_KEY',         'yXxwKRoX9f4S3INqKkRuGVA6HPMTv1++HpS/v5t9K0KZ5ze7FiFIxBl2MaCWuFl3/KqYUklu21FxUhbRQ+/8lQ==');
define('SECURE_AUTH_KEY',  'sccM6lsqiFSVSdS6+Rfv1gPe5SvUGVIGlJL0ZLDpbg5jFcK9+XEo28JTW9myCnGy2JkZ+dGHCCB7I4ah0e4iog==');
define('LOGGED_IN_KEY',    'g26gkRw++xcLaKjrlkTSY4qAx0LEd47Z/Uq7O0bHAwF5RvwzUAG+y2ESScWXVPFfztCBj8lieh5Im9pVcVJC8g==');
define('NONCE_KEY',        'jL5CSpR/ShsG/bpmJfannX2K/wNWvE4WvIgbWjfpHBakj0RnegjW78jA4koXmZERhOt4/AtwFVx1VCjnkiiWuw==');
define('AUTH_SALT',        'wDyz0XhFcK/ouQYbwLotcU8dgELDXPvxVy4WttpO+QeSbdS6EMyZWEeJJknewd7G3DYIS2Ir+K2P94xL1DH7VQ==');
define('SECURE_AUTH_SALT', 'ivQbIcOYuOTbSoUmQc4N8Un3kDMsJ67qbT4RrmB88qZqi7ZIZhs/lI5U6Q7iYY85LyhD0yhs5UEDwY4WqozInw==');
define('LOGGED_IN_SALT',   'bO5i+dsx9A6iOCOOjGh+jQlOxYikAD07XmsQGPRsgl9vLoKrxqx4avpU3xZVr6fOsv0I4Ywe78pB2mjmfDNn8g==');
define('NONCE_SALT',       'qJ2Rll54z/5YqylUawFvMMZLlq7WBdCeVZCyDABsGPPcTyCUKK2QBgV6zZHQKCrSOsmR62c6sja6XvG3JdiwsQ==');
define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
