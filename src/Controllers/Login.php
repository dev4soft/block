<?php

namespace Block\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Slim\Views\PhpRenderer;
use \SlimSession\Helper;

class Login
{
    private PhpRenderer $view;
    private Helper $session;


    public function __construct(PhpRenderer $view, Helper $session)
    {
        $this->view = $view;
        $this->session = $session;
    }


    public function form(Request $request, Response $response) : Response
    {
        $uri = $request->getUri()->withPath('login');

        return $this->view->render($response, 'login.php', ['action' => $uri]);
    }


    public function check(Request $request, Response $response) : Response
    {
        $data = $request->getParsedBody();
        $pass = htmlspecialchars($data['pass']);
        $login = htmlspecialchars($data['login']);

        if ($login !== 'admin' || $pass !== '132435') {
            return $response->withRedirect($request->getUri()->withPath('login'));
        }

        $this->session->user_id = 1;

        return $response->withRedirect($request->getUri()->withPath(''));
    }


    public function logout(Request $request, Response $response) : Response
    {
        unset($this->session->user_id);

        return $response->withRedirect($request->getUri()->withPath('login'));
    }
}
