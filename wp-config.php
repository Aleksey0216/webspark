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
define( 'AUTH_KEY',         '$y0-bil,Db#c0wgZ.fEFDV@r%@eD>(gUP&4*q)6u$Z]TB6,,~1!S0Y(~b(YWUDNE' );
define( 'SECURE_AUTH_KEY',  'Sj:$|rT)X&Kg:eI|o6`%CVs{h{+`i/+_gol*ON:_>1l}l;lHOJ1@_56N[F900{[R' );
define( 'LOGGED_IN_KEY',    'sJ#1@5HFFNsk:BWO>-]r_v12Cu/[P,Bzo`a2Ry=s1H*Hf|1@,6102?a4p.Yib9)R' );
define( 'NONCE_KEY',        ')1/6?zq77|oX,2PH_RbSyp}K 3FM+P>!j!)kpB6P-FG^d>kX<+kXN#eiB7=FGY*=' );
define( 'AUTH_SALT',        'p)`rS!DLz]}{ 2s*Ikzam<g1=vl/l--:At~MOQNX*NL&fYt2m6hP[-%H~!JOSi,R' );
define( 'SECURE_AUTH_SALT', 'Kq6WDaHy4b1PCcNCL70YS-0*[#qXD0Y`:#i:S_dp]%HHIh!}6j)zGmu]vWU:)sY?' );
define( 'LOGGED_IN_SALT',   ',>$1@p1)EyjeYsG;:f#BEmPl`/V:&}]o53@K64G3o7RRKLen!dDt@w#(0!@Xg~rl' );
define( 'NONCE_SALT',       'fQR<mkl+V&A#5^a!A$$9ll?AWf4G8qcu6&fas_2bW(GFNu9+<v}hm`XSY~7{v$6%' );

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
