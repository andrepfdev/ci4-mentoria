<?php

namespace App\Models;

use CodeIgniter\Model;

class Loja extends Model
{
    protected $table            = 'lojas';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nome',
        'endereco',
        'telefone',
        'social_media',
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'nome'    => 'required|string|max_length[100]',
        'endereco' => 'permit_empty|string|max_length[255]',
        'telefone' => 'permit_empty|string|max_length[15]',
        'social_media' => 'permit_empty|string',
    ];
    protected $validationMessages   = [
        'nome'    => [
            'required'    => 'O campo nome é obrigatório.',
            'string'      => 'O campo nome deve ser uma string.',
            'max_length'  => 'O campo nome não pode exceder 100 caracteres.',
        ],
        'endereco' => [
            'string'      => 'O campo endereço deve ser uma string.',
            'max_length'  => 'O campo endereço não pode exceder 255 caracteres.',
        ],
        'telefone' => [
            'string'      => 'O campo telefone deve ser uma string.',
            'max_length'  => 'O campo telefone não pode exceder 15 caracteres.',
        ],
        'social_media' => [
            'string'      => 'O campo rede social deve ser uma string.',
        ],
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
