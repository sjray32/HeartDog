<?php

require('../vendor/autoload.php');

$app = new Silex\Application();
$app['debug'] = true;

// Register the monolog logging service
$app->register(new Silex\Provider\MonologServiceProvider(), array(
  'monolog.logfile' => 'php://stderr',
));

// Our web handlers
$app->get('/cowsay', function() use($app) {
$app['monolog']->addDebug('cowsay');
return "<pre>".\Cowsayphp\Cow::say("Cool beans")."</pre>";
});

$app->run();
