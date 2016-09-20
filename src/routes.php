<?php
// Routes

$app->get('/', function ($request, $response, $args) {
    $this->logger->info("home '/' route");
    return $this->view->render($response, 'home.html', $args);
})->setName('index');


$app->get('/home','App\Controllers\HomeController:index')->setName('homepage');

$app->post('/home/store','App\Controllers\HomeController:store');

$app->get('/recover_password', function ($request, $response, $args) {
    $this->logger->info("recover_password '/recover_password' route");
    return $this->view->render($response, 'recover_password.html', $args);
})->setName('recover_password');


$app->get('/list_users', function ($request, $response, $args) {
    $this->logger->info("list_users '/list_users' route");
    return $this->view->render($response, 'list_users.html',['name' => 'content here']);
})->setName('list_users');


$app->get('/photos', function ($request, $response, $args) {
    $this->logger->info("photos '/photos' route");
    return $this->view->render($response, 'photos.html', $args);
})->setName('photos');


$app->get('/friends', function ($request, $response, $args) {
    $this->logger->info("friends '/friends' route");
    return $this->view->render($response, 'friends.html', $args);
})->setName('friends');


$app->get('/people_directory', function ($request, $response, $args) {
    $this->logger->info("people_directory '/people_directory' route");
    return $this->view->render($response, 'people_directory.html', $args);
})->setName('people_directory');


$app->get('/about', function ($request, $response, $args) {
    $this->logger->info("about '/about' route");
    return $this->view->render($response, 'about.html', $args);
})->setName('about');

$app->get('/edit_profile', function ($request, $response, $args) {
    $this->logger->info("edit_profile '/edit_profile' route");
    return $this->view->render($response, 'edit_profile.html', $args);
})->setName('edit_profile');

$app->get('/notifications', function ($request, $response, $args) {
    $this->logger->info("notifications '/notifications' route");
    return $this->view->render($response, 'notifications.html', $args);
})->setName('notifications');

$app->get('/blank-cover', function ($request, $response, $args) {
    $this->logger->info("blank-cover '/blank-cover' route");
    return $this->view->render($response, 'blank-cover.html', $args);
})->setName('blank-cover');


$app->get('/registration_email', function ($request, $response, $args) {
    $this->logger->info("registration_email '/registration_email' route");
    return $this->view->render($response, 'registration_email.html', $args);
})->setName('registration_email');

$app->get('/grid_posts', function ($request, $response, $args) {
    $this->logger->info("grid_posts '/grid_posts' route");
    return $this->view->render($response, 'grid_posts.html', $args);
})->setName('grid_posts');

$app->get('/error404', function ($request, $response, $args) {
    $this->logger->info("error404 '/error404' route");
    return $this->view->render($response, 'error404.html', $args);
})->setName('error404');


$app->get('/error500', function ($request, $response, $args) {
    $this->logger->info("error500 '/error500' route");
    return $this->view->render($response, 'error500.html', $args);
})->setName('error500');


$app->get('/messages', function ($request, $response, $args) {
    $this->logger->info("messages '/messages' route");
    return $this->view->render($response, 'messages.html', $args);
})->setName('messages');

$app->get('/profile', function ($request, $response, $args) {
    $this->logger->info("profile '/profile' route");
    return $this->view->render($response, 'profile.html', $args);
})->setName('profile');