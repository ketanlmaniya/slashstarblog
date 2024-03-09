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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'slashstar_db' );

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
define( 'AUTH_KEY',         'X5pz$>:d&IoI%t|gwakkQ7K6a;tQ?S/1HsA)gK}7Zo1zTYCLHjst81Br)gnU$`]=' );
define( 'SECURE_AUTH_KEY',  '|vG/olHchg<4=8S,|G|t?M{R0oByd)IM2b<u&Mf- ?wPTKNN<{I`Tqbg1NQK./Af' );
define( 'LOGGED_IN_KEY',    '/}OiCDrsn^}h47)zqaKT@)Z,-*OO|(w~1#dQqPcBQY=Tu`@WECot0IBnc#M2z`R4' );
define( 'NONCE_KEY',        'Cm&&s=|OS9@IuF1a(6H`+xY[n&k_g)/djEDh%QnYvb7/VS5LBy&7[}y8/1mJOmc&' );
define( 'AUTH_SALT',        'LXxzD(.g*@MUX^Mf[AOAjExu$oWemWC95g3Lw3aA85UzHqIEb{@cKK%:4]%/$ID6' );
define( 'SECURE_AUTH_SALT', '|twk,rQZMS/qe^u*2u@fi)ix!g8XyrHjdM1=U% I^d!SBcx;vR@f7FAtrqQho~UO' );
define( 'LOGGED_IN_SALT',   'k:-$ZF{+w~HITp{C_tH)c?G+rH U_MBw C{kL/d|w59Js<IsMWEJ6vb<}nyX,fVI' );
define( 'NONCE_SALT',       'km<mdKZ;I;]Z^h3(#lw2PS}Egw876K2!qM0[<giirgNTTCo..)$@MhJu-!T^)bvw' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
