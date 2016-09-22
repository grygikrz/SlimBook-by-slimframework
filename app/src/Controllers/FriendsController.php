<?php

namespace App\Controllers;

use Slim\Views\Twig;
use Slim\Flash\Messages as FlashMessages;
use Psr\Log\LoggerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;


class FriendsController
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
        $id = 2; 
        $friends = \App\Models\Friends::with('users')->where('user_id', $id)->get();

        $this->logger->info("Friends page action");

        $this->view->render($response, 'friends.html', [
            'friends' => $friends
        ]);

        return $response;
    }
}
