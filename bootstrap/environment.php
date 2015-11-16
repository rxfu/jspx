<?php

/*
|--------------------------------------------------------------------------
| Detect The Application Environment
|--------------------------------------------------------------------------
|
| Laravel takes a dead simple approach to your application environements
| so you can just specify a machine name for the hosts that matches a
| given environment, then we will automatically detect it for you.
|
 */
$env = $app->detectEnvironment(function () {
	$envPath = __DIR__ . '/../.env';
	$appEnv  = trim(file_get_contents($envPath));
	if (file_exists($envPath)) {
		putenv($appEnv);
		if (getenv('APP_ENV') && file_exists(__DIR__ . '../.' . getenv('APP_ENV') . '.env')) {
			Dotenv::load(__DIR__ . '../.' . getenv('APP_ENV') . '.env');
		}
	}
});