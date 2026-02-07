<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Cliente;

class ClienteController extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new Cliente();
    }
    
    public function index()
    {
        $this->model->findAll();
        
        //
    }

    public function show($id): ResponseInterface
    {
        //
    }

    public function create()
    {
        //
    }

    public function update($id)
    {
        //
    }

    public function delete($id)
    {
        //
    }
}
