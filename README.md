# wordpress_playground


## Install instructions
1. install wordpress and plugins
```sh
composer install
```
2. configure wp-content directory
	write this line on the top of your wp-config.php file
```php
define( 'WP_CONTENT_DIR', dirname(__FILE__) . '/../wp-content' );
```