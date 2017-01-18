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
define('DB_NAME', 'umagine');

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
define('AUTH_KEY',         'uu@_7`:I`xTn!).@5e,oW4La$iDamKeoG=` =D^),,0b1;0>@ILjfg+TKS/r}H(|');
define('SECURE_AUTH_KEY',  'A~6v~9J?Ga~I%RNcv6s0C99h!fdrT/M`ok&QRh;;XQ31!4=}<WWN[:~hUYm@<n^b');
define('LOGGED_IN_KEY',    'F>cUl`5|x(7_j(>i|q0x:YK&G{aH_~0[HI4:4l]1/2En6;TeuyJp}69$G)xnu8k!');
define('NONCE_KEY',        'ml[X1/VDC~pg3PNC+<Qo(k9 a`:h{0~9JJ.ZHQ)bf?rw6)!}9,yj!zMvQ3DFI%~m');
define('AUTH_SALT',        'UD|UZ$Z)xHI>==+FOp*2!t2{KZ]) !S1LJ8MY4wRtN, QNI8aJQ`%Br*Dv)J3BMS');
define('SECURE_AUTH_SALT', 'bgt {PCx-ij:2.<{/a? c~#>jnOLq1c-.m-~i=.&mG8VP3/.RR:)&sRdKpRrfQxN');
define('LOGGED_IN_SALT',   'a+~:]n&ven,HrG(-LK7gt#8yo(#bJrrG7&@E,$SQG%B<,=Bsax-]s4`eEPz^xXM1');
define('NONCE_SALT',       '-ih*_.VVzLwhe^6TmXOO+u=eRY1M8^>?^CpYeD`da+c_0mCFG$ll;IY$;/]7p5i<');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'um_';

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
