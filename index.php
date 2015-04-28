<?php

require 'Slim/Slim.php';
require 'db_functions.php';
\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

// Slim routes

// Get the list of all the posts and sort by desc order
$app->get('/', function () use ($app) {
		
		$db = connect_db();
		$rs = get_posts($db);
        $app->render('index.php', array('articles' => $rs ));
});

// add a new blog post action
$app->post('/add', function () use ($app){
        
    }
);

// update an exsisting blog post
$app->put('/update/:id', function () use ($app) {
        echo 'This is a PUT route';
    }
);

// Delete the selected blog post
$app->delete('/delete/:id', function () use ($app) {
        echo 'This is a DELETE route';
    }
);

$app->run();
