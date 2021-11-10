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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'wbD+Dcmh6moi5sjYm8aXtIXp8MUbudrwgbecxV02V2hqDDDWpy9/0bIqTIORm9npj8Bvrn8e3T4paA2FF1mn2g==');
define('SECURE_AUTH_KEY',  '+keYeB7lBnDKacR3Um4l2wh1B7vCAIMByfwIt+cK2m9GBCjqS+9Agrr4j2YhD6dXIswgwbAin66JcK2NoP1nFw==');
define('LOGGED_IN_KEY',    '2VNKkoZasYgRWG1V8KV5IiL1xVfLd3FUImUCf+fF/F0337Uq8Yb8qn9io5l7oGF5npxgzEh5twUpam8geY7RlA==');
define('NONCE_KEY',        'gvluNgt4EDI4qibHsxSyGRGmX3iWVJrn6cPUGcO/0aomyDRVwaTNjW3qMLf4ZvKzVE4Re3C/pwocLoR4FC+mXg==');
define('AUTH_SALT',        '5cYg1Ml1m9F9PmjiofII+YwmhoQolgmobrq555upOORT9iVc+YPtv4kkf2NKtqqdtQPlNzopguawL23d0ChxpQ==');
define('SECURE_AUTH_SALT', 'jCb+S/8AYvtoyGFx8W8kqi0CUU/Vibsy6auH2b2vnl3tPTB2K638XJEr7tLA+En28//SS1HCIdvqarRlINWM9g==');
define('LOGGED_IN_SALT',   'GtQurXxZ15EFRzOeLvTl/DNrx76sUmPdR3c/WUDcDH0LQJuAwrgvz/9WMjXPvnZq8BbFhph4Z8MKtRlSSgxnuA==');
define('NONCE_SALT',       'xe8dLxvAQESkJ8qk2BeayDOCypq60EijaCcZMnqbGx35g86GUG0ejP6par/JnKdaqwQ03I8LBa1WnVcleTWUyA==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
