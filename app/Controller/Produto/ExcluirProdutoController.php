<?php

namespace App\Controller\Produto;

use App\Controller\AbstractController;
use App\Model\Produto\ProdutoModel;

class ExcluirProdutoController extends AbstractController
{
    private ProdutoModel $model;

    public function __construct()
    {
        $this->model = new ProdutoModel();
    }

    public function index(array $requestData): void
    {
        try {
            $this->model->excluir((int) ($requestData['id'] ?? 0));
            $this->redirect('/produto');
        } catch (\Exception $e) {
            $this->redirectToError($e->getMessage());
        }
    }
}