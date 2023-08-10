<?php
namespace Block\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Slim\Views\PhpRenderer;
use \Block\Models\BlockList;

class MainForm
{
    private PhpRenderer $view;
    private BlockList $blocklist;


    public function __construct(PhpRenderer $view, BlockList $blocklist)
    {
        $this->view = $view;
        $this->blocklist = $blocklist;
    }


    public function main(Request $request, Response $response) : Response
    {
        $base = $request->getUri()->withPath('');

        return $this->view->render($response, 'hello.php', ['base' => $base]);
    }
}