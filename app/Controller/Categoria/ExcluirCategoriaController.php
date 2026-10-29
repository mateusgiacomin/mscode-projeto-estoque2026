<?php

namespace App\Controller\Categoria;

use App\Controller\AbstractController;
use App\Model\Categoria\CategoriaModel;

class ExcluirCategoriaController extends AbstractController
{
    private CategoriaModel $model;

    public function __construct()
    {
        $this->model = new CategoriaModel();
    }

    public function index(array $requestData): void
    {
        try {
            $this->model->excluir((int) ($requestData['id'] ?? 0));
            $this->redirect('/categorias');
        } catch (\Exception $e) {
            $this->redirectToError($e->getMessage());
        }
    }
}