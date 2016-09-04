<?php

namespace App\Controllers;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Illuminate\Database\Query\Builder;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;


class HomeController
{
    private $view;
    private $logger;

    public function __construct(Twig $view,LoggerInterface $logger) 
    {
        $this->view = $view;
        $this->logger = $logger;
    }

    public function index(Request $request, Response $response, $args)
    {
        $posts = \App\Models\Posts::all();
        $comments = array();
        foreach ($posts as $post):
        $comments = \App\Models\Posts::find($post['id'])->comments;
        endforeach;
        
        $this->logger->info("Home page action dispatched");

        $this->view->render($response, 'home.html', [
            'posts' => $post,
            'comments' => $comments
        ]);

        return $response;
    }
}
