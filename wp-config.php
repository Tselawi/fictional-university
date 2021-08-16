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
 * This has been slightly modified (to read environment variables) for use in Docker.
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// IMPORTANT: this file needs to stay in-sync with https://github.com/WordPress/WordPress/blob/master/wp-config-sample.php
// (it gets parsed by the upstream wizard in https://github.com/WordPress/WordPress/blob/f27cb65e1ef25d11b535695a660e7282b98eb742/wp-admin/setup-config.php#L356-L392)

// a helper function to lookup "env_FILE", "env", then fallback

if (!function_exists('getenv_docker')) {
	// https://github.com/docker-library/wordpress/issues/588 (WP-CLI will load this file 2x)
	function getenv_docker($env, $default) {
		if ($fileEnv = getenv($env . '_FILE')) {
			return rtrim(file_get_contents($fileEnv), "\r\n");
		}
		else if (($val = getenv($env)) !== false) {
			return $val;
		}
		else {
			return $default;
		}
	}
}

	// sql local database settings
	// define( 'DB_NAME', 'university_data');
	// define( 'DB_USER', 'root');
	// define( 'DB_PASSWORD', 'root');
	// define( 'DB_HOST', 'mysql');

	 define( 'DB_NAME', 'xTWwtNxC4v');
	 define( 'DB_USER', 'xTWwtNxC4v');
	 define( 'DB_PASSWORD', 'UxSmCN8yFq');
	 define( 'DB_HOST', 'remotemysql.com');




/**
 * Docker image fallback values above are sourced from the official WordPress installation wizard:
 * https://github.com/WordPress/WordPress/blob/f9cc35ebad82753e9c86de322ea5c76a9001c7e2/wp-admin/setup-config.php#L216-L230
 * (However, using "example username" and "example password" in your database is strongly discouraged.  Please use strong, random credentials!)
 */

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE',  '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         getenv_docker('WORDPRESS_AUTH_KEY',         '5683c43b9f703c8244b13573d598828f08cb3b3e') );
define( 'SECURE_AUTH_KEY',  getenv_docker('WORDPRESS_SECURE_AUTH_KEY',  'fb3b42078d741709a8a18ba70a9656cb9b983dd8') );
define( 'LOGGED_IN_KEY',    getenv_docker('WORDPRESS_LOGGED_IN_KEY',    '0ff9fdf0aa727b4079297feaaf1f580fd63383ce') );
define( 'NONCE_KEY',        getenv_docker('WORDPRESS_NONCE_KEY',        'd7731aabfd33ce121d54a2d475f48825e7d59691') );
define( 'AUTH_SALT',        getenv_docker('WORDPRESS_AUTH_SALT',        'b73fa2624b7febd411de634c0b55c5458924c325') );
define( 'SECURE_AUTH_SALT', getenv_docker('WORDPRESS_SECURE_AUTH_SALT', 'ea2c22d385e1f7918a47ef81e571cc675b9f7a3b') );
define( 'LOGGED_IN_SALT',   getenv_docker('WORDPRESS_LOGGED_IN_SALT',   'dedd9f5a8143fbc3686da64ecf393082014188b4') );
define( 'NONCE_SALT',       getenv_docker('WORDPRESS_NONCE_SALT',       '2108f9e469ccf07935755055c278d4bfb6245286') );
// define('AUTH_KEY',         '_#GW`%5Zvn~Y8D}usjte>P-f@m;FP%&IWb$O@&%EfdbbN9}c-qjM!w(>+<*e>z-r');
// define('SECURE_AUTH_KEY',  'Nq$DWoBnx^.EGh`y_|w{-_*A;1=MtaJuE9fE%:*+nH.zBt:>ySm-Pqp|%+?xxFI(');
// define('LOGGED_IN_KEY',    ']PHYp}t/c>mup*?o.aI,dZhM.prLcguT:R>2Gw|@H6vO.T7)eb[BBz~.2>2[HBcX');
// define('NONCE_KEY',        'I+%b_b&2L|z]Af6>+jO^AZR4@-I(NMl)o>-8UlWv^3p:{#<~.:DxZ0I=!k).(,/_');
// define('AUTH_SALT',        '8T0)1Ipm$|PP_.2(-YZGc*U+-B*wkr@AD8~|N1?|rp4}qo-|~(%tWbjZ;gj-?}x`');
// define('SECURE_AUTH_SALT', '{NF3DcXg=pKPGnz<}&Y[2G<xD&|wKhI6Sw_n/ku`5cP_G/qBH?X>g-4vhy71Ir>1');
// define('LOGGED_IN_SALT',   'xNK<cK0j!fqUs-O>3FcM+dS!U|&t/Be;vq6O.|f0-?JZ*Qo+?K7B=H2-Ba06!p.|');
// define('NONCE_SALT',       'gdg?DP~U98nV>sq!|$cE|eYI.&o.W}k14-P:m-/uw:@DZ5Dg]JND0rZ+KI^7UC[3');
// (See also https://wordpress.stackexchange.com/a/152905/199287)

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = getenv_docker('WORDPRESS_TABLE_PREFIX', 'wp_');

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
define( 'WP_DEBUG', !!getenv_docker('WORDPRESS_DEBUG', '') );

// If we're behind a proxy server and using HTTPS, we need to alert WordPress of that fact
// see also http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
	$_SERVER['HTTPS'] = 'on';
}
// (we include this by default because reverse proxying is extremely common in container environments)

if ($configExtra = getenv_docker('WORDPRESS_CONFIG_EXTRA', '')) {
	eval($configExtra);
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
