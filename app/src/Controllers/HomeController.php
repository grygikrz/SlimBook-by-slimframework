<?php

namespace App\Controllers;

use Slim\Views\Twig;
use Slim\Flash\Messages as FlashMessages;
use Psr\Log\LoggerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;


class HomeController
{
    private $view;
    private $logger;
    private $flash;

    public function __construct(Twig $view,LoggerInterface $logger, FlashMessages $flash) 
    {
        $this->view = $view;
        $this->logger = $logger;
        $this->flash = $flash;
    }

    public function index(Request $request, Response $response, $args)
    {
           
        $comAndPost = \App\Models\Posts::with('users.comments.users')->get();

        
        $messages = $this->flash->getMessages();

        $this->logger->info("Home page action dispatched");

        $this->view->render($response, 'home.html', [
            'comAndPost' => $comAndPost,
            'messages' => $messages
        ]);

        return $response;
    }
    public function store(Request $request,Response $response){

        $post = new \App\Models\Posts;

        $post->user_id = 2;
        $post->type = 'made a post';
        $post->message = $_POST['message'];
        $post->shares = 0;
        $post->likes = 0;
        $post->comments_count = 0;        
        
        $post->save();

        $this->flash->addMessage('alert', 'Added new post on the wall');

        return $response->withRedirect('../home');
    }
}
