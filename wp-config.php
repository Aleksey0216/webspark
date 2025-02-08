<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'webspark' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'v!ZC;:`AuUm24Gw5S;WA3]vXqi2gPcxT4tYV!w3J2iu,/EkDJ>AHfXxv4mH>HtO2' );
define( 'SECURE_AUTH_KEY',  '3Na,>/V# ;F$gH|B }`zgEzdqYm/zfg++^v}V6EE~)ozw[}:$ymxx^`(Uu$Du(3x' );
define( 'LOGGED_IN_KEY',    '&dQ~,W8/~vQS9kI.oh_mHqQqw27/%yKCiXbE$i%:#mJoL^c]fIBk`Y; gFX(|K6_' );
define( 'NONCE_KEY',        '*bJl! `f9].EnT>abkpWji;bk!=M%|U5ZarL[:ASXEB>Gk1r`) OfDBxuznkA%a.' );
define( 'AUTH_SALT',        'X 67v@Du*d9F~D-}(YtsNw>^[LQq)$tH=;RE]LvZbdI ?OyEYnv3.!d-WwH VsCf' );
define( 'SECURE_AUTH_SALT', 'RiW7@0R0,-J><LT;q>bbx%v%BXE7&?@pt;6.+ .-O<5oUt=ETf07j}Ymk6_S/Loh' );
define( 'LOGGED_IN_SALT',   '>5JnC#P(yMZ7yg^pOy<kZ?+9NU8n2Tr:-.{(p?dzO]nF:E*yz;P(LryfZ ng6+d|' );
define( 'NONCE_SALT',       ' xNQ]#s,$3HE8Ar `vF3c&]x60#=Cj>o[+g0SQ!Lx=dg+M*d]0$vd]FlM2UKaFNo' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
