<?php

namespace App\Controller\Produto;

use App\Controller\AbstractController;
use App\Model\Produto\ProdutoModel;

class AtualizarProdutoController extends AbstractController
{
    private ProdutoModel $model;

    public function __construct()
    {
        $this->model = new ProdutoModel();
    }

    public function index(array $requestData): void
    {
        try {
            if (empty($requestData['nome'])) {
                throw new \Exception('Digite o nome do produto.');
            }

            if (empty($requestData['categoria_id'])) {
                throw new \Exception('Informe a categoria do produto.');
            }

            if (!isset($requestData['valor']) || $requestData['valor'] === '') {
                throw new \Exception('Informe o valor do produto.');
            }

            if ((float) $requestData['valor'] < 0) {
                throw new \Exception('O valor não pode ser negativo.');
            }

            $this->model->atualizar(
                (int) ($requestData['id'] ?? 0),
                $requestData['nome'],
                $requestData['descricao'] ?? '',
                (int) $requestData['categoria_id'],
                (float) $requestData['valor']
            );

            $this->redirect('/produto');
        } catch (\Exception $e) {
            $this->redirectToError($e->getMessage());
        }
    }
}