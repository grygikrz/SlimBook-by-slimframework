<?php
// Routes

$app->get('/index', function ($request, $response, $args) {
    $this->logger->info("home '/' route");
    return $this->view->render($response, 'index.html', $args);
})->setName('index');

$app->get('/about', function ($request, $response, $args) {
    $this->logger->info("about '/about' route");
    return $this->view->render($response, 'about.html', $args);
})->setName('about');

$app->get('/contact', function ($request, $response, $args) {
    $this->logger->info("contact '/contact' route");
    return $this->view->render($response, 'contact.html',['name' => $args['name']]);
})->setName('contact');

$app->get('/userwall', function ($request, $response, $args) {
    $this->logger->info("userwall '/userwall' route");
    return $this->view->render($response, 'userwall.html', $args);
})->setName('userwall');

$app->get('/profile', function ($request, $response, $args) {
    $this->logger->info("profile '/profile' route");
    return $this->view->render($response, 'profile.html', $args);
})->setName('profile');
