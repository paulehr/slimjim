<?php

require 'Slim/Slim.php';
require 'db_functions.php';
\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim([
		'debug' => true
]);

// Slim routes

// Get the list of all the posts and sort by desc order
$app->get('/', function () use ($app) {
		
		$db = connect_db();
		$rs = get_posts($db);
        $app->render('index.php', array('articles' => $rs ));
});

// add a new blog post action
$app->post('/add', function () use ($app){
        $db = connect_db();
		$title = $this->app->request->post('title');
		$post = $this->app->request->post('post');
		new_post($db, $title, $post, "Paul");
    }
);

// update an exsisting blog post
$app->put('/update/:id', function ($id) use ($app) {
        $db = connect_db();
		$id = $this->app->request->put('id');
		$title = $this->app->request->put('title');
		$post = $this->app->request->put('post');
		update_post($db, $id, $title, $post, 'Paul');
    }
);

// Delete the selected blog post
$app->delete('/delete/:id', function ($id) use ($app) {
        echo 'This is a DELETE route';
    }
);

$app->run();
