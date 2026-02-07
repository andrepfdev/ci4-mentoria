<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Loja;

class LojaController extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new Loja();
    }

    public function index() 
    {
        $lojas = $this->model->findAll();

        if (empty($lojas)) {
            return $this->response->setStatusCode(404)->setJSON(['message' => 'Lojas não encontradas']);
        }

        return $this->response->setJSON($lojas);   
    }

    public function show($id): ResponseInterface
    {
        $loja = $this->model->find($id);

        if (!$loja) {
            return $this->response->setStatusCode(404)->setJSON(['message' => 'Loja não encontrada']);
        }

        return $this->response->setJSON($loja);
    }

    public function create()
    {
        $loja = $this->request->getJSON(true);
        
        if ($loja['social_media'] === null) {
            throw new \Exception('O campo social_media não deve ser null');
        }

        $data = [
            'nome'    => $loja['nome'],
            'endereco' => $loja['endereco'],
            'telefone' => $loja['telefone'],
            'social_media' => $loja['social_media'],
        ];

        if (!$this->model->insert($data)) {
            return $this->response->setStatusCode(400)->setJSON(['errors' => $this->model->errors()]);
        }

        return $this->response->setStatusCode(201)->setJSON(['message' => 'Loja criada com sucesso']);
    }

    public function update($id)
    {
        $loja = $this->model->find($id);
        
        if (!$loja) {
            return $this->response->setStatusCode(404)->setJSON(['message' => 'Loja não encontrada']);
        }

        $data = $this->request->getJSON(true);

        if (!$this->model->update($id, $data)) {
            return $this->response->setStatusCode(400)->setJSON(['errors' => $this->model->errors()]);
        }

        return $this->response->setStatusCode(200)->setJSON(['message' => 'Loja atualizada com sucesso']);
    }

    public function delete($id)
    {
        $loja = $this->model->find($id);
        
        if (!$loja) {
            return $this->response->setStatusCode(404)->setJSON(['message' => 'Loja não encontrada']);
        }

        if (!$this->model->delete($id)) {
            return $this->response->setStatusCode(400)->setJSON(['message' => 'Erro ao deletar a loja']);
        }

        return $this->response->setStatusCode(200)->setJSON(['message' => 'Loja deletada com sucesso']);
    }
}
