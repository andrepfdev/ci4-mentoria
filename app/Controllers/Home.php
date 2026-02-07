<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

class Home extends BaseController
{

    use ResponseTrait;

    public function index(): string
    {
        return view('welcome_message');
    }

    public function sobre(): ResponseInterface
    {
        $data = [
            'title' => 'Página Sobre',
            'content' => 'Esta é a página sobre.',
            'nota' => 'Aqui você pode encontrar mais informações sobre nós.'
        ];

        return $this->respond($data);
    }
}
