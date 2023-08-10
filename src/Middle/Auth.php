<?php

namespace Block\Middle;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \SlimSession\Helper;

class Auth
{
    private Helper $session;


    public function __construct(Helper $session)
    {
        $this->session = $session;
    }


    public function userId() : int
    {
        return (int)$this->session->user_id;
    }


    public function logined(Request $request, Response $response, $next) : Response
    {
        if ((bool)$this->userId() === False) {

            return $response->withRedirect($request->getUri()->withPath('login'));
        }

        return $next($request, $response);
    }
}


