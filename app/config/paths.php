<?php
declare(strict_types=1);

/**
 * Path Configuration
 * 
 * Defines all directory paths for the application
 */
define('BASE_PATH', dirname(__DIR__, 2));
define('APP_PATH', BASE_PATH . '/app');
define('CONFIG_PATH', APP_PATH . '/config');
define('CONTROLLERS_PATH', APP_PATH . '/controllers');
define('MODELS_PATH', APP_PATH . '/models');
define('VIEWS_PATH', APP_PATH . '/views');
define('CORE_PATH', APP_PATH . '/core');
define('PUBLIC_PATH', BASE_PATH . '/public');
define('CSS_PATH', PUBLIC_PATH . '/css');
define('STORAGE_PATH', BASE_PATH . '/storage');
define('LOG_PATH', STORAGE_PATH . '/logs');
define('DATA_PATH', BASE_PATH . '/data');
define('MIGRATIONS_PATH', BASE_PATH . '/migrations');
