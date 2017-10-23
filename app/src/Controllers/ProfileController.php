<?php

namespace App\Controllers;

use Slim\Views\Twig;
use Slim\Flash\Messages as FlashMessages;
use Psr\Log\LoggerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;


class ProfileController
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
        $comAndPost = \App\Models\Posts::with('users.comments.users')->where('user_id', '=', $id)->orderBy('date', 'desc')->get();

        $messages = $this->flash->getMessages();

        $this->logger->info("Profile page action");

        $this->view->render($response, 'profile.html', [
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

        return $response->withRedirect('../profile');
    }
    public function store_comment(Request $request,Response $response){

        $comment = new \App\Models\Comments;
        $id = key($_POST['compost']);
        $comment->user_id = 2;
        $comment->post_id = $id;
        $comment->message = $_POST['compost'][$id];

        $comment->save();

        \App\Models\Posts::where('id',$id)->increment('comments_count');

        $this->flash->addMessage('alert', 'Added new comment in to the post');

        return $response->withRedirect('../profile');
    }
}
