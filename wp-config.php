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
define( 'DB_NAME', 'wp_db' );
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
define( 'AUTH_KEY',         'DYEplIU[m{+ihx>nH#*mcM=#=55Xv@:A/eA52trpKK[WXEO[[Fhj)L&k^el^$GHJ' );
define( 'SECURE_AUTH_KEY',  'f:U&k8+}_pMv_AxS6^zmpag5hzlQ/~8m6^Ny8isKV{LAUfo5ztX]>vS2`M0!ppdf' );
define( 'LOGGED_IN_KEY',    'pSK[=rf}O{8r:-D#8ctSH0 N<paQi*Tz~R4AB?PxLq yo@$^,u>`/3}}TTc:+Coa' );
define( 'NONCE_KEY',        '6f$`|,A|?RE_p`d)&M`|J)_,+*N$SA);cO|{Hn4Rp=):=`VJUtj=,c3ZAY#PcF1;' );
define( 'AUTH_SALT',        ']Gk8X]}F/=G)RlY]P>#fI8*6$op*}hVNB|jUK:6(+6{08ZmdER&Z@w@rEt<,zxF.' );
define( 'SECURE_AUTH_SALT', 'V+k.YL6=c}8zx3=Dxg{lQksS*0bPa_JC2{|!;}{Xj]/?;$?=zdiNx7QPC2B$dAZo' );
define( 'LOGGED_IN_SALT',   'JGgI.Y8pNMw4_H?B|+ E;UgP%YeB;.ZUDPv1Tkw#CsgbQ0p8Ln KG.}L)8<k({NA' );
define( 'NONCE_SALT',       '*3k>n[u(dn_*v5Ra8N`,NDCly[)Ina1dB.,~(P-x{zk*Js2}jN^f<do3Bd994q7L' );
/**#@-*/
/**
* WordPress Database Table prefix.
*
* You can have multiple installations in one database if you give each
* a unique prefix. Only numbers, letters, and underscores please!
*/
$table_prefix = 'w98p_';
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
