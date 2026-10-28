<?php

namespace App\Controller\Produto;

use App\Controller\AbstractController;
use App\Model\Produto\ProdutoModel;

class CadastrarProdutoController extends AbstractController
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

            if (!isset($requestData['quantidade']) || $requestData['quantidade'] === '') {
                throw new \Exception('Informe a quantidade do produto.');
            }

            if (!isset($requestData['valor']) || $requestData['valor'] === '') {
                throw new \Exception('Informe o valor do produto.');
            }

            if ((int) $requestData['quantidade'] < 0 || (float) $requestData['valor'] < 0) {
                throw new \Exception('Quantidade e valor não podem ser negativos.');
            }

            $this->model->cadastrar(
                $requestData['nome'],
                $requestData['descricao'] ?? '',
                (int) $requestData['categoria_id'],
                (int) $requestData['quantidade'],
                (float) $requestData['valor']
            );

            $this->redirect('/produto');
        } catch (\Exception $e) {
            $this->redirectToError($e->getMessage());
        }
    }
}