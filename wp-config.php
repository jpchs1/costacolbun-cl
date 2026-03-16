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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wwimpo_t001cc' );

/** Database username */
define( 'DB_USER', 'wwimpo_t001cc' );

/** Database password */
define( 'DB_PASSWORD', '7)!Ejxp5S2' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'gyvtjntwip3zggqq6mu4pf9rgujixfwtpdrhaapzjnqtbjko5fgarar6kjpjsftl' );
define( 'SECURE_AUTH_KEY',  'c7xpskzzvykyhpsurxlbi1d6gguhwbm4ltkph1riry1ucejpc6bn1lswkgjmtjgu' );
define( 'LOGGED_IN_KEY',    '0xscelrfwottzxejudkvrmuwbki6lyvsyork884hoe7tksm6viv0thbdkiokthkz' );
define( 'NONCE_KEY',        'kyr74jrmst8xp1zpliw8fws0rqjxdwumvfs0n66sr1zqrbu2m4vjulbgseqsg7s3' );
define( 'AUTH_SALT',        'pdvrs21zor664acrgsl2ekwhlgmsbe5mbtg2qkee6mewromsxne6gfrwvldbew1a' );
define( 'SECURE_AUTH_SALT', 'yfqf8ynoj3af8yirjmbesuo1yxn3tctthomcdh5wekhpk49nb7gnk6jn1pugjzqz' );
define( 'LOGGED_IN_SALT',   'siytrttcr2b8rfoeg0z6npf5yx5djxnjemygvn2u9ckakhgiasyhihli5yocr6wu' );
define( 'NONCE_SALT',       'qhun4cexurtlbjtdb6ugjtol6io5mxzn1trrwkxp8nwwy6jzykavjqlkwcif4bmv' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 't1cc';

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

/* Add any custom values between this line and the "stop editing" line. */

/** Anti-spam & security hardening */
define( 'DISALLOW_FILE_EDIT', true );
define( 'DISALLOW_UNFILTERED_UPLOADS', true );
define( 'WP_POST_REVISIONS', 5 );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
