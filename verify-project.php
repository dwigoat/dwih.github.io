<?php

use App\Http\Controllers\Controller;

require_once __DIR__.'/vendor/autoload.php';

$project = realpath(__DIR__);
$paths = [
    'composer.json' => $project.'/composer.json',
    'vendor/autoload.php' => $project.'/vendor/autoload.php',
    'bootstrap/app.php' => $project.'/bootstrap/app.php',
    'routes/web.php' => $project.'/routes/web.php',
    'resources/views/portfolio.blade.php' => $project.'/resources/views/portfolio.blade.php',
    'public/css/portfolio.css' => $project.'/public/css/portfolio.css',
    'public/js/portfolio.js' => $project.'/public/js/portfolio.js',
];
foreach ($paths as $label => $path) {
    if (!is_file($path)) {
        fwrite(STDERR, "MISSING $label\n");
        exit(1);
    }
    echo "OK $label ".filesize($path)." bytes\n";
}
echo 'CONTROLLER_BASE '.(is_subclass_of(Controller::class, Illuminate\Routing\Controller::class) ? 'OK' : 'FAIL')."\n";
