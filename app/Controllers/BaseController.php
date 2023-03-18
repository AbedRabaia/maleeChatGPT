<?php

namespace App\Controllers\Chat;

use CodeIgniter\Controller;

class BaseController extends Controller
{

    protected $helpers = ['permission_helper', 'text', 'chatGpt_helper'];

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $db = \Config\Database::connect();
        $db->query("SET time_zone='+3:00'");
    }
}
