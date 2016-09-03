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
    protected $table;

    public function __construct(Twig $view,LoggerInterface $logger) 
    {
        $this->view = $view;
        $this->logger = $logger;
    }

    public function index(Request $request, Response $response, $args)
    {
        $widgets = \App\Models\HomeModel::all();
        $this->logger->info("Home page action dispatched");

        $this->view->render($response, 'home.html', [
            'widgets' => $widgets
        ]);

        return $response;
    }
}
