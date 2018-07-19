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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'bMa4e? `7xi*~1li9=uGqodBZ3b{_;_G sF^5+d!]T_&aGn[$c1FoTi#xAkS?&P=');
define('SECURE_AUTH_KEY',  'V^[f;?;jnR7i 0YwW5u/|W}6+<:!8H<>A&?5G344Exgm.@~rp,b1H[qEZ-}nm(;u');
define('LOGGED_IN_KEY',    '%PhdkKsn&j51-5Mmwqbc8$^;?EAc:hw;f[L]__Y:Z2sV#_ZIzVh$D^#T9Ul$iSRj');
define('NONCE_KEY',        'Uk8EoqOOe0:bT;+Wh;wz#cv_(Ji?xF=LI}mQ17L]5AbX>2F39[ZUV|{+d)3IkR6z');
define('AUTH_SALT',        'ALsNa(62)qu4(<4*[)Ad.dzmc|k]3qm3wtz4 W5!U/3Do>Ix|sF6+t0[82cN4!>L');
define('SECURE_AUTH_SALT', 'kb2<Ex [&DM86L|=0UUH~fpTm39-VLg?y)zbgHz^k%y)mOMmU-z;2XNiCPRIn*f<');
define('LOGGED_IN_SALT',   'ffp$}EB~vxs>q/)+ TIU6vV5yVkO2iju6{[ }H5O.WUTtxB;O&VI(hkD0;35D-%l');
define('NONCE_SALT',       'I+xn}~_]u_P5n|($hGh0M15(f4*e1>/h#oXfVIsc.6m;zsaSPnX>,E%CttF%%,hS');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
