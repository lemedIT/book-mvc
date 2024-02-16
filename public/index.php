<?php

require '../vendor/autoload.php';

use M2i\Mvc\App;

$app = new App();
// Ligne utile que si on ne fait pas "php -S ..."
// $app->setBasePath('/poo/06-mvc/public');

// Toutes les routes du site
$app->addRoutes([
    ['GET', '/', 'HomeController@index'],
    ['GET', '/books', 'BooksController@list'],
    ['GET', '/book/[i:id]', 'BooksController@show'],
    ['GET|POST', '/book/creer', 'BooksController@create'],
]);

// Lancer l'application
$app->run();
