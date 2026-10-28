<?php

namespace App\Controller\Produto;

use App\Controller\AbstractController;
use App\Model\Produto\ProdutoModel;

class EditarProdutoController extends AbstractController
{
    private ProdutoModel $model;

    public function __construct()
    {
        $this->model = new ProdutoModel();
    }

    public function index(array $requestData): void
    {
        try {
            $produto = $this->model->buscar((int) ($requestData['id'] ?? 0));

            $this->render('produto/editar_produto.php', [
                'produto' => $produto,
            ]);
        } catch (\Exception $e) {
            $this->redirectToError($e->getMessage());
        }
    }
}